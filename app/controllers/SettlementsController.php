<?php

class SettlementsController extends \BaseController {

	/**
	 * Display a listing of settlements
	 *
	 * @return Response
	 */
	public function index()
	{
		$settlements = Settlement::where('user_id', '=', Confide::user()->id)->get();

		return View::make('settlements.index', compact('settlements'));
	}

	/**
	 * Show the form for creating a new settlement
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('settlements.create');
	}

	/**
	 * Store a newly created settlement in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Settlement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$acc_balance = Confide::user()->account_balance;
		$amount = Input::get('amount');

		if($acc_balance < $amount || $acc_balance < 500){
			return Redirect::back()->with('notice', 'You account balance is not sufficient. Note that the minimum withdrawal amount is Ksh. 500.00. If this is a mistake kindly contact us at support@spaza.co.ke');
		}

		$settlement = new Settlement;
		$settlement->user_id = Confide::user()->id;
		$settlement->date = date('Y-m-d');
		$settlement->amount = $amount;
		$settlement->save();

		return Redirect::route('settlements.index');
	}

	/**
	 * Display the specified settlement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$settlement = Settlement::findOrFail($id);

		return View::make('settlements.show', compact('settlement'));
	}

	/**
	 * Show the form for editing the specified settlement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$settlement = Settlement::find($id);

		return View::make('settlements.edit', compact('settlement'));
	}

	/**
	 * Update the specified settlement in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$settlement = Settlement::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Settlement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$settlement->update($data);

		return Redirect::route('settlements.index');
	}

	/**
	 * Remove the specified settlement from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Settlement::destroy($id);

		return Redirect::route('settlements.index');
	}

}
