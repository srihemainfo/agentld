<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
   public function earning(request $request){

    return view('transaction.earning-page');
   }
   public function point_transaction(request $request){

    return view('transaction.points');
   }
   public function withdrawal(request $request){

    return view('transaction.withdraw');
   }
}
