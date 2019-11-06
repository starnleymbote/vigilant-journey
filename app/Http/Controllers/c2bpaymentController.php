<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c2bpaymentController extends Controller
{
    public function confirmartionurl()
    {

		header("Content-type: application/json");

		$resposnse = '{
				"ResultCode" : 0,
				"ResultDesc" : "Confirmation Received Succesfully"
				}';

		$mpesaResponse = file_get_contents('php:://input');

		$logfile = "MPESAResponse.txt";

		$jsonMpesaResponse = json_decode($mpesaResponse,true);

		$log = fopen($logFile,"a");

		fwrite($log, $mpesaResponse);
		fclose($log);

    }

    public function valdation()
    {

		header("Content-type: application/json");

		$resposnse = '{
			"ResultCode" : 0,
			"ResultDesc" : "Confirmation Received Succesfully"
		}';

		$mpesaResponse = file_get_contents('php:://input');

		$logfile = "MPESAResponse.txt";

		$jsonMpesaResponse = json_decode($mpesaResponse,true);

		$log = fopen($logFile,"a");

		fwrite($log, $mpesaResponse);
		fclose($log);

		return $resposnse;

    }

    public function c2bpayment()
    {
    	$mpesa = new Safaricom\Mpesa\Mpesa();

    	$c2btransaction = $mpesa ->c2b(
    		$shortcode, $CommandId, $Anount,$Msisdn,$BillRefNumber);
    }

    public function callback()
    {
    	$mpesa = new Safaricom\Mpesa\Mpesa();

    	$callback = $mpesa ->getDataFromCallback();
    }

    public function finishtransaction()
    {
    	
    }
}
