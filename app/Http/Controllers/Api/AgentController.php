<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use App\Models\Aticket;
use Carbon\Carbon;
use DateTime;
use Exception;
use DateTimeZone;
use \App\Mail\PHPMailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use \App\Mail\PurchaseConfirmationMail;
use Auth;
// use App\Http\Controllers\Api\Validator;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function country_list(Request $request){
        $countries=DB::table('countries')->select('id','name')->get();
        // dd($countries);


        $response = [
            'code'=>200,
            'status'=>'Countries List!',

            'data' =>[
                'countries'=>$countries,

            ]
        ];
        return response($response);

    }
    public function state_list(Request $request){
        // dd($request->all());

        $states=DB::table('states')->select('id','name','country_id')->where('country_id',$request->country_id)->get();
        $validator =  Validator::make($request->all(),[
            'country_id'=>'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }

        if(count($states) > 0){
        $response = [
            'code'=>200,
            'status'=>'states List!',

                'states'=>$states,


        ];
        return response($response,200);
    }else{
        $response = [
            'code'=>401,
            'status'=>'No States',


        ];
        return response($response,401);
    }
    }
    public function city_list(Request $request){
        // dd($request->all());
        $validator =  Validator::make($request->all(),[
            'state_id'=>'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }

        $cities=DB::table('cities')->select('id','name','state_id')->where('state_id',$request->state_id)->get();


        if(count($cities) > 0){
        $response = [
            'code'=>200,
            'status'=>'cities List!',


                'cities'=>$cities,


        ];
        return response($response,200);
    }else{
        $response = [
            'code'=>401,
            'status'=>'No cities',


        ];
        return response($response,401);
    }
    }
    public function new_customer(Request $request){

        $user=auth()->user()->id;
        // dd($request->all());
    $clientIP = request()->ip();

        $date=date("d-m-Y");

        $tz = 'Asia/Dubai';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $tt= $dt->format('Y-m-d H:i:s');


        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_register',
            'mobile' => 'required|unique:user_register',
            // 'password' => 'required|string|min:6',
            'building_name' => 'required',
            // 'country' => 'required',//country
            // 'state' => 'required',//state
            // 'city' => 'required',
            // 'dialCode'=>'required',

            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
            // $insertlog = mysqli_query($con, "INSERT INTO `emaillog` (`details`,`subject`,`email`,`ip`,`datetime`,`status`) VALUES ('$messages1','$subject','$email','$user_ip','$datetime','1')");

            $subject = "Little Draw | OTP to Verify Email - " . date("d-m-Y g:i a");

            $messages1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
            $datetime = date("Y-m-d H:i:s");


            $otp = rand(1000,9999);
            $details= [
                'email' => $request->email,
                'name' => $request->name,
                'otp' => $otp,
            ];



            $tz = 'Asia/Dubai';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp($timestamp);
            $dubaidate_time= $dt->format('Y-m-d H:i:s');

            $user_address=DB::table('user_register')->where('id',$user)->first();


            // if($request->country ==""){
            // $country=$user_address->nationality;
            // }else{
            //     $country=$request->country;
            // }

            // if($request->state ==""){
            // $state=$user_address->address;
            // }else{
            // $state=$request->state;
            // }

            // if($request->city ==""){
            // $city=$user_address->city;
            // }else{
            //     $city=$request->city;
            // }

            $Req_country=$request->country;
            $Req_state=$request->state;
            $Req_city=$request->city;

            if($request->country !=""){


                $countries=DB::table('countries')->where('id',$Req_country)->select('id','name')->first();
                $country=$countries->name;
                }else{
                    $country=$user_address->nationality;
                }

                if($request->state !=""){
                    $states=DB::table('states')->select('id','name','country_id')->where('id',$Req_state)->first();
                    $state=$states->name;
                }else{
                    $state=$user_address->address;
                }

                if($request->city !=""){
                    $cities=DB::table('cities')->select('id','name','state_id')->where('id',$Req_city)->first();
                    $city=$cities->name;
                }else{

                    $city='';
                }




                    //   dd($city);


            // dd($dubaidate_time);
            $uniqid = 'CUS' . uniqid(15);
            // dd($state);
            $user = DB::table('users_temp')->insert([
                    'user'=>'Customer',
                    'roll_id'=>0,
                    'name'=>$request->name,
                    'mobile'=>$request->dialCode.''.$request->mobile,
                    'email'=>$request->email,
                    'passport'=>'',
                    'deletes'=>'1',
                    'status'=>'0',
                    'created_at'=>$dubaidate_time,
                    'otp'=>$otp,
                    'pass'=>Hash::make($request['password']),
                    'created_by'=>$user,
                    'referred_by'=>0,
                     'building_name'=>$request->building_name,
                     'address'=>$state,

                     'nationality'=>$country,
                     'dialCode'=>$request->dialCode,
                     'ref_his_id'=>0,
                     'customer_id'=>$uniqid,
                     'img_url'=>'',
                     'branch_code'=>'',
                     'branch_name'=>'',
                     'my_referral_code'=>'',
                     'residinglocation'=>'',
                     'ip'=>$clientIP,
                     'f_points'=>0,
                     'acctype'=>'',
                     'currency_code'=>'',
                     'IBAN_code'=>'',
                     'deviceType'=>'MOBILE',
                     'lastlogin'=>$dubaidate_time,
                       'city'=>'International City',

                 ]);



            $insertlog =DB::table('emaillog')->insert(['details'=>$messages1,'subject'=>$subject,'email'=>$request->email,'ip'=>$clientIP,
            'datetime'=>$tt,'status'=>1]);

            $last_id=DB::table('emaillog')->select('*')->orderBy('id','DESC')->first();
            $l_id=$last_id->id;



            $email_send =  Mail::to($request->email)->send(new PHPMailer($details));



                if ($email_send) {

                    $update=DB::table('emaillog')->where('id',$l_id)->update(['sendstatus'=>'SUCCESS','fromemail'=>'noreply@littledraw.biz']);

                    $response = [
                        'code'=>200,
                        'status'=>'OTP send Sucessfully!',

                        'data' =>[
                            'email'=>$request->email,
                            'otp'=>$otp,

                        ]
                    ];
                    return response($response,200);
            } else {
                $update=DB::table('emaillog')->where('id',$l_id)->update(['sendstatus'=>'FAILED','fromemail'=>'noreply@littledraw.biz']);

                if ($email_send) {

                    $response = [
                        'code'=>401,
                        'status'=>'OTP Not Send!',

                        'data' =>[
                            'otp'=>'Invalid Email',

                        ]
                    ];
                    return response($response,401);
            }
        }




}
public function new_customer_otpverify(Request $request){

    $user=auth()->user()->id;

    $clientIP = request()->ip();

    $tz = 'Asia/Dubai';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp($timestamp);
    $tt= $dt->format('Y-m-d H:i:s');

    $validator =  Validator::make($request->all(),[

        'email' => 'required|string|email|max:255',
        'otp' => 'required|integer',


        ]);

        if($validator->fails()){
           if($validator->fails()){
                        return response()->json([
                            "error" => 'validation_error',
                            "message" => $validator->errors(),
                        ], 422);
                    }
        }
    $datas=DB::table('users_temp')->where('email',$request->email)->orderBy('id','DESC')->first();


if($datas){

    if($datas->email == $request->email){

// dd($datas->otp);
    if($datas->otp == $request->otp){
// dd('dgdfhg');

     $user = DB::table('user_register')->insert([
            'user'=>'Customer',
            'pass'=>$datas->pass,
            'password'=>$datas->password,
            'roll_id'=>$datas->roll_id,
            'created_by'=>$user,
            'referred_by'=>$datas->referred_by,
            'ref_his_id'=>$datas->ref_his_id,
            'dialCode'=>$datas->dialCode,
            'mobile'=>$datas->mobile,
             'name'=>$datas->name,
             'email'=>$datas->email,
             'deletes'=>0,
             'created_at'=>$tt,
             'customer_id'=>$datas->customer_id,
             'building_name'=>$datas->building_name,
             'city'=>$datas->city,
             'address'=>$datas->address,
             'nationality'=>$datas->nationality,
             'ip'=>$clientIP,
             'email_verify'=>'YES',

         ]);

         DB::table('users_temp')
         ->where('email',$request->email)
         ->delete();

         $last_id=DB::table('user_register')->orderBY('id','DESC')->first();

         $response = [
            'code'=>200,
            'status'=>'New Customer Created successfuly!',

            'data' =>[
                'id'=>$last_id->id,
                'customer_id'=>$last_id->customer_id,

            ]
        ];
        return response($response,200);

    }else{


            $response = [
               'code'=>401,
               'data' =>[
                'user'=>'Invalid OTP'


            ]

           ];
           return response($response);
        }


}
}else{
    $response = [
        'code'=>401,
        'status'=>'Invalid User!',


    ];
    return response($response);

}
}
public function profile_update(Request $request){
    print_r($request->all());

}
             public function agents_profile(Request $request){
                $user=auth()->user()->id;

                $agent_id=$request->agent_id;
                $agent = DB::table('user_register')->where('id',$user)->first();
// dd($agent);
        if($agent){
        $response = [
            'code'=>200,
            'status'=>'Agent Profile View!',
            'data' =>[
               'user_profile'=> $agent,
            ]
        ];
            return response($response,200);
             }else{
                $response = [
                    'status'=>401,
                    'message' =>
                        'user unautherized',
                ];
                return response($response,200);
             }
            }
            public function agent_dashboard(Request $request){


                $user=auth()->user()->id;
                // dd($user);
                $agent_id=$request->agent_id;
                $draw=DB::table('draw')->select('*')->orderBy('id','DESC')->first();


                $ticket_amount_today=DB::table('aticket')
                ->whereBetween('aticket.createdon', [date('Y-m-d').' 00:00:00',date('Y-m-d').' 23:59:59'])->get();

                $sum=0;
                if($ticket_amount_today){
                foreach($ticket_amount_today as $ticket_amount_todays){

                    $sum += $ticket_amount_todays->net_total;
                }
            }else{
                $sum=0;
            }
                $agent = DB::table('user_register')->where('id',$user)->first();


                if($agent){

                    $response = [
                        'status'=>true,
                        'data' =>[
                            'draw_no' =>$draw->draw_no,
                           'daily_draw' =>'AED'.' '.$sum,
                           'balance_points' =>$agent->t_point,
                           'total_points' =>$agent->t_earning,
                        ]
                    ];
                    return response($response,200);
                                 }else{
                                    $response = [
                                        'code'=>401,
                                        'message' =>
                                            'user invalid',
                                    ];
                                    return response($response);
                                 }
            }
            public function customer_mobilefilter(Request $request){
                $auth= auth()->user()->id;

                $customer_mobnum=$request->customer_mobnum;

                $customer_dtls = DB::table('user_register')->where('mobile',$customer_mobnum)
                                 ->first();
                                 if($customer_dtls){
                $draw=DB::table('draw')->select('*')->orderBy('id','DESC')->first();

// dd($draw->draw_no);

                if($draw->draw_no){
                $draw_id=$draw->draw_no;
                $customer_dtls->draw_id=$draw_id;
                }
            }
                if($customer_dtls){
                    $response = [
                        'code'=>200,
                        'status'=>true,
                        'data' =>[
                        'customer'=>$customer_dtls,

                        ]
                    ];
                    return response($response,200);
                }else{
                    $response = [
                        'status'=>false,
                        'code'=>401,
                        'data' =>'No Data Available!',
                    ];
                    return response($response,200);
                }

            }
            public function ticket_booking(Request $request){
                // dd($request->all());
                $auth= auth()->user();

                $all_data=$request->all();

                $testee=$all_data['products'];

                $testee2=$all_data['products'];
                $count_product=count($testee);
                foreach($testee as $teste){
                    $validator =  Validator::make($teste,[

                        'product_id' => 'required',
                        'my3number' => 'required|digits:3',
                        ]);

                        if($validator->fails()){
                            return response()->json([
                                "error" => 'validation_error',
                                "message" => $validator->errors(),
                            ], 422);
                        }
                }

    if($count_product <= 12){
        $array=0;
        foreach($testee2 as $my3numbers){

            $drawid=DB::table('draw')->select('*')->where('deletes',0)->orderBy('id','DESC')->first();
            // dd();
            $my3number=$my3numbers['my3number'];
            // dd($my3number);
            $my3block_list=DB::table('blocked_my3number')->where(['drawid'=>$drawid->draw_no,'deletes'=>0])->first();

            if($my3block_list){

                // $newArray=$my3block_list->first.'-'.$my3block_list->second.'-'.$my3block_list->third_one.'-'.
                // $my3block_list->third_two.'-'.$my3block_list->third_three.'-'.$my3block_list->third_four;
                // $explode=explode('-',$newArray);
                $newArray=[$my3block_list->first,$my3block_list->second,$my3block_list->third_one,$my3block_list->third_two,
                $my3block_list->third_three,$my3block_list->third_four];

                // dd($newArray);
                foreach($newArray as $explodes){

                    if($explodes == $my3number){

                        $array++;
                    }

                }
            }


        }
        // dd($array);

if($array == 0){

    // dd('1');
    $achekc =DB::table('user_register')->where('id',$auth->id)->where('deletes',0)->first();
    // dd($achekc);
     $available_points=$achekc->t_point;

     $w=0;
     $x=0;
     $y=0;
     $z=0;

     $total_produts=$request->products;

    foreach($total_produts as $datas){


    if($datas['product_id'] == '1'){
    $w+=10;
    }elseif($datas['product_id'] == '2'){
    $x+=20;
    }elseif($datas['product_id'] == '3'){
    $y+=50;
    }elseif($datas['product_id'] == '4'){
    $z+=100;
    }
    }
    $add_productamount=($w)+($x)+($y)+($z);

    // dd($add_productamount);
   if($add_productamount <= $available_points){

    $auth_usr= auth()->user()->id;
    $balance_points=$available_points - $add_productamount;

      $update = DB::table('user_register')->where('id',$auth_usr)->update(['t_point'=>$balance_points]);

                $data=$request->all();
                $uniqid = 'RT' . uniqid(15);
                $achekc =DB::table('aticket')->where('transaction_id',$uniqid)->get();

                $select_ticket=DB::table('aticket')->select('id')->orderby('id','DESC')->first();

                $last_id=$select_ticket->id;
                $add_id=$last_id + 1;

                $auth_agent= auth()->user()->id;


                $tz = 'Asia/Dubai';
                $timestamp = time();
                $dt = new DateTime("now", new DateTimeZone($tz));
                $dt->setTimestamp($timestamp);
                $tt= $dt->format('Y-m-d H:i:s');
                // dd($tt);
                $draw_id=DB::table('draw')->select('*')->orderBy('id','DESC')->where('deletes',0)->first();
                $draw_nos=$draw_id->draw_no;

                $invoice = rand(100000,999999);



                $onepercen = ($add_productamount / 105);

                $total_amount = number_format(($onepercen * 100), 2);

                $tax_value = number_format(($add_productamount - $total_amount), 2);

                // dd($tax_value);

                                $ticket = DB::table('aticket')->insert([
                                    'payment_transaction_id'=>$uniqid,
                                    'user_id'=>$request->customer_id,
                                    'transaction_id'=>$uniqid,
                                    'deletes'=> 0,
                                    'purchase_datetime' => $tt,
                                    'createdon' => $tt,
                                    'draw_id' => $draw_nos,
                                    'agent_id' => $auth_agent,
                                    'ticket_no' => 'AT'.''.$add_id,
                                    'invoice_no'=>$invoice,
                                    'sale_from'=>4,
                                    'tax_percentage'=>5.00,
                                    'status'=>1,
                                    'payment_by'=>1,
                                    'delete_reason'=>'test',
                                    'total_lines'=>$count_product,
                                    'tax_value'=>$tax_value,
                                    'net_total'=>$add_productamount,
                                    'total_amount'=>$total_amount,

                                ]);

                            $last_id=DB::table('aticket')->select('*')->orderBy('id','DESC')->first();

                            $l_id=$last_id->id;
                            $l_invoice_no=$last_id->invoice_no;

                            $name=$auth->name;
                            $email=$auth->email;
                            $address=$auth->address;
                            $city=$auth->city;
                            $country=$auth->country;

                                            // dd($auth);
                            $invoice = DB::table('invoice')->insert([
                                'ticket_id'=>$l_id,
                                'type'=>'AT',
                                'firstname'=>$name,
                                'emailid'=>$email,
                                'address'=>$address,
                                'city'=>$city,
                                'country'=>$country,
                                'response'=>NULL,
                                'deletes'=>'0',

                            ]);

                            $testee=$all_data['products'];
                            $count_product=count($testee);

                            $i = 0;

                            $j=0;
                            $k=0;
                            $l=0;
                            $m=0;
                            $sum = 0;
                            foreach($testee as $key => $test){
                                // dd($test['product_id']);
                    if($test['product_id'] == '1'){
                        $j++;
                    }elseif($test['product_id'] == '2'){
                        $k++;
                    }elseif($test['product_id'] == '3'){
                        $l++;
                    }elseif($test['product_id'] == '4'){
                        $m++;
                    }


                                $ticket = DB::table('ticket_lines')->insert([
                                    'user_id'=>$request->customer_id,
                                    'agent_id' => $auth_agent,
                                    'draw_id' => $draw_nos,
                                    'ticket_id' => $l_id,
                                    'orders' => $l_id,
                                    'product_id'=>$test['product_id'],
                                    'my3number'=>$test['my3number'],
                                    'raffle_id' =>'OT' . $l_id . ++$i,
                                    'invoice_no' =>$l_invoice_no,
                                    'type' =>'AT',
                                    'deletes' =>0,
                                    'createdon'=>$tt,
                                ]);


                }

            $add=($j*10)+($k*10)+($l*10)+($l*10);

            $auth_usr=auth()->user()->id;

            $last_ticket_id=DB::table('ticket_lines')->select('*')->orderBy('id','DESC')->first();
            $l_ticket_id=$last_ticket_id->ticket_id;

            $achekc_cus =DB::table('user_register')->where('id',$request->customer_id)->first();


            $customer_details =DB::table('user_register')->where('id',$request->customer_id)->first();
            // dd($customer_details);
            $details= [
                'email' => 'test',
                'name' => $customer_details->name,
                'ticket_id' => $l_ticket_id,
                // '' => $customer_details->name,

            ];

            Mail::to($customer_details->email)->send(new PurchaseConfirmationMail($details));

            $messages1='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
            $clientIP = request()->ip();
            $subject = "Purchase Confirmation";

            $insertlog =DB::table('emaillog')->insert(['details'=>$messages1,'subject'=>$subject,'email'=>$customer_details->email,
            'ip'=>$clientIP,'datetime'=>$tt,'status'=>0]);

            }else{
                $response = [
                    'status'=>401,
                    'message' =>'Your point is low!',
                ];
                return response($response);
            }
        $response = [
            'code'=>200,
            'message' =>'Ticket Booking Sucessfully!',
            'data' =>[
                'ticket_no'=>$l_id,
                'transaction_id'=>$last_id->transaction_id,
            ],
        ];
        return response($response);
    }else{

        $response = [
            'status'=>401,
            'message' =>'This number is blocked!',
        ];

        return response($response);
    }


}else{
    $response = [
        'status'=>200,
        'message' =>'only 12 products are booking!',
    ];
    return response($response);

}
            }
            public function ticket_preview(Request $request){
                $auth= auth()->user();

                $all_data=$request->all();

                $testee=$all_data['products'];

                $testee2=$all_data['products'];
                $count_product=count($testee);

                foreach($testee as $teste){
                    $validator =  Validator::make($teste,[

                        'product_id' => 'required',
                        'my3number' => 'required|digits:3',
                        ]);

                        if($validator->fails()){
                            return response()->json([
                                "error" => 'validation_error',
                                "message" => $validator->errors(),
                            ], 422);
                        }
                }
                // dd($all_data['customer_id']);

            if($count_product <= 12){
                $array=0;
                foreach($testee2 as $my3numbers){

                    $drawid=DB::table('draw')->select('*')->where('deletes',0)->orderBy('id','DESC')->first();
                    // dd($drawid->draw_no);
                    $my3number=$my3numbers['my3number'];

                    $my3block_list=DB::table('blocked_my3number')->where('drawid',$drawid->draw_no)->where('deletes','=','0')->first();
                    // dd($my3block_list);
                    if($my3block_list){

                        // $newArray=$my3block_list->first.'-'.$my3block_list->second.'-'.$my3block_list->third_one.'-'.
                        // $my3block_list->third_two.'-'.$my3block_list->third_three.'-'.$my3block_list->third_four;
                        // $explode=explode('-',$newArray);
                        $newArray=[$my3block_list->first,$my3block_list->second,$my3block_list->third_one,$my3block_list->third_two,
                        $my3block_list->third_three,$my3block_list->third_four];

                        // dd($newArray);
                        foreach($newArray as $explodes){

                            if($explodes == $my3number){

                                $array++;
                            }

                        }
                    }


                }
        // dd($array);

        if($array == 0){

            // dd('1');
            $achekc =DB::table('user_register')->where('id',$auth->id)->where('deletes',0)->first();
            // dd($achekc);
            $available_points=$achekc->t_point;

            $w=0;
            $x=0;
            $y=0;
            $z=0;

            $total_produts=$request->products;

            // dd($total_produts);

            foreach($total_produts as $datas){


            if($datas['product_id'] == '1'){
            $w+=10;
            }elseif($datas['product_id'] == '2'){
            $x+=20;
            }elseif($datas['product_id'] == '3'){
            $y+=50;
            }elseif($datas['product_id'] == '4'){
            $z+=100;
            }
            }

            $add_productamount=($w)+($x)+($y)+($z);



// dd($empty);



            if($add_productamount <= $available_points){

                $auth_usr= auth()->user()->id;
                $balance_points=$available_points - $add_productamount;


                $data=$request->all();
                $uniqid = 'RT' . uniqid(15);
                $achekc =DB::table('aticket')->where('transaction_id',$uniqid)->get();

                $select_ticket=DB::table('aticket')->select('id')->orderby('id','DESC')->first();

                $last_id=$select_ticket->id;
                $add_id=$last_id + 1;

                $auth_agent= auth()->user()->id;


                $tz = 'Asia/Dubai';
                $timestamp = time();
                $dt = new DateTime("now", new DateTimeZone($tz));
                $dt->setTimestamp($timestamp);
                $tt= $dt->format('Y-m-d H:i:s');
                // dd($tt);
                $draw_id=DB::table('draw')->select('*')->orderBy('id','DESC')->where('deletes',0)->first();
                $draw_nos=$draw_id->draw_no;

                            $i = 0;

                            $j=0;
                            $k=0;
                            $l=0;
                            $m=0;
                            $sum = 0;
                            foreach($testee as $key => $test){

                    if($test['product_id'] == '1'){
                        $j++;
                    }elseif($test['product_id'] == '2'){
                        $k++;
                    }elseif($test['product_id'] == '3'){
                        $l++;
                    }elseif($test['product_id'] == '4'){
                        $m++;
                    }
                }
            $add=($j*10)+($k*10)+($l*10)+($l*10);

            $auth_usr=auth()->user()->id;
            $last_ticket_id=DB::table('ticket_lines')->select('*')->orderBy('id','DESC')->first();
            $l_ticket_id=$last_ticket_id->ticket_id;
            $achekc_cus =DB::table('user_register')->where('id',$all_data['customer_id'])->first();
            $customer_details =DB::table('user_register')->select('id','name','mobile')->where('id',$all_data['customer_id'])->first();

            $customer_details->ticket_lines=$count_product;

///////////////////////////////////////////////////////
            $selected_product=$request->products;

            // dd($selected_product);
                        $empty=[];
                        foreach($selected_product as $selected_products){

                            $select_product=$selected_products['product_id'];

                            $my3number=$selected_products['my3number'];

                            $product_name=DB::table('product')->where('id',$select_product)->first();


                             $test=[
                                'prod_name'=>$product_name->rate,
                                'my3number'=>$my3number,
                                'ticket_lines'=>$count_product,
                                'draw_date'=>$drawid->result_datetime,
                                'raffle_draw'=>"25-12-2023",


                             ];

                            $empty[]=$test;
                            }
                            $cur_date=date('Y-m-d');
                            $current_date=date("j F, Y",strtotime($cur_date));
$result_date=$drawid->result_datetime;
$resultdate=date("j F, Y",strtotime($result_date));

$raffle=date("j F, Y",strtotime('2023-12-25'));
// dd($count_product);
            if($add){
                $response = [
                    'code'=>200,
                    'data' =>[
                        'products'=>$empty,
                        'customer_id'=>$customer_details->id,
                        'customer_name'=>$customer_details->name,
                        'customer_mobile'=>$customer_details->mobile,
                        'ticket_lines'=>$count_product,
                        'draw'=>$drawid->draw_no,
                        'cur_date'=>$current_date,
                        'resultdate'=>$resultdate,
                        'raffle'=>$raffle,
                    ],
                ];
                return response($response);
            }


            }else{
                $response = [
                    'code'=>401,
                    'data' =>[
                        'low_point'=>'Your point is low!',
                    ],
                ];
                return response($response);
            }

    }else{

        $response = [
            'code'=>401,
            'data' =>[
                'blocked'=>'This my3number is blocked!',
            ],
        ];

        return response($response);
    }


}else{
    $response = [
        'code'=>401,
        'data' =>[
            '12_product'=>'only 12 products are booking!',

        ],
    ];
    return response($response);

}
            }
            public function product_list(Request $request){
                $auth= auth()->user()->id;
                // dd($request->all());
                $product=DB::table('product')->where('id',$request->product_id)->select('*')->get();

                $response = [
                    'code'=>200,
                    'status' =>'Product List!',
                    'data' =>[
                        'product_list'=>$product,

                    ],

                ];
                return response($response);
            }
            public function customer_input_filter(Request $request){
                // dd('sfdsfs');
                $validator =  Validator::make($request->all(),[
                    'name' => 'required',
                    ]);

                    if($validator->fails()){
                        return response()->json([
                            "error" => 'validation_error',
                            "message" => $validator->errors(),
                        ], 422);
                    }


                $find_user=DB::table('user_register')->select('id','name','email','mobile','user')
                ->where('email', 'LIKE', '%' . $request->name . '%')
                ->orwhere('name', 'LIKE', '%' . $request->name . '%')
                ->orwhere('mobile', 'LIKE', '%' . $request->name . '%')
                ->where('roll_id','=','0')
                ->where('deletes','0')
                ->orderBy('id','DESC')->get();
                // dd($find_user);
                if(count($find_user) > 0){
                $response = [
                    'code'=>200,
                    'status' =>'Find User!',
                    'data' =>[
                        'customer'=>$find_user,

                    ],

                ];
                return response($response);
            }else{
                $response = [
                    'code'=>401,
                    'message' =>'No Data Available!',


                ];
                return response($response);
            }
            }
            public function agent_ticket_list(Request $request){
                // dd('dgfdg');
                $auth= auth()->user()->id;
                // dd($auth);
               if($request->from_date !="" && $request->to_date !=""){


                $ticket_lines=DB::table('aticket')->select('aticket.id','aticket.draw_id','aticket.agent_id','aticket.user_id','aticket.ticket_no',
                'aticket.invoice_no','aticket.purchase_datetime','aticket.total_amount','aticket.tax_percentage','aticket.tax_value',
                'aticket.net_total','aticket.transaction_id','aticket.deletes','ticket_lines.deletes as del',
                'ticket_lines.ticket_id','ticket_lines.product_id','ticket_lines.orders','ticket_lines.my3number','ticket_lines.raffle_id','ticket_lines.createdon',
                 'user_register.id as usr','user_register.mobile as customer_mobile','user_register.name','user_register.email'
                //  'draw.draw_no','draw.result_datetime','draw.name'
                )
                ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')

                ->leftjoin('user_register','user_register.id','=','aticket.user_id')
                // ->leftjoin('draw','draw.draw_no','=','aticket.draw_id')
                ->where('ticket_lines.agent_id','=',$auth)
                ->where('ticket_lines.deletes','=',0)
                ->whereBetween('ticket_lines.createdon', [$request->from_date.' 00:00:00',$request->to_date.' 23:59:59'])
                ->orderBy('ticket_lines.id','DESC')
                ->get();




                if(count($ticket_lines) > 0){
                $response = [
                    'code'=>200,
                    // 'status' =>'Tickets!',
                    // 'data' =>[
                        'data'=>$ticket_lines,

                    // ],

                ];
                return response($response);
            }else{
                $response = [
                    'code'=>401,
                    'status' =>'No Data Available!',
                ];
                return response($response);
            }
            }else{

                $aticket=DB::table('aticket')->select('aticket.*','invoice.ticket_id','ticket_lines.user_id','ticket_lines.type',
                'user_register.id as uid','user_register.name','user_register.mobile','user_register.email','ticket_lines.product_id',
                'product.id as pid','product.rate','.ticket_lines.my3number','ticket_lines.raffle_id','aticket.transaction_id')
                ->leftjoin('invoice','invoice.ticket_id','=','aticket.id')
                ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
                ->leftjoin('user_register','user_register.id','=','ticket_lines.user_id')
                ->leftjoin('product','product.id','=','ticket_lines.product_id')
                ->where('aticket.agent_id','=',$auth)
                ->where('ticket_lines.type','=','AT')
                ->orderBy('aticket.id','DESC')
                ->get();

// dd($aticket);
                if(count($aticket) > 0){
                $response = [
                    'code'=>200,
                    'data' =>[
                        'tickets'=>$aticket,

                    ],

                ];
                return response($response);
            }else{

                $response = [
                    'code'=>401,
                    'message' =>'No Data Available!',
                ];
                return response($response);

            }
            }
// dd($ticket_lines);

            }
            public function ticket_filter(Request $request){
                $auth= auth()->user()->id;

                $from_date=date("Y-m-d",strtotime($request->from_date));
                $to_date=date("Y-m-d",strtotime($request->to_date));
                $status=$request->status;
                // dd($from_date);
                //  dd($to_date);
                //   dd($status);
                if($request->from_date !="1970-01-01" && $request->to_date !="1970-01-01" && $status ==""){



                    $ticket_lines=DB::table('aticket')->select('aticket.*','invoice.ticket_id','ticket_lines.user_id','ticket_lines.type',
                    'user_register.id as uid','user_register.name','user_register.mobile','user_register.email','ticket_lines.product_id',
                    'product.id as pid','product.rate','.ticket_lines.my3number','ticket_lines.raffle_id','aticket.transaction_id')
                    ->leftjoin('invoice','invoice.ticket_id','=','aticket.id')
                    ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
                    ->leftjoin('user_register','user_register.id','=','ticket_lines.user_id')
                    ->leftjoin('product','product.id','=','ticket_lines.product_id')
                    ->where('aticket.agent_id','=',$auth)
                    ->where('ticket_lines.type','=','AT')
                    ->whereBetween('ticket_lines.createdon', [$request->from_date.' 00:00:00',$request->to_date.' 23:59:59'])
                    ->orderBy('aticket.id','DESC')
                    ->get();



            }else{
                // $ticket_lines=DB::table('aticket')->select('aticket.*','invoice.ticket_id','ticket_lines.user_id','ticket_lines.type',
                // 'user_register.id as uid','user_register.name','user_register.mobile','user_register.email','ticket_lines.product_id',
                // 'product.id as pid','product.rate','.ticket_lines.my3number','ticket_lines.raffle_id','aticket.transaction_id')
                // ->leftjoin('invoice','invoice.ticket_id','=','aticket.id')
                // ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
                // ->leftjoin('user_register','user_register.id','=','ticket_lines.user_id')
                // ->leftjoin('product','product.id','=','ticket_lines.product_id')
                // ->where('aticket.agent_id','=',$auth)
                // ->where('ticket_lines.type','=','AT')
                // // ->where('email', 'LIKE', '%' . $request->name . '%')
                // ->orwhere('user_register.mobile', 'LIKE', '%' . $request->name . '%')
                // ->orderBy('aticket.id','DESC')
                // ->get();
                // dd('safdsf');
                $ticket_lines=DB::table('aticket')->select('aticket.*','invoice.ticket_id','ticket_lines.user_id','ticket_lines.type',
                'user_register.id as uid','user_register.name','user_register.mobile','user_register.email','ticket_lines.product_id',
                'product.id as pid','product.rate','.ticket_lines.my3number','ticket_lines.raffle_id','aticket.transaction_id')
                ->leftjoin('invoice','invoice.ticket_id','=','aticket.id')
                ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
                ->leftjoin('user_register','user_register.id','=','ticket_lines.user_id')
                ->leftjoin('product','product.id','=','ticket_lines.product_id')
                ->where('aticket.agent_id','=',$auth)
                ->where('ticket_lines.type','=','AT')
                ->where('user_register.mobile', 'LIKE', '%' . $status . '%')
                // ->whereBetween('ticket_lines.createdon', [$request->from_date.' 00:00:00',$request->to_date.' 23:59:59'])
                ->orderBy('aticket.id','DESC')
                ->get();
                // dd($ticket_lines);

            }
            if(count($ticket_lines) > 0){
                $response = [
                    'code'=>200,
                    // 'status' =>'Tickets!',
                    'data' =>[
                        'data'=>$ticket_lines,

                    ],

                ];
                return response($response);
            }else{
                $response = [
                    'code'=>401,
                    'data' =>[
                    'status' =>'No Data Available!',
                ],
                ];
                return response($response);
            }
            }
            public function customer_ticket_print(Request $request){
                $auth= auth()->user()->id;

                $validator =  Validator::make($request->all(),[
                    'TransactionId' => 'required',
                    ]);

                    if($validator->fails()){
                        return response()->json([
                            "error" => 'validation_error',
                            "message" => $validator->errors(),
                        ], 422);
                    }

                // $TransactionId=DB::table('aticket')->select('*')
                // ->where('transaction_id','=',$request->TransactionId)->first();

                // if(!empty($TransactionId)){

                // $TransactionId_ticket=DB::table('aticket')->select('*')
                // ->where('transaction_id','=',$request->TransactionId)->orderBy('id','DESC')->first();

                // $ticket_id=$TransactionId_ticket->id;
// dd($ticket_id);

                $tickets=DB::table('aticket')->select('ticket_lines.id','aticket.id as aticket_id','aticket.draw_id','aticket.agent_id','aticket.user_id','aticket.ticket_no',
                'aticket.invoice_no','aticket.purchase_datetime','aticket.total_amount','aticket.tax_percentage','aticket.tax_value',
                'aticket.net_total','aticket.transaction_id','ticket_lines.deletes',
                'ticket_lines.ticket_id','ticket_lines.product_id','ticket_lines.orders','ticket_lines.my3number','ticket_lines.raffle_id',
                //  'invoice.ticket_id as ticket','invoice.firstname as customer_name',
                'user_register.id as usr','user_register.mobile as customer_mobile','user_register.name as customer_name'
                //  'draw.draw_no','draw.result_datetime','draw.name'
                )
                ->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
                // ->leftjoin('invoice','invoice.ticket_id','=','aticket.id')
                ->leftjoin('user_register','user_register.id','=','aticket.user_id')
                // ->leftjoin('draw','draw.draw_no','=','aticket.draw_id')
                ->where(['aticket.transaction_id'=>$request->TransactionId,'ticket_lines.deletes'=>'0'])
                ->get();



                if(count($tickets) > 0){
                $response = [
                    'code'=>200,
                    'status' =>'Tickets!',
                    'data' =>[
                        'tickets'=>$tickets,

                    ],

                ];
                return response($response);
            }else{
                $response = [
                    'code'=>401,
                    'status' =>'No Data Available!',
                ];
                return response($response);
            }

}
public function individual_ticket_view(Request $request){
    $auth= auth()->user()->id;
    $ticket_id=$request->id;

    $validator =  Validator::make($request->all(),[
        'id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }

    $tickets=DB::table('aticket')->select('ticket_lines.id','aticket.id as aticket_id','aticket.draw_id','aticket.agent_id','aticket.user_id','aticket.ticket_no',
'aticket.invoice_no','aticket.purchase_datetime','aticket.total_amount','aticket.tax_percentage','aticket.tax_value',
'aticket.net_total','aticket.transaction_id','ticket_lines.deletes',
'ticket_lines.ticket_id','ticket_lines.product_id','ticket_lines.orders','ticket_lines.my3number','ticket_lines.raffle_id',
 'user_register.id as usr','user_register.mobile as customer_mobile','user_register.name as customer_name'
)
->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
->leftjoin('user_register','user_register.id','=','aticket.user_id')
->where(['ticket_lines.id'=>$ticket_id,'ticket_lines.deletes'=>'0'])
->get();

if(!empty($tickets)){
    $response = [
        'code'=>200,
        'status'=>'Ticket',
        'data' =>[
            'customer'=>$tickets,

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
public function customer_profile(Request $request){
    $auth= auth()->user()->id;
    // dd('sadff');
    $customer_id=$request->customer_id;

    $TransactionId_ticket=DB::table('user_register')->select('*')
    ->where('customer_id','=',$customer_id)->where('deletes',0)->orderBy('id','DESC')->first();

    // dd($TransactionId_ticket);
if(!empty($TransactionId_ticket)){
        $response = [
            'code'=>200,
            'status'=>'Customer Profile',
            'data' =>[
                'customer'=>$TransactionId_ticket,

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
public function cus_profile(Request $request){
    $auth= auth()->user()->id;
    // dd('sadff');
    $customer_id=$request->customer_id;

    $TransactionId_ticket=DB::table('user_register')->select('*')
    ->where('id','=',$customer_id)->where('deletes',0)->orderBy('id','DESC')->first();

    // dd($TransactionId_ticket);
if(!empty($TransactionId_ticket)){
        $response = [
            'code'=>200,
            'status'=>'Customer Profile',

                'customer'=>$TransactionId_ticket


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

public function customer_list(Request $request){
    $auth= auth()->user()->id;

    // dd($request->all());
    $from_date=date("Y-m-d",strtotime($request->from_date));
    $to_date=date("Y-m-d",strtotime($request->to_date));
    $status=$request->status;
    $email_mobile=$request->email_mobile;


        $customer_list=DB::table('user_register')->select('*')->where('created_by',$auth)->orderBy('id','DESC')->get();


        if(count($customer_list) > 0){
        $response = [
            'code'=>200,
            'status'=>'Customer List!',

                'customer'=>$customer_list,


        ];
        return response($response,200);
    }else{
        $response = [
            'code'=>401,
            'status'=>'No Data Available',


        ];
        return response($response,401);
    }
}
public function customer_autofilter(Request $request){
    $auth= auth()->user()->id;
    $list=DB::table('user_register')->select('id','name','email','mobile','user')
    ->where('email', 'LIKE', '%' . $request->email_mobile . '%')
    ->orwhere('mobile', 'LIKE', '%' . $request->email_mobile . '%')
    ->where('roll_id','=','0')
    ->where('deletes','0')
    // ->where('user_register.created_by','=',$auth)
    ->orderBy('id','DESC')->get();
// dd($list);
    if(count($list) > 0){
        $response = [
            'code'=>200,
            'status'=>'customers',
            'data' =>[
                'customers'=>$list,

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
public function customer_filter(Request $request){
    $auth= auth()->user()->id;
     // dd('1');
     $fromdate=date("Y-m-d",strtotime($request->from_date));
     $todate=date("Y-m-d",strtotime($request->to_date));
     $status=$request->status;
     $email_mobile=$request->email_mobile;

    //  dd($request->all());
    if($fromdate !="1970-01-01" && $fromdate !="1970-01-01" && $status=="" &&  $email_mobile==""){
        // dd('1');
        $list=DB::table('user_register')->select('user_register.*')
        ->where('user_register.created_by','=',$auth)
        ->whereBetween('created_at', [$fromdate.' 00:00:00',$todate.' 23:59:59'])
        ->orderby('id','DESC')->get();
    }elseif($fromdate !="1970-01-01" && $fromdate !="1970-01-01" && $status !="" &&  $email_mobile==""){
        // dd('2');
        $list=DB::table('user_register')->select('user_register.*')
        ->where('user_register.created_by','=',$auth)
        ->where('deletes',$request->status)
        ->whereBetween('created_at', [$fromdate.' 00:00:00',$todate.' 23:59:59'])
        ->orderby('id','DESC')
        ->get();
    }elseif($fromdate !="1970-01-01" && $fromdate !="1970-01-01" && $status!="" && $email_mobile!=""){
        // dd('3');
        $list=DB::table('user_register')->select('id','name','email','mobile','user')
        ->where('email', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('name', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('mobile', 'LIKE', '%' . $request->email_mobile . '%')
        ->where('roll_id','=','0')
        ->where('deletes',$request->status)
        ->where('user_register.created_by','=',$auth)
        ->whereBetween('created_at', [$fromdate.' 00:00:00',$todate.' 23:59:59'])
        ->orderBy('id','DESC')->get();
    }elseif($fromdate =="1970-01-01" && $fromdate =="1970-01-01" && $status=="" && $email_mobile!=""){
// dd('safdxgdfghfd');
// dd('4');
        $list=DB::table('user_register')->select('id','name','email','mobile','user')
        ->where('email', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('name', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('mobile', 'LIKE', '%' . $request->email_mobile . '%')
        ->where('roll_id','=','0')
        ->where('deletes','0')
        ->where('user_register.created_by','=',$auth)
        ->orderBy('id','DESC')->get();
    }else{

        $list=DB::table('user_register')->select('id','name','email','mobile','user')
        ->where('email', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('name', 'LIKE', '%' . $request->email_mobile . '%')
        ->orwhere('mobile', 'LIKE', '%' . $request->email_mobile . '%')
        ->where('roll_id','=','0')
        ->where('deletes','0')
        ->where('user_register.created_by','=',$auth)
        ->orderBy('id','DESC')->get();
    }


    //  dd($list);
    if(count($list) > 0){
        $response = [
            'code'=>200,
            'status'=>'customers',
            'data' =>[
                'customers'=>$list,

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
