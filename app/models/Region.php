<?php

class Region extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public static function getRegion($woeid){

		Log::info($woeid);

		$reg = DB::table('regions')->where('woeid', '=', $woeid)->get();

		if($reg){

		$reg_id = DB::table('regions')->where('woeid', '=', $woeid)->pluck('id');
		$region = Region::find($reg_id);

		return $region->name.', '.$region->country;

		} else {
			return 'No Region';
		}

		
	}
}