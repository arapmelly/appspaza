<?php

class PurchasesController extends \BaseController {

	/**
	 * Display a listing of purchases
	 *
	 * @return Response
	 */
	public function index()
	{
		$purchases = Purchase::where('user_id', '=', Confide::user()->id)->orderBy('created_at', 'DESC')->get();

		return View::make('purchases.index', compact('purchases'));
	}

	/**
	 * Show the form for creating a new purchase
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$tweet_id = $id;
		return View::make('purchases.create', compact('tweet_id'));
	}

	/**
	 * Store a newly created purchase in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Purchase::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$cost = Input::get('retweet_count') * 5;

		$purchase = new Purchase;
		$purchase->user_id = Confide::user()->id;
		$purchase->tweet_id = Input::get('tweet_id');
		$purchase->retweet_count = Input::get('retweet_count');
		$purchase->cost = $cost;
		$purchase->save();

		return View::make('purchases.create', compact('purchase'));
	}

	/**
	 * Display the specified purchase.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$purchase = Purchase::findOrFail($id);

		return View::make('purchases.show', compact('purchase'));
	}

	/**
	 * Show the form for editing the specified purchase.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$purchase = Purchase::find($id);

		return View::make('purchases.edit', compact('purchase'));
	}

	/**
	 * Update the specified purchase in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$purchase = Purchase::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Purchase::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$purchase->payment_code = Input::get('payment_code');
		$purchase->update();

		return View::make('purchases.result');
	}

	/**
	 * Remove the specified purchase from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Purchase::destroy($id);

		return Redirect::route('purchases.index');
	}


	public function approve($id){

		$purchase = Purchase::find($id);

		$status = Purchase::approve($purchase);
		if($status){
			return Redirect::back()->with('notice', 'purchase has been approved and scheduled');
		} else {
			return Redirect::back()->with('error', 'Something went wrong. Please tray again');
		}
		
	}

}
