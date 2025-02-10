<?php

namespace App\Http\Controllers;

use App\Models\useramount;
use Illuminate\Http\Request;

class UseramountController extends Controller
{
    
    public function gotopay($id)
    {
        // dd($id);

        return view('pay')->with('id', $id);



    }
       public function payment(Request $req)
    {
        $paymentdata = ($req['data']);
        // dd($paymentdata);
        $decodeddata = json_decode(base64_decode($paymentdata), true);
        $exploded = explode('-', $decodeddata['transaction_uuid']);

        echo ($decodeddata['status']);
        echo '<br>';
        echo ($decodeddata['transaction_code']);
        echo '<br>';
        echo ($decodeddata['total_amount']);
        echo '<br>';
        echo ($decodeddata['transaction_uuid']);
        // echo ($exploded);
        $uidandpid = $decodeddata['transaction_uuid'];
        $string = $uidandpid;
        $secondHyphenPos = strpos($string, '-', strpos($string, '-') + 1);
        $thirdHyphenPos = strpos($string, '-', $secondHyphenPos + 1);
        $uid = substr($string, $secondHyphenPos + 1, $thirdHyphenPos - $secondHyphenPos - 1);
        $user_id = substr($string, $thirdHyphenPos + 1);

        $payment = new useramount;
        if ($decodeddata['status'] === "COMPLETE") {
            $payment->redeem_amout = $decodeddata['total_amount'];
            $payment->user_id = $user_id;
            // $payment->uid = $uid;
            $payment->transictionid = $uidandpid;
            $payment->created_at = now();
            $payment->save();
            return redirect('/');
        } else {
            echo 'payment status is ' + $decodeddata['status'];
        }
    }
      public function home()
    {
        return view('welcome');
    }
    
}