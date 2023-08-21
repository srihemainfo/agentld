<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(Request $reques){

        $countries=DB::table('countries')->select('id','name')->get();

        // dd($countries);
        return view('ticket.ticket',compact('countries'));
    }
    public function state(Request $request){
// dd($request->all());
        $data['states'] =DB::table('states')->where("country_id",$request->state)->get(["name", "id"]);
        return response()->json($data);
// dd($request->all());
    }
    public function select_ticket(Request $reques){

        return view('ticket.select_ticket');
    }
}
