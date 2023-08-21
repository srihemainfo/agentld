<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class PointrequestController extends Controller
{
    public function point_request(Request $request){
        $auth= auth()->user()->id;

        $validator =  Validator::make($request->all(),[
            'points' => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }

// dd($auth);
$request_id = 'PR' . uniqid(15) . date('his');

$select_to_id=DB::table('user_register')->where('id',$auth)->first();
// dd();
$tz = 'Asia/Dubai';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$tt= $dt->format('Y-m-d H:i:s');

$create = DB::table('point_request')->insert([
    'request_id'=>$request_id,
    'from_id'=>$auth,
    'to_id'=>$select_to_id->created_by,
    'points'=>$request->points,
    'reason'=>NULL,
    'createdon'=>$tt,

 ]);

 $response = [
    'code'=>200,
    'status'=>'Points request send Successfully!',

];
return response($response,200);
    }
    public function pointrequest_list(Request $request){
        $auth= auth()->user()->id;
        $validator =  Validator::make($request->all(),[
            'from_date' => 'required',
            'to_date' => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }


        $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
        ->leftjoin('user_register','user_register.id','=','point_request.to_id')
        ->where('point_request.from_id',$auth)
        ->where('point_request.transaction_status','=','0')
        ->whereBetween('createdon', [$request->from_date.' 00:00:00',$request->to_date.' 23:59:59'])
        ->orderby('id','DESC')->get();

        if(count($list) > 0){
        foreach($list as $lists){
            if($lists->transaction_status == '0'){
         $lists->status='Pending';
            }
        }
        $response = [
            'code'=>200,
            'status'=>'Point Request list',
            'data' =>[
                'point_request'=>$list,

            ],
        ];
        return response($response,200);

    }else{

        $response = [
            'code'=>401,
            'status'=>'No data Available!',

        ];
        return response($response,200);
    }
        // dd($list);

    }
    public function pointsreject_list(Request $request){
        $auth= auth()->user()->id;
//2 reject
// $auth= auth()->user()->id;
$validator =  Validator::make($request->all(),[
    'from_date' => 'required',
    'to_date' => 'required',
    ]);

    if($validator->fails()){
        return response()->json([
            "error" => 'validation_error',
            "message" => $validator->errors(),
        ], 422);
    }

        $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
        ->leftjoin('user_register','user_register.id','=','point_request.to_id')
        ->where('point_request.from_id',$auth)
        ->where('point_request.transaction_status','=','2')
        ->whereBetween('createdon', [$request->from_date.' 00:00:00',$request->to_date.' 23:59:59'])
        ->orderby('id','DESC')->get();


        foreach($list as $lists){
            if($lists->transaction_status == '2'){
         $lists->status='rejected';
            }
        }

        if(count($list) > 0){
            $response = [
                'code'=>200,
                'status'=>'Point Reject list',
                'data' =>[
                    'rejected_points'=>$list,

                ],
            ];
            return response($response,200);
        }else{
            $response = [
                'code'=>401,
                'status'=>'No data Available!',

            ];
            return response($response,200);
        }
    }
    public function pointstransaction_today(Request $request){

        $auth= auth()->user()->id;

        $date=date("Y-m-d");
        $from_date=date("Y-m-d",strtotime($request->from_date));
        $to_date=date("Y-m-d",strtotime($request->to_date));

            // dd('2');
            $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
            ->leftjoin('user_register','user_register.id','=','point_request.to_id')
            ->where('point_request.from_id',$auth)
            ->where('point_request.transaction_status','=','1')
            ->whereBetween('createdon', [$date.' 00:00:00',$date.' 23:59:59'])
            ->orderby('id','DESC')->get();

            foreach($list as $lists){
                if($lists->transaction_status == '1'){
            $lists->status='sucess';
                }


        }


                if(count($list) > 0){
                    $response = [
                        'code'=>200,
                        'status'=>'Point Transaction list',
                        'data' =>[
                            'transaction_points'=>$list,

                        ],
                    ];
                    return response($response,200);
                }else{
                    $response = [
                        'code'=>401,
                        'status'=>'No data Available!',

                    ];
                    return response($response,200);
                }

    }
    public function pointstransaction_list(Request $request){

        $auth= auth()->user()->id;
        $date=date("Y-m-d");
        $from_date=date("Y-m-d",strtotime($request->from_date));
        $to_date=date("Y-m-d",strtotime($request->to_date));
        $status=$request->status;

        // dd($status);
        // dd($status);
        // if($from_date =='1970-01-01' && $to_date == '1970-01-01'){

        //     // dd('1');
        //     $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
        //     ->leftjoin('user_register','user_register.id','=','point_request.to_id')
        //     ->where('point_request.from_id',$auth)
        //     ->where('point_request.transaction_status','=','1')
        //     ->whereBetween('createdon', [$date.' 00:00:00',$date.' 23:59:59'])
        //     ->orderby('id','DESC')->get();

        //     foreach($list as $lists){
        //         if($lists->transaction_status == '1'){
        //     $lists->status='sucess';
        //         }
        //     }
        // }

        if($from_date !='1970-01-01' && $to_date != '1970-01-01' && $status=='0'){
            // dd('1');
            $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
            ->leftjoin('user_register','user_register.id','=','point_request.to_id')
            ->where('point_request.from_id',$auth)
            ->where('point_request.transaction_status','=','1')
            ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
            ->orderby('id','DESC')->get();

            foreach($list as $lists){
                if($lists->transaction_status == '1'){
            $lists->status='sucess';
                }
            }

        }elseif($from_date !='1970-01-01' && $to_date != '1970-01-01' && $status=='1'){
            // dd('2');
            $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
            ->leftjoin('user_register','user_register.id','=','point_request.to_id')
            ->where('point_request.from_id',$auth)
            ->where('point_request.transaction_status','=','0')
            ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
            ->orderby('id','DESC')->get();

            if(count($list) > 0){
            foreach($list as $lists){
                if($lists->transaction_status == '0'){
             $lists->status='Pending';
                }
            }
        }
        }
    elseif($from_date !='1970-01-01' && $to_date != '1970-01-01' && $status=='2'){

        $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
        ->leftjoin('user_register','user_register.id','=','point_request.to_id')
        ->where('point_request.from_id',$auth)
        ->where('point_request.transaction_status','=','2')
        ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
        ->orderby('id','DESC')->get();


        foreach($list as $lists){
            if($lists->transaction_status == '2'){
         $lists->status='rejected';
            }
        }

}elseif($from_date =='1970-01-01' && $to_date == '1970-01-01' && $status=='0'){
    // dd('1');
    $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
    ->leftjoin('user_register','user_register.id','=','point_request.to_id')
    ->where('point_request.from_id',$auth)
    ->where('point_request.transaction_status','=','1')
    // ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
    ->orderby('id','DESC')->get();


    foreach($list as $lists){
        if($lists->transaction_status == '1'){
    $lists->status='sucess';
        }
    }

}

elseif($from_date =='1970-01-01' && $to_date == '1970-01-01' && $status=='1'){
    // dd('2');
    $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
            ->leftjoin('user_register','user_register.id','=','point_request.to_id')
            ->where('point_request.from_id',$auth)
            ->where('point_request.transaction_status','=','0')
            // ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
            ->orderby('id','DESC')->get();

            if(count($list) > 0){
                foreach($list as $lists){
                    if($lists->transaction_status == '0'){
                 $lists->status='Pending';
                    }
                }
            }

}elseif($from_date =='1970-01-01' && $to_date == '1970-01-01' && $status=='2'){
    // dd('3');
    $list=DB::table('point_request')->select('point_request.*','user_register.id as usid','user_register.name')
    ->leftjoin('user_register','user_register.id','=','point_request.to_id')
    ->where('point_request.from_id',$auth)
    ->where('point_request.transaction_status','=','2')
    // ->whereBetween('createdon', [$from_date.' 00:00:00',$to_date.' 23:59:59'])
    ->orderby('id','DESC')->get();


    foreach($list as $lists){
        if($lists->transaction_status == '2'){
     $lists->status='rejected';
        }
    }

}


                if(count($list) > 0){
                    $response = [
                        'code'=>200,
                        'status'=>'Point Transaction list',
                        'data' =>[
                            'transaction_points'=>$list,

                        ],
                    ];
                    return response($response,200);
                }else{
                    $response = [
                        'code'=>401,
                        'status'=>'No data Available!',

                    ];
                    return response($response,200);
                }



    }
    public function agent_created_user(request $request){
        $auth= auth()->user()->id;

                $user=DB::table('user_register')->select('user_register.*')
                ->where('user_register.id',$auth)
                ->orderby('id','DESC')->first();

// dd($user->created_by);
if($user->created_by){
    $users=DB::table('user_register')->select('user_register.*')
    ->where('user_register.id',$user->created_by)
    ->orderby('id','DESC')->first();
}


                if($users){
                    $response = [
                        'code'=>200,
                        'status'=>'Point Reject list',
                        'data' =>[
                            'user'=>$users,

                        ],
                    ];
                    return response($response,200);
                }else{
                    $response = [
                        'code'=>401,
                        'status'=>'No data Available!',

                    ];
                    return response($response,200);
                }

    }
}
