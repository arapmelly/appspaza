<?php

class Tweet extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];



	public static function postTweet($tweet, $account){

		$campaign = Campaign::find($tweet->campaign_id);

		//Get the Users token & from your User Table (or where ever you stored them)
		$token = $account->access_token;
		$secret = $account->access_token_secret;

		//This line resets the token & secret with the users        
		Twitt::reconfig(['token' => $token, 'secret' => $secret]);

			if($campaign->type == 'hashtag'){
 				$status = Tweet::appendTag($tweet);
 			} else {
 				$status = $tweet->tweet;
 			}

		//This line posts the tweet as the user
		if(!empty($tweet->media_url)){

			$filename = $tweet->media_url;

 			$uploaded_media = Twitt::uploadMedia(['media' => file_get_contents(public_path('/uploads/'.$filename))]);
 			
 			
 			Twitt::postTweet(['status' => $status, 'media_ids' => $uploaded_media->media_id_string]);
    

		} else {

			Twitt::postTweet(['status' => $status, 'format' => 'json']); 
		}
		

		
		




	}


	public static function appendTag($tweet){

		//get the tweet region
		$campaign = Campaign::find($tweet->campaign_id);
		$woeid = $campaign->target_region;

		//get the latest trends in the region
		$trends = Twitter::trendsPlace($woeid);
    	$trendings = $trends[0]['trends'];

    	//save trends in an array
    	$tags = array();

    	foreach ($trendings as $trend) {
    		
    		array_push($tags, $trend);
    	}

    	$status = $tweet->tweet;
    	//append tags checking the 140 character limit.
    	
    	$sliced_tags = array_slice($tags, 0, 7);
    		
    	$statuslength = strlen($status);
    	$remspace = 140 -$statuslength;
    	$appendtags = null;

    	//loop through selected tags and add them in a string
    	foreach ($sliced_tags as $stag) {

    		

    			//get char count of tag
    			$taglength = strlen($stag['name']);
    			if($remspace >= $taglength  && $statuslength < 140){
    				if (strpos($stag['name'], '#') !== false) {

    					//$appendtags = $appendtags.' '.$stag['name'];
    					$status = $status.' '.$stag['name'];

    					$statuslength = strlen($status);
    					$remspace = $remspace - $taglength;
  
					}
    			
    		}
    			# code...
    		
    		
    		

    	}

    	

    	

    	
    	return $status;

	}

}