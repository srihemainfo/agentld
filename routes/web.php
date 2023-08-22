<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentSigninController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddCreditController;
use App\Http\Controllers\PointRequestController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('pages.signin');
});



// Auth::routes();
Route::any('/agent-signin', [App\Http\Controllers\AgentSigninController::class, 'agent_signin'])->name('agent-signin');

Route::get('/agent-panel/dashboard-agents', [App\Http\Controllers\AgentSigninController::class, 'agent_sign_in'])->name('agent.dashboard');
Route::get('/agent-ticket/index', [App\Http\Controllers\TicketController::class, 'index'])->name('agent.ticket.index');
Route::any('/agent-ticket/create', [App\Http\Controllers\TicketController::class, 'create'])->name('agent.ticket.index');
Route::post('get_customer_state', [App\Http\Controllers\TicketController::class, 'state'])->name('customer.state');

Route::get('/customer/create', [App\Http\Controllers\TicketController::class, 'create'])->name('customer.create');
Route::get('/agent/ticket-select', [App\Http\Controllers\TicketController::class, 'select_ticket'])->name('customer.select_ticket');



Route::get('/forgot_password', [App\Http\Controllers\CustomerController::class, 'forgot_password'])->name('forgot_password');

Route::get('/customer/index', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('/customerprofile/{customerId}', [App\Http\Controllers\CustomerController::class, 'profile'])->name('customer.profile');

Route::get('/customerorder/{single_id}', [App\Http\Controllers\CustomerController::class, 'customerorder'])->name('customer.customerorder');
Route::get('/invoice/{invoice_id}', [App\Http\Controllers\CustomerController::class, 'invoice_view'])->name('customer.invoice');

Route::get('/transaction/earning-page', [App\Http\Controllers\TransactionController::class, 'earning'])->name('transaction.earning');

Route::get('/transaction/point-transaction', [App\Http\Controllers\TransactionController::class, 'point_transaction'])->name('transaction.point');

Route::get('/transaction/withdrawal', [App\Http\Controllers\TransactionController::class, 'withdrawal'])->name('transaction.withdrawal');

Route::get('/Credit/credit_point', [App\Http\Controllers\AddCreditController::class, 'credit_point'])->name('Credit.credit_point');
Route::get('/point/index', [App\Http\Controllers\PointRequestController::class, 'index'])->name('points.index');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

