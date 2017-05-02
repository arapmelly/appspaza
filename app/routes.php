<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	if(Confide::user()){
        if(Confide::user()->user_type == 'client'){


          return Redirect::to('userdash');
        	
        } 

        if(Confide::user()->user_type == 'influencer'){


          return Redirect::to('influencerdash');
            
        } 

        if(Confide::user()->user_type == 'admin'){
            $purchases = Purchase::where('is_approved', '=', false)->orderBy('created_at', 'DESC')->get();

        	return View::make('admindash', compact('purchases'));
        } 

	} else {

   
		return View::make('login');
	}
	
});


Route::get('userdash', function(){

    
 $accounts = Confide::user()->accounts;
    
      return View::make('userdash', compact('accounts'));

    

});


Route::get('influencerdash', function(){

    
 $accounts = Confide::user()->accounts;
    
      return View::make('influencerdash', compact('accounts'));

    

});




//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

Route::get('users', function(){

  $users = User::all();

  return View::make('users.index', compact('users'));

});




Route::get('twitterlogin', function(){
	
		$tokens = Twitter::oAuthRequestToken();

    	// Redirect to twitter
    	Twitter::oAuthAuthenticate(array_get($tokens, 'oauth_token'));
    	exit;

});



Route::resource('accounts', 'AccountsController');
Route::get('accounts/create', 'AccountsController@create');
Route::get('accounts/edit/{id}', 'AccountsController@edit');
Route::post('accounts/update/{id}', 'AccountsController@update');
Route::get('accounts/destroy/{id}', 'AccountsController@destroy');
Route::get('accounts/show/{id}', 'AccountsController@show');

Route::get('accountscallback', function(){

  // Oauth token
    $token = Input::get('oauth_token');

    // Verifier token
    $verifier = Input::get('oauth_verifier');

    // Request access token
    $accessToken = Twitter::oAuthAccessToken($token, $verifier);
    

    

    $account = new Account;
    $account->user_number = $accessToken['user_id'];
    $account->screen_name = $accessToken['screen_name'];
    $account->access_token = $accessToken['oauth_token'];
    $account->access_secret = $accessToken['oauth_token_secret'];
    $account->user_id = Session::get('user')->id;
    $account->save();

    return Redirect::to('/');

});




Route::get('regionscreate', function(){

    $regions = Twitt::getTrendsAvailable();

    foreach ($regions as $region) {
        
        $reg = new Region;
        $reg->name = $region['name'];
        $reg->woeid = $region['woeid'];
        $reg->country = $region['country'];
        $reg->save();
    }

});




Route::resource('purchases', 'PurchasesController');
Route::get('purchases/create/{id}', 'PurchasesController@create');
Route::post('purchases/update/{id}', 'PurchasesController@update');

Route::get('purchasesapprove/{id}', 'PurchasesController@approve');


Route::resource('settlements', 'SettlementsController');
Route::get('settlements/create', 'SettlementsController@create');
Route::post('settlements/update/{id}', 'SettlementsController@update');


Route::get('adminsettlements', function(){

    $settlements = Settlement::orderBy('created_at', 'DESC')->get();

    return View::make('settlements.adminsettlements', compact('settlements'));

});


Route::get('influencers', function(){

    $users = User::where('user_type', '=', 'influencer')->orderBy('created_at', 'DESC')->get();

    return View::make('users.influencers', compact('users'));

});


Route::get('advertisers', function(){

    $users = User::where('user_type', '=', 'client')->orderBy('created_at', 'DESC')->get();

    return View::make('users.advertisers', compact('users'));

});




















