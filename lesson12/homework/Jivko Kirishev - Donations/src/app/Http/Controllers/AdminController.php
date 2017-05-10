<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function AllDonations(){
		$payment = new Payment();
    	$donations = $payment->allDonations();

        return view('admin.donatStatistic', ['donations'=>$donations]);
    }

    public function DonationsForThisMonth(){
    	$payment = new Payment();
    	$donations = $payment->donatForThisMonth();

        return view('admin.donatStatistic', ['donations'=>$donations]);
    }
}
