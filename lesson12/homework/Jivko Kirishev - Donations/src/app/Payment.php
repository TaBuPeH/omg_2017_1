<?php

namespace App;

use Carbon\Carbon;

class Payment extends Model
{
    public static function count(){
    	return static::get()->count();
    }

    public function findByInvoice($invoice){
    	return $this->where('invoice', $invoice);
    }

    public function allDonations(){
    	$payments =  $this->where('status', 'PAID')->pluck('amount')->all();

    	$money = 0;
    	foreach ($payments as $key => $value) {
    		$money += $value;
    	}

    	return $money;
    }

    public function donatForThisMonth(){
    	$dateS = (new Carbon())->subMonth();
    	$dateE = new Carbon();
    	$payments =  $this->where('status', 'PAID')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->pluck('amount')->all();
    	//$payments =  $this->where('status', 'PAID')->where('created_at', '>', $dateS->format('Y-m-d')." 00:00:00")->where('created_at', '<', $dateE->format('Y-m-d')." 23:59:59"])->pluck('amount')->all();

    	$money = 0;
    	foreach ($payments as $key => $value) {
    		$money += $value;
    	}

    	return $money;
    }
}
