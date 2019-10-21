<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Public Routes
*/
Route::get('/', function () { return view('welcome'); });
Route::get('/pricing', function () { return view('pricing'); });

//Guest Routes 
Route::get('/guest/create_project/', function () { return view('createproject'); });
Route::post('/guest/project/create', 'GuestController@createproject')->middleware('guest');
Route::get('/guest/create_estimate', 'GuestController@step1')->middleware('guest');
Route::get('/guest/create/estimate', 'GuestController@estimatecreate')->middleware('guest');
Route::post('/guest/save/estimate', 'GuestController@estimatesave')->middleware('guest');
Route::get('/guest/contact', function () { return view('guests/contact_support'); });
Route::post('/guest/process_contact_form',"GuestController@process_contact_form");

// Utility Routes
Route::get('/countries', 'DataController@countries');
Route::get('/states/{id}', 'DataController@states');
Route::get('/currencies', 'DataController@currencies');

// Authentication Routes
Auth::routes(['verify' => true]);
Route::post('/password/create', 'AuthController@create_password')->name('password.create');
// =========================== Not necessary - has been handled by Auth::routes() above
Route::get('/passwordresetconfirmation', function () { return view('passwordresetconfirmation');});
Route::get('/passwordresetmessage', function () { return view('passwordresetmessage'); });
Route::get('/passwordreset', function () { return view('passwordreset'); });
Route::get('/password/changed', function() { return view('passwordchanged'); });
// =========================================

// Generate PDF from Invoice
Route::get('/invoice/pdf', function() {
    $pdf = PDF::loadView('invoice_view_pdf');
    return $pdf->download('lancers_invoice.pdf');
});

// Client create password
Route::get('/email/client', function(Request $request){
    if ($request->query('email')) {
        return view('auth.passwords.create')->withEmail($request->query('email'));
    }
    abort(404);
});

/**
 * Protected Routes
 */
