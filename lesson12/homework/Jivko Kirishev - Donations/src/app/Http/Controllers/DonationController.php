<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\HmacRepository;
use App\Payment;
use Carbon\Carbon;

class DonationController extends Controller
{
	private $hmac;

	public function __controller(HmacRepository $hmac){
		$this->hmac = new HmacRepository();
	}

    public function donate(){

    	return view("donation");
    }

    public function payment(HmacRepository $hmac, Request $request){
    	$this->validate($request,[
    		'money' => 'regex:/^[0-9]+\.?[0-9]*$/'
    		]);
    	$min = 'D244662428';
		$invoice = sprintf("%'06d", (Payment::count() + 20)); # XXX Invoice
		$sum = $request->money;                          # XXX Ammount
		$exp_date = date("d.m.Y", strtotime("+ 1 week"));                     # XXX Expiration date
		$descr = 'Дарение за програмисти.';                             # XXX Description

		$payment = new Payment();
		$payment->invoice = $invoice;
		$payment->amount = $sum;
		$payment->exp_time = date("Y-m-d", strtotime("+ 1 week"));
		$payment->description = $descr;
		$payment->save();

		$data = <<<DATA
MIN={$min}
INVOICE={$invoice}
AMOUNT={$sum}
EXP_TIME={$exp_date}
DESCR={$descr}
DATA;

		$secret = 'J5P46ZPM3IP7AS1O88BW8VCGKDOMAT9KZ293L2OQKB7SIYEYABVCZSV39JHPCPHM';
		$encoded  = base64_encode($data);
		$checksum = $hmac->encode('sha1', $encoded, $secret);

		return response()->json(['success'=>true,'encoded'=>$encoded, 'checksum'=>$checksum]);
    }

    public function epayResponce(HmacRepository $hmac, Request $request){
    	$encoded  = $_POST['encoded'];
		$checksum = $_POST['checksum'];

		# XXX Secret word with which merchant make CHECKSUM on the ENCODED packet
		$secret = 'J5P46ZPM3IP7AS1O88BW8VCGKDOMAT9KZ293L2OQKB7SIYEYABVCZSV39JHPCPHM';
		$hmacConv = $hmac->encode('sha1', $encoded, $secret); # XXX SHA-1 algorithm REQUIRED

		if ($hmacConv == $checksum) { # XXX Check if the received CHECKSUM is OK
		    
		    $data = base64_decode($encoded);
		    $lines_arr = split("\n", $data);
		    $info_data = '';
		    
		    foreach ($lines_arr as $line) {
		        if (preg_match("/^INVOICE=(\d+):STATUS=(PAID|DENIED|EXPIRED)(:PAY_TIME=(\d+):STAN=(\d+):BCODE=([0-9a-zA-Z]+))?$/", $line, $regs)) {
		            $invoice  = $regs[1];
		            $status   = $regs[2];
		            $pay_date = $regs[4]; # XXX if PAID
		            $stan     = $regs[5]; # XXX if PAID
		            $bcode    = $regs[6]; # XXX if PAID

		            # XXX process $invoice, $status, $pay_date, $stan, $bcode here
		            $payments = new Payment();
		            $payment = $payments->findByInvoice($invoice)->first();
		            $payment->status = $status;
		            $payment->save();

		            # XXX if OK for this invoice
		            $info_data .= "INVOICE=$invoice:STATUS=OK\n";

		            # XXX if error for this invoice
		            # XXX $info_data .= "INVOICE=$invoice:STATUS=ERR\n";

		            # XXX if not recognise this invoice
		            # XXX $info_data .= "INVOICE=$invoice:STATUS=NO\n";
		        }
		    }

			return response($info_data);
		}
		else {
			return response("ERR=Not valid CHECKSUM\n");
		}
    }
}