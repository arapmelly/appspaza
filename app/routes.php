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

        if(Confide::user()->user_type == 'admin'){

        	return View::make('admindash');
        } 

	} else {

   
		return View::make('login');
	}
	
});


Route::get('userdash', function(){

    
 $campaigns = Confide::user()->campaigns;
    
      return View::make('userdash', compact('campaigns'));

    

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

Route::get('callback', function(){

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

    return Redirect::to('accounts');

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



Route::resource('campaigns', 'CampaignsController');
Route::get('campaigns/create/{id}', 'CampaignsController@create');
Route::get('campaigns/edit/{id}', 'CampaignsController@edit');
Route::post('campaigns/update/{id}', 'CampaignsController@update');
Route::get('campaigns/destroy/{id}', 'CampaignsController@destroy');
Route::get('campaigns/show/{id}', 'CampaignsController@show');
Route::get('campaignaccounts/{id}', 'CampaignsController@accounts');
Route::post('campaignsaddaccount', 'CampaignsController@addaccounts');
Route::post('campaignsremoveaccount', 'CampaignsController@removeaccounts');


Route::resource('tweets', 'TweetsController');
Route::get('tweets/create/{id}', 'TweetsController@create');
Route::get('tweets/edit/{id}', 'TweetsController@edit');
Route::post('tweets/update/{id}', 'TweetsController@update');
Route::get('tweets/destroy/{id}', 'TweetsController@destroy');
Route::get('tweets/show/{id}', 'TweetsController@show');










Route::get('expiresubscriptions', function(){

$users = User::where('is_expired', '=', false)->get();

foreach ($users as $user) {
  
  if(User::subscriptionExpired($user)){
    $usr = User::find($user->id);
    $usr->is_expired = true;
    $usr->update();
  }

}

});