Route::group(['middleware' => 'auth:web'], function(){
    // Auth
    Route::get('/logout', 'AuthController@logout')->name('logout');
    
    // Dashboard Routes
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard-profile');
    Route::get('/dashboard/profile/view', 'ProfileController@userProfileDetails')->name('user-profile');
    
    
    // User Routes
    Route::post('/users/edit/profile', "ProfileController@editProfile")->middleware('auth')->name('edit-profile');
    Route::get('/users/subscriptions', "SubscriptionController@showSubscriptions")->middleware('auth')->name('subscriptions');
    Route::get('/users/subscriptions/{planId}', "SubscriptionController@subscribeUser")->middleware('auth');
    // Route::get('/users/subscription', "SubscriptionController@showSubscriptions");
    Route::get('users/subscribe/{txref}', "SubscriptionController@subscribeUser");
    Route::get('/users/view/subscriptions', "SubscriptionController@showPlan")->middleware('auth');
    Route::get('/users/settings/emails', "emailsettingsController@index")->middleware('auth');
    Route::put('/users/settings/emails', "emailsettingsController@updateEmailSettings")->middleware('auth')->name('SET-EMAIL');
    Route::post('/users/edit/profile/image', "ProfileController@updateImage")->middleware('auth')->name('Profile-Image');
    Route::get('/user/notifications', 'NotificationsController@notifications');
    Route::put('/user/notifications/read/{$id}', 'NotificationsController@markAsRead');
    Route::put('/user/notifications/read/all', 'NotificationsController@markAllAsRead');


    // Project Routes
    Route::get('/projects', 'ProjectController@list');
    Route::get('/project/status', 'ProjectController@list');
    Route::get('/project/track', function(){ return view('trackproject'); });
    Route::get('/project/collabrators', function () { return view('project-collabrators'); });

    // Client Routes
    Route::get('/clients', 'ClientController@list');
    Route::get('/client/add', 'ClientController@show');
    Route::post('/client/add', 'ClientController@store');
    Route::get('/client-info', function () { return view('client-info'); });
    
    //Invoice routes
    // Route::resource('invoices', 'InvoiceController');
    Route::get('/invoices', 'InvoiceController@list');
    Route::get('/invoice/pay/{txref}', 'InvoiceController@pay');
    Route::get('/invoices/{invoice}/getpdf', 'InvoiceController@getPdf');
    Route::get('/invoice/review', function() { return view('reviewinvoice'); });
    Route::get('/invoice', function () { return view('invoice_view'); });
    Route::get('/invoice_sent', function () { return view('invoice_sent'); });
    Route::post('/invoice/send/{id}', 'InvoiceController@send');
    Route::get('/invoice-view', function () { return view('invoice-view'); });
    Route::get('/client-doc-view', function () { return view('client-doc-view'); });

    // Estimate Routes
    Route::get('/estimates', 'EstimateController@index')->middleware('auth');
    Route::post('estimates', 'EstimateController@store')->middleware('auth');
    Route::put('/estimates/{estimate}', 'EstimateController@update')->middleware('auth');
    Route::delete('/estimates/{estimate}', 'EstimateController@destroy')->middleware('auth');
    Route::get('/estimates/{estimate}', 'EstimateController@show')->middleware('auth');
    Route::get('/estimate/create/step1', 'EstimateController@step1');
    // Route::get('/estimate/create/step2', 'EstimateController@step2');
    // Route::get('/estimate/create/step3', 'EstimateController@step3');
    // Route::get('/estimate/create/step4', 'EstimateController@step4');
    // Route::get('/estimate/create/step5', 'EstimateController@step5');
    Route::post('/estimate/create/step2', 'EstimateController@step2');
    Route::post('/estimate/create/step3', 'EstimateController@step3');
    Route::post('/estimate/create/step4', 'EstimateController@step4');
    Route::post('/estimate/create/step5', 'EstimateController@step5');

    Route::get('/estimates', 'EstimateController@index')->middleware('auth');
    Route::post('estimates', 'EstimateController@store')->middleware('auth');
    Route::get('/estimate/create', function () { return view('set_estimate'); });
    Route::get('/estimates/{estimate}', 'EstimateController@show')->middleware('auth');
    Route::put('/estimates/{estimate}', 'EstimateController@update')->middleware('auth');
    Route::delete('/estimates/{estimate}', 'EstimateController@destroy')->middleware('auth');

    // Task Routes
    Route::get('/tasks', 'TaskController@getAllTasks');
    Route::get('/tasks/{id}', 'TaskController@getTask');
    Route::post('/tasks', 'TaskController@createTask');
    Route::put('/tasks/{id}', 'TaskController@updateTask');
    Route::delete('/tasks/{id}', 'TaskController@deleteTask');
    Route::put('/tasks/{task}/team', 'TaskController@addTeam');

    // Contract Routes
    Route::post('/contracts/{project_id}/{template_id}', 'ContractControler@store')->name('create.contract');
    Route::put('/contracts/{project_id}/{id}')->name('edit.contract');
    Route::delete('/contracts/{project_id}/{id}')->name('delete.contract');

    // Trasaction/Payment/Subscription Routes
    // Route::post('/pay', 'RaveController@initialize')->name('pay');
    // Route::get('payment/{type}/{ref?}', 'PaymentContoller@create');
    Route::post('/rave/callback', 'RaveController@callback')->name('callback');
    Route::resource('transactions', 'TransactionsController');
    Route::get('/transactions', 'TransactionsController@index');
    Route::resource('transactions', 'TransactionsController');
    Route::get('/transactions', 'TransactionsController@index');
    Route::get('payment/subscription/{type}', 'PaymentContoller@create');
    Route::get('payment/invoice/{ref}', 'PaymentContoller@invoice'); //ref is the timestamp value of the created_at field

    // Others 
    Route::get('/notifications', 'NotificationsController@notifications');
    Route::get('user/notifications', 'NotificationsController@notifications');
    Route::put('user/notifications/read/{$id}', 'NotificationsController@markAsRead');
    Route::put('user/notifications/read/all', 'NotificationsController@markAllAsRead');    
});