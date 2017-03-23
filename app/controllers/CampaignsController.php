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
		$availables = Region::all();

		$accounts = Account::all();
		return View::make('campaigns.create', compact('availables', 'accounts'));
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
	$campaign->target_region = Input::get('target_region');
	$campaign->time_interval = Input::get('time_interval');
	$campaign->type = Input::get('type');
	$campaign->save();

	//save accounts

	$accounts = Input::get('accounts');



	$campain = Campaign::find($campaign->id);

	$campain->accounts()->sync($accounts);

	//geneate timeline with accounts and time slots.
	Timeline::generateTimeline($campain);


		return Redirect::route('campaigns.index');
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

		$timelines = $campaign->timelines;

		$tweets = DB::table('tweets')->where('campaign_id', '=', $id)->get();

		return View::make('campaigns.show', compact('campaign', 'timelines', 'tweets'));
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

		return View::make('campaigns.edit', compact('campaign'));
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

		$campaign->update($data);

		return Redirect::route('campaigns.index');
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


	public function start($id)
	{
		$campaign = Campaign::find($id);
		$campaign->is_published = true;
		$campaign->update();

		return Redirect::to('campaigns/show/'.$id);
	}


	public function stop($id)
	{
		$campaign = Campaign::find($id);
		$campaign->is_published = false;
		$campaign->update();

		return Redirect::to('campaigns/show/'.$id);
	}

}
