<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use App\Models\user_register;
// use Twilio\Rest\Client;
use GuzzleHttp\Client;
use Auth;
use DateTime;
use Exception;
use DateTimeZone;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use \App\Mail\OtpMail;
class AuthController extends Controller
{
    public function register(Request $request){


        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
        ]);
//   dd($user);
        //create token
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'status'=>true,
            'message'=>'registered successfully!',
            'data' =>[
                'user'=>$user,
                'token'=>$token
            ]
        ];
        return response($response,200);
    }

    public function login(Request $request){
//         dd($request->header('Custom-Header'));

                $validator =  Validator::make($request->all(),[

                    // 'email' => 'required|string|email|max:255',
                    'email' => 'required',
                    'password' => 'required',
                    ]);

                    if($validator->fails()){
                        return response()->json([
                            "error" => 'validation_error',
                            "message" => $validator->errors(),
                        ], 422);
                    }
                    // dd($request->all());
                //check email
                $user = user_register::where(['email'=>$request->email,'password'=>$request->password,'roll_id'=>4])->first();

                //check password
                // if(!$user || !Hash::check($request->password,$user->password)){
                //     return response(['status'=>false,'message'=>'invalid email or password'],401);
                // }

                if($user == ""){
                    return response(['code'=>401,'status'=>false,'message'=>'invalid email or password']);
                }


                //create token
                $token = $user->createToken('myapptoken')->plainTextToken;
                // dd($user);
                $response = [
                    'code'=>200,
                    'status'=>'Login successfully!',

                    'data' =>[
                        'user_id'=>$user->id,

                    ],
                    'token'=>$token,
                ];
                Session::put('token', $token);
                return response($response,201);
            }


// dd($type);
    // }
    public function otp_verify(Request $request){
        // dd($request->all());
     $user=auth()->user()->id;

        $otp = $request->otp;
        $validator =  Validator::make($request->all(),[
            'otp' => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }

        $user_details=DB::table('user_register')->where('id', $user)->first();
        // dd($user_details);
        $user_otp=$user_details->otp;
        // dd($user_otp);
        if ($user_otp == $otp) {

            $details=DB::table('user_register')
            ->where('id', $user)
            ->update(['verified' => true,'mobile_verify'=> 'YES']);

            $user_check = DB::table('user_register')->where('id',$user)->first();
            $response = [
                'code'=>200,
                'status'=>'OTP Verified Sucessfully',

                'data' =>[
                    'user_id'=>$user_check->id,
                    'name'=>$user_check->name,

                ]
            ];
            return response($response,201);
        } else {

            $response = [
                'code'=>401,
                'message' =>'Invalid OTP!',
            ];
            return response($response);
        }
    }

        public function resendopt(Request $request){

        //type1 email
        //type2 mobile

        $data=$request->all();
        $email=$data['email'];
        $mobile=$data['mobile'];

        // dd($data);




        if($email != ""){

            // $validator =  Validator::make($request->all(),[

            //     'email' => 'required|string|email|max:255',
            //     ]);

            //     if($validator->fails()){
            //         return response()->json([
            //             "error" => 'validation_error',
            //             "message" => $validator->errors(),
            //         ], 422);
            //     }

            $otp = rand(1000,9999);

            $email=$request['email'];

            $user_check=DB::table('user_register')->where('email', $email)->first();


        if(!empty($user_check)){

            $user_check=DB::table('user_register')->where('email', $email)->select('*')->first();

            $details=DB::table('user_register')->where('email', $email)->update(['otp' => $otp]);


                  $details= [
                    'email' => $request->email,
                    'name' => $user_check->name,
                    'otp' => $otp,
                ];

                 $send_email= Mail::to($email)->send(new OtpMail($details));


                $subject = "Little Draw | OTP to Verify Email - " . date("d-m-Y g:i a");

                $messages1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
                $datetime = date("Y-m-d H:i:s");
                $clientIP = request()->ip();
                $tz = 'Asia/Dubai';
                $timestamp = time();
                $dt = new DateTime("now", new DateTimeZone($tz));
                $dt->setTimestamp($timestamp);
                $tt= $dt->format('Y-m-d H:i:s');


                $insertlog =DB::table('emaillog')->insert(['details'=>$messages1,'subject'=>$subject,'email'=>$request->email,
                'ip'=>$clientIP,'datetime'=>$tt,'status'=>1]);

                if($send_email){

                    $response = [
                        'code'=>200,
                        'status'=>'OTP send successfuly!',

                        'data' =>[
                            'otp'=>$otp,

                        ]
                    ];
                    return response($response,201);

                }
            }else{
                $response = [
                    'code'=>401,
                    'message'=>'Invalid User',


                ];
                return response($response,201);
            }
        }
        if($mobile != ""){

           $auth= auth()->user()->id;

        //    $validator =  Validator::make($request->all(),[

        //     'mobile_code' => 'required',
        //     'mobile' => 'required',
        //     'type' => 'required',
        //     ]);

        //     if($validator->fails()){
        //         return response()->json([
        //             "error" => 'validation_error',
        //             "message" => $validator->errors(),
        //         ], 422);
        //     }
            $user = DB::table('user_register')->where('id',$auth)->first();


            $otp = rand(1000,9999);

            $details=DB::table('user_register')->where('id', $auth)->update(['otp' => $otp]);


            $to = ''.'+'.$request->mobile_code.$request->mobile;
            // dd($to);
            $content='Your login  otp is';
            $message=$content.'  '.$otp;

           $accountSid='AC8f0023df5e1789f2c1ff19f7880a419d';
           $authToken='75e41a026b3f5fcaa51fb3e7dc8a97dd';
           $fromNumber='+12295455472';

           $client = new Client();
        //    dd($client);
           try {
               $response = $client->post("https://api.twilio.com/2010-04-01/Accounts/{$accountSid}/Messages.json", [

                   'auth' => [$accountSid, $authToken],
                   'form_params' => [
                       'From' => $fromNumber,
                       'To' => $to,
                       'Body' => $message,

                   ],
               ]);
            //    dd($response);
              $response = [
               'code'=>200,
               'message'=>'OTP send successful!',
               'data' =>[
                'otp'=>$otp,

            ]

           ];
           return response($response,201);
           }catch (Exception $e) {
               $response = [
                'code'=>401,

                   'message'=>'Pls check your  mobile number!',

               ];
               return response($response);

           }





        }

}
public function logout(Request $request){

    auth()->user()->tokens()->delete();
    // dd($dda);
    $response = [
        'code'=>200,
        'status'=>'Logout successfully',

    ];
    return response($response,201);
}


}
