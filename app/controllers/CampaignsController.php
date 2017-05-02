<?php

class CampaignsController extends \BaseController {

	/**
	 * Display a listing of campaigns
	 *
	 * @return Response
	 */
	public function index()
	{
		$campaigns = Campaign::all();

		return View::make('campaigns.index', compact('campaigns'));
	}

	/**
	 * Show the form for creating a new campaign
	 *
	 * @return Response
	 */
	public function create()
	{
		$regions = Region::all();

		return View::make('campaigns.create', compact('regions'));
	}

	/**
	 * Store a newly created campaign in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Campaign::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$campaign = new Campaign;
		$campaign->name = Input::get('name');
		$campaign->start_date = Input::get('start_date');
		$campaign->end_date = Input::get('end_date');
		$campaign->location = Input::get('location');
		$campaign->type = Input::get('type');
		$campaign->user_id = Session::get('user')->id;
		$campaign->save();

		return Redirect::to('campaigns/show/'.$campaign->id);
	}

	/**
	 * Display the specified campaign.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$campaign = Campaign::findOrFail($id);

		return View::make('campaigns.show', compact('campaign'));
	}

	/**
	 * Show the form for editing the specified campaign.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$campaign = Campaign::find($id);
		$regions = Region::all();

		return View::make('campaigns.edit', compact('campaign', 'regions'));
	}

	/**
	 * Update the specified campaign in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$campaign = Campaign::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Campaign::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$campaign->name = Input::get('name');
		$campaign->start_date = Input::get('start_date');
		$campaign->end_date = Input::get('end_date');
		$campaign->location = Input::get('location');
		$campaign->type = Input::get('type');
		$campaign->update();

		return Redirect::to('campaigns/show/'.$campaign->id);
	}

	/**
	 * Remove the specified campaign from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Campaign::destroy($id);

		return Redirect::route('campaigns.index');
	}



	public function accounts($id)
	{
		$campaign = Campaign::find($id);

		$campaignaccounts = DB::table('account_campaign')->where('campaign_id', '=', $id)->get();

		$accounts = Confide::user()->accounts;

		return View::make('campaigns.accounts', compact('accounts', 'campaign', 'campaignaccounts'));
	}



	public function addaccounts()
	{
		
		$campaign_id = Input::get('campaign_id');
		$account_id = Input::get('account_id');

		DB::table('account_campaign')->insert(
			array(
				'account_id'=>$account_id,
				'campaign_id'=>$campaign_id,
				'type'=>'account'
			));

		return Redirect::back()->with('info', 'account has been added');
	}



	public function removeaccounts()
	{
		
		$campaign_id = Input::get('campaign_id');
		$account_id = Input::get('account_id');

		DB::table('account_campaign')->where('account_id', '=', $account_id)->where('campaign_id', '=', $campaign_id)->delete();

		return Redirect::back()->with('info', 'account has been removed');
	}

}
