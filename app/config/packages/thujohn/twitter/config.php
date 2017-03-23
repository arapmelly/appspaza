<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        =>  'ks7vfkapy6ncntEVqASJvFVvy',
	'CONSUMER_SECRET'     =>  '5xmqtum7x1QBthX4UHtA3qQ5pdg6eeywf2DmJT7PJT8nKijZf5',
	'ACCESS_TOKEN'        =>  '',
	'ACCESS_TOKEN_SECRET' =>  '',
];
