<?php 

class TweetService {

    public function fire($job, $data)
    {
        //process tweet pass account and tweet
       // Log::info($data);

    	foreach($data as $dt){
    		$account_id = $dt['account_id'];
    		$tweet_id = $dt['tweet_id'];
    		$campaign_id = $dt['campaign_id'];
    	}

    	$campaign = Campaign::find($campaign_id);

    	if($campaign->is_published){
    		$account = Account::find($account_id);
    		$tweet = Tweet::find($tweet_id);


    		Tweet::postTweet($tweet, $account);
    	}
    	
    	

        //release tweet
        $job->delete();
    }

}