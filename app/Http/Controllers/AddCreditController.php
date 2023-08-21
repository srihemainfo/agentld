<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddCreditController extends Controller
{
    public function credit_point(request $request){
        return view('credit.index');
    }
}
