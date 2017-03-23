<?php

class Account extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function campaigns(){
		return $this->belongsToMany('Campaign');
	}


	public function timelines(){

		return $this->hasMany('Timeline');
	}


	public static function getName($id){


		$account = Account::find($id);
		
		return $account->username;
	}

	

}