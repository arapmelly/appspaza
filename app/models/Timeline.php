<?php

class Timeline extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public function campaign(){

		return $this->belongsTo('Campaign');
	}


	public function account(){

		return $this->belongsTo('Account');
	}


	public static function generateTimeline($campaign){

		//use Carbon\Carbon;

		$campaignaccounts = DB::table('account_campaign')->where('campaign_id', '=', $campaign->id)->get();

		$accounts = array();
		foreach ($campaignaccounts as $ac) {
			array_push($accounts, $ac);
		}
		//create a time liness
			

		$interval = $campaign->time_interval;

		//get the number of intervals depending on the start time and the end time
		// end time minus start time divided by intervals
		//$start_time = Carbon::today();
		//$end_time = Carbon::today()->addHours(23);
		//$interval = strtotime($campaign->time_interval);

		//get the time difference
		$ints = ((24 * 3600)/ $interval);

		//initialize the interval seconds 
		$seconds = $interval;

		//$time_slot = Carbon::today()->toTimeString();
		for($i = 1; $i< $ints; $i++){

			//pull account from accounts
			$account = array_shift($accounts);

			//add account to timelies
			$timeline = new Timeline;
			$timeline->account_id = $account->account_id;
			$timeline->campaign_id = $campaign->id;
			$timeline->time = Carbon::today()->addSeconds($seconds)->toTimeString();
			$timeline->save();

			

			//add account back to accounts array
			array_push($accounts, $account);

			

			//increment seconds by interval
			$seconds = $seconds + $interval;
			
		}
	}



	public static function slotTweets($id){

		

		//get all the tweets for the campaign
		$tweets = DB::table('tweets')->where('campaign_id', '=', $id)->get();

		//get all time slots for the campaign
		$timeslots = DB::table('timelines')->where('campaign_id', '=', $id)->get();

		//loop through each slotting the tweets
		$campaign = Campaign::find($id);
		$interval = $campaign->time_interval;

		//initialize the interval seconds 
		$seconds = $interval;

		foreach ($timeslots as $slot) {
			
			//pull tweet from tweets
			$tweet = array_shift($tweets);

			$timeline = Timeline::find($slot->id);
			$timeline->tweet_id = $tweet->id;
			$timeline->update();

			//add tweet back to tweets array
			array_push($tweets, $tweet);

			$date = Carbon::now()->addSeconds($interval);

			Queue::later($seconds, 'TweetService', array('timeline' => $timeline));

			//increment seconds by interval
			$seconds = $seconds + $interval;
		}
	}

}