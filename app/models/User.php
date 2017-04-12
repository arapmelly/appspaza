<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;


    public function campaigns(){
        return $this->hasMany('Campaign');
    }


    public function accounts(){
        return $this->hasMany('Account');
    }



    public static function subscriptionExpired($user){

    	//check if the next subscription date has elapsed.
    	$next_date = strtotime($user->next_subscription_date);
    	$today_date = strtotime(date('Y-m-d'));

    	if($today_date > $next_date){
    		return true;
    	} else {
    		return false;
    	}

    }
}