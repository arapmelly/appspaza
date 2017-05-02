<?php

class Region extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public static function getName($woeid){

		$location_id = Region::where('woeid', '=', $woeid)->pluck('id');

		$location = Region::find($location_id);

		$name = $location->name.', '.$location->country;

		return $name;
	}

}