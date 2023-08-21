<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use PDF;
use  DB;
// use Barryvdh\DomPDF\Facade as PDF;
use \PDF;
use Dompdf\Dompdf;
class CustomerController extends Controller
{
   public function index(request $request){

    return view('customer.index');
   }
   public function profile(request $request){
    $countries=DB::table('countries')->select('id','name')->get();
    return view('customer.profile',compact('countries'));
   }
   public function forgot_password(request $request){

    return view('pages.forgot-password');
   }
    public function customerorder(request $request,$single_id){

        $datas=DB::table('ticket_lines')->where('raffle_id',$single_id)->first();
        // dd($datas);
        $data['details'] = $datas;

        $pdf = PDF::loadView('pages.order_print', $data);


   }
   public function invoice_view(request $request){
    return view('pages.invoice');
   }
}
