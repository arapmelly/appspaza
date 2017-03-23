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
        //$campaigns = Camapign::all();
		//return View::make('dashboard');
        return Redirect::to('campaigns');
	} else {
		return View::make('index');
	}
	
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


Route::resource('accounts', 'AccountsController');
Route::get('accounts/create', 'AccountsController@create');
Route::get('accountscallback', function(){

	// Oauth token
    $token = Input::get('oauth_token');

    // Verifier token
    $verifier = Input::get('oauth_verifier');

    // Request access token
    $accessToken = Twitter::oAuthAccessToken($token, $verifier);

    

    $account = new Account;
    $account->user_id = $accessToken['user_id'];
    $account->username = $accessToken['screen_name'];
    $account->access_token = $accessToken['oauth_token'];
    $account->access_token_secret = $accessToken['oauth_token_secret'];
    $account->save();

    return Redirect::to('accounts');

});




Route::get('trends', function(){

   

    // Get tweets
    $availables = Region::all();
    
    $trendings = array();
   

   return View::make('trends.index', compact('availables', 'trendings'));

});



Route::post('trends', function(){

    $availables = Region::all();

    $woeid = Input::get('region');

    // Get tweets
    $trends = Twitter::trendsPlace($woeid);
    $trendings = $trends[0]['trends'];
    
 /* echo '<pre>';
   print_r($trends[0]['trends']);*/

   return View::make('trends.trends', compact('trendings', 'availables'));

});



Route::resource('campaigns', 'CampaignsController');
Route::get('campaigns/show/{id}', 'CampaignsController@show');
Route::get('campaignsstart/{id}', 'CampaignsController@start');
Route::get('campaignsstop/{id}', 'CampaignsController@stop');


Route::resource('timelines', 'TimelinesController');
Route::get('process', 'TimelinesController@process');


Route::resource('regions', 'RegionsController');

Route::resource('tweets', 'TweetsController');
Route::get('tweets/create/{id}', 'TweetsController@create');
Route::get('tweets/edit/{id}', 'TweetsController@edit');
Route::get('tweets/destroy/{id}', 'TweetsController@destroy');
Route::get('tweet/{id}', 'TweetsController@tweet');
Route::get('tweetsslot/{id}', 'TweetsController@slottweets');
Route::post('tweets/update/{id}', 'TweetsController@update');


Route::get('shift', function(){

    $seconds = 480;

    $start_time = Carbon::today()->toTimeString();

     echo $start_time. '<br/>';

     $ints = (24 * 3600)/ $seconds;

     for($i = 1; $i< $ints; $i++){

        $next_time = Carbon::today()->addSeconds($seconds)->toTimeString();

        $seconds = $seconds + 480;

        echo $next_time.'<br/>';


     }

    
   
});

Route::get('regionscreate', function(){

    $regions = Twitter::trendsAvailable();

    foreach ($regions as $region) {
        
        $reg = new Region;
        $reg->name = $region['name'];
        $reg->woeid = $region['woeid'];
        $reg->country = $region['country'];
        $reg->save();
    }

});


Route::get('testtweet', function(){

    $account = Account::find(5);

    //Get the Users token & from your User Table (or where ever you stored them)
$token = $account->access_token;
$secret = $account->access_token_secret;

//This line resets the token & secret with the users        
Twitt::reconfig(['token' => $token, 'secret' => $secret]);

//This line posts the tweet as the user
//Twitt::postTweet(['status' => 'test', 'format' => 'json']); 

$tweet = Tweet::find(12);
$filename = $tweet->media_url;

 $uploaded_media = Twitt::uploadMedia(['media' => file_get_contents(public_path('/uploads/'.$filename))]);
 Twitt::postTweet(['status' => $tweet->tweet, 'media_ids' => $uploaded_media->media_id_string]);
    

});


Route::get('listen', function(){

    $timeline = Timeline::find(899);
             $date = Carbon::today()->addSeconds(20);

            Queue::later($date, 'TweetService', array('timeline' => $timeline));

});





