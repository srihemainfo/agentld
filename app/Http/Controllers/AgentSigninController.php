<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\user_register;
class AgentSigninController extends Controller
{
    public function agent_signin(Request $Request){
        return view('pages.signin');
    }
    public function agent_sign_in(Request $Request){


                return view('agent.dashboard');

            
    }
}
