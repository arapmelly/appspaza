<?php

class AccountsController extends \BaseController {

	/**
	 * Display a listing of accounts
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounts = Confide::user()->accounts;

		return View::make('accounts.index', compact('accounts'));
	}

	/**
	 * Show the form for creating a new account
	 *
	 * @return Response
	 */
	public function create()
	{
		$tokens = Twitter::oAuthRequestToken();

    	// Redirect to twitter
    	Twitter::oAuthAuthenticate(array_get($tokens, 'oauth_token'));
    	exit;
	}

	/**
	 * Store a newly created account in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Account::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Account::create($data);

		return Redirect::route('accounts.index');
	}

	/**
	 * Display the specified account.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$account = Account::findOrFail($id);
		
		// Get tweets
		//$tweets = Twitter::statusesUserTimeline($account->user_id);

		 $tweets = Twitt::getUserTimeline(['screen_name' => $account->screen_name, 'count' => 20, 'format'=>'array']);
		
		return View::make('accounts.show', compact('account', 'tweets'));
	}

	/**
	 * Show the form for editing the specified account.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$account = Account::find($id);

		return View::make('accounts.edit', compact('account'));
	}

	/**
	 * Update the specified account in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$account = Account::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Account::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$account->update($data);

		return Redirect::route('accounts.index');
	}

	/**
	 * Remove the specified account from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Account::destroy($id);

		return Redirect::route('accounts.index');
	}

}
