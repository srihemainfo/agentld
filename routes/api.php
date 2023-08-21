<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\PointrequestController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post("/register",[AuthController::class,'register']);
    Route::post("/login",[AuthController::class,'login'])->name('agent.login');
    Route::post("/country_list",[AgentController::class,'country_list']);
    Route::post("state_list",[AgentController::class,'state_list'])->name('customer.states');
    Route::post("/city_list",[AgentController::class,'city_list'])->name('customer.cities');

    Route::post("/add_product",[AgentController::class,'add_product'])->name('customer.add_product');

    // Route::get('/token', function (Request $request) {
    //     $token = $request->session()->token();

    //     $token = csrf_token();


    // });



Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::post("/logout",[AuthController::class,'logout'])->name('agent.logout');
    Route::post("/resendopt",[AuthController::class,'resendopt'])->name('agent.resendopt');
    Route::post("/otp_verify",[AuthController::class,'otp_verify'])->name('agent.otp_verify');

    Route::post("/new_customer",[AgentController::class,'new_customer'])->name('agent.newcustomer');
    Route::post("/agents_profile",[AgentController::class,'agents_profile']);
    Route::post("/agent_dashboard",[AgentController::class,'agent_dashboard'])->name('agent.agent_dashboard');
    Route::post("/customer_mobilefilter",[AgentController::class,'customer_mobilefilter'])->name('customer.mobilefilter');
    Route::post("/ticket_booking",[AgentController::class,'ticket_booking'])->name('ticket.booking');
    Route::post("/product_list",[AgentController::class,'product_list'])->name('customer.product_list');
    Route::post("/customer_input_filter",[AgentController::class,'customer_input_filter']);
    Route::post("/agent_ticket_list",[AgentController::class,'agent_ticket_list'])->name('agent.ticket_list');
    Route::post("/agent_ticketfilter",[AgentController::class,'ticket_filter'])->name('agent.ticketfilter');

    Route::post("/customer_ticket_print",[AgentController::class,'customer_ticket_print']);
    Route::post("/customer_profile",[AgentController::class,'customer_profile']);
    Route::post("/cus_profile",[AgentController::class,'cus_profile'])->name('cus.profile');

    Route::post("/new_customer_otpverify",[AgentController::class,'new_customer_otpverify'])->name('customer.new_customer_otpverify');
    Route::post("/profile_update",[AgentController::class,'profile_update'])->name('profile_update');




    Route::post("/individual_ticket_view",[AgentController::class,'individual_ticket_view']);
    Route::post("/customer_list",[AgentController::class,'customer_list'])->name('agent.customer_list');
    Route::post("/customer_filter",[AgentController::class,'customer_filter'])->name('agent.customer_filter');
    Route::post("/customer_autofilter",[AgentController::class,'customer_autofilter'])->name('agent.customer_autofilter');

    Route::post("/ticket_preview",[AgentController::class,'ticket_preview'])->name('customer.ticket_preview');


    Route::post("/point_request",[PointrequestController::class,'point_request'])->name('agent.point_request');
    Route::post("/pointrequest_list",[PointrequestController::class,'pointrequest_list']);
    Route::post("/pointsreject_list",[PointrequestController::class,'pointsreject_list']);
    Route::post("/pointstransaction_list",[PointrequestController::class,'pointstransaction_list'])->name('agent.pointstransaction_list');
    Route::post("/pointstransaction_today",[PointrequestController::class,'pointstransaction_today'])->name('agent.pointstransaction_today');

    Route::post("/agent_created_user",[PointrequestController::class,'agent_created_user'])->name('agent.agent_created_user');


});
