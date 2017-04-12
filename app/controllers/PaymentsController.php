<?php

class PaymentsController extends \BaseController {

	/**
	 * Display a listing of payments
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = Payment::all();

		return View::make('payments.index', compact('payments'));
	}

	/**
	 * Show the form for creating a new payment
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$package = Package::find($id);
		return View::make('payments.create', compact('package'));
	}

	/**
	 * Store a newly created payment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Payment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Payment::create($data);

		return Redirect::route('payments.index');
	}

	/**
	 * Display the specified payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$payment = Payment::findOrFail($id);

		return View::make('payments.show', compact('payment'));
	}

	/**
	 * Show the form for editing the specified payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::find($id);

		return View::make('payments.edit', compact('payment'));
	}

	/**
	 * Update the specified payment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$payment = Payment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Payment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$payment->update($data);

		return Redirect::route('payments.index');
	}

	/**
	 * Remove the specified payment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Payment::destroy($id);

		return Redirect::route('payments.index');
	}


	public function validate(){

		$user = Confide::user();
		$transaction_code = strtoupper(Input::get('transaction_code'));
		$package = Package::find(Input::get('package_id'));
		$cost = $package->cost;

		//get payment 
		$paycount = DB::table('payments')->where('transaction_reference', '=', $transaction_code)->count();
		
		if($paycount >= 1){

			$payment_id = DB::table('payments')->where('transaction_reference', '=', $transaction_code)->pluck('id');
			$payment = Payment::find($payment_id);

			//get paid amount.
			$paid_amount = $payment->amount;

			if($paid_amount >= $cost){

				$today = Carbon::today();

				$next_date = $today->addDays(30);
				//activate user and package
				$usr = User::find($user->id);
				$usr->is_expired = false;
				$usr->subscribed_package = $package->id;
				$usr->next_subscription_date = $next_date;
				$usr->update();
				return Redirect::to('/')->with('notice', 'Your have been successfully subscribed');
			} else {

				return Redirect::back()->with('error', 'The Amount paid could not be validated for this package. Kindly check and try again');
			}
			
			



		} else {

			return Redirect::back()->with('error', 'The transaction code could not be validated. Kindly check and try again');
		}

		


	}

}
