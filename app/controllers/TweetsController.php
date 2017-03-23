<?php

class TweetsController extends \BaseController {

	/**
	 * Display a listing of tweets
	 *
	 * @return Response
	 */
	public function index()
	{
		$tweets = Tweet::all();

		return View::make('tweets.index', compact('tweets'));
	}

	/**
	 * Show the form for creating a new tweet
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$campaign = Campaign::find($id);
		return View::make('tweets.create', compact('campaign'));
	}

	/**
	 * Store a newly created tweet in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tweet::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('file')){

			//upload file
		$file = Input::file('file');
		$destinationPath = public_path().'/uploads';

		$name = str_random(12);
		//$filename = $file->getClientOriginalName();
		$extension =$file->getClientOriginalExtension(); 
		$filename = $name.'.'.$extension;
		$upload_success = Input::file('file')->move($destinationPath, $filename);

		if($upload_success){

			$tweet = new Tweet;
			$tweet->tweet = Input::get('tweet');
			$tweet->campaign_id = Input::get('campaign_id');
			$tweet->media_url = $filename;
			$tweet->save();

		} else {

			return Redirect::back()->with('error', 'something wrong happened. whoops!');

		}


		} else {

			$tweet = new Tweet;
			$tweet->tweet = Input::get('tweet');
			$tweet->campaign_id = Input::get('campaign_id');
			$tweet->media_url = null;
			$tweet->save();


		}
		
		

		$campaign_id = Input::get('campaign_id');

		return Redirect::to('campaigns/show/'.$campaign_id);
	}

	/**
	 * Display the specified tweet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tweet = Tweet::findOrFail($id);

		return View::make('tweets.show', compact('tweet'));
	}

	/**
	 * Show the form for editing the specified tweet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tweet = Tweet::find($id);


		

		return View::make('tweets.edit', compact('tweet'));
	}

	/**
	 * Update the specified tweet in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tweet = Tweet::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tweet::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}



		if(Input::hasFile('file')){

			//upload file
		$file = Input::file('file');
		$destinationPath = public_path().'/uploads';

		$name = str_random(12);
		//$filename = $file->getClientOriginalName();
		$extension =$file->getClientOriginalExtension(); 
		$filename = $name.'.'.$extension;
		$upload_success = Input::file('file')->move($destinationPath, $filename);

		if($upload_success){

	
			$tweet->tweet = Input::get('tweet');
			$tweet->media_url = $filename;
			$tweet->update();

		} else {

			return Redirect::back()->with('error', 'something wrong happened. whoops!');

		}


		} else {

			$tweet->tweet = Input::get('tweet');
			$tweet->media_url = null;
			$tweet->update();


		}

		return Redirect::to('campaigns/show/'.$tweet->campaign_id);
	}

	/**
	 * Remove the specified tweet from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tweet = Tweet::find($id);

		Tweet::destroy($id);

		return Redirect::to('campaigns/show/'.$tweet->campaign_id);
	}


	public function slottweets($id){

		

		Timeline::slotTweets($id);

		return Redirect::to('campaigns/show/'.$id);

	}


	public function tweet($id){

		$tweet = Tweet::find($id);

		//manually assign account
		$account = Account::find(4);

		//post tweet
		Tweet::postTweet($tweet, $account);

		return Redirect::back()->with('notice', 'tweet has been posted');
	}
}
