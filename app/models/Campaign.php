<?php

class Campaign extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function accounts(){
		return $this->belongsToMany('Account');
	}


	public function timelines(){

		return $this->hasMany('Timeline');
	}

}