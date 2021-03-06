<?php

namespace App\Http;

use App\Notifications\DocumentReceived;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

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
Route::group(['prefix' => Middleware\LocaleMiddleware::getLocale()], function(){
    Auth::routes();

    //All notifications
    Route::get('/all_notifications', [Controllers\UserController::class, 'all_notifications'])->name('all_notifications');
    Route::get('/mark_as_read/{notification_id}/{process_id}', [Controllers\UserController::class, 'mark_as_read'])->name('mark_as_read');

    //TESTING
    Route::post('create_process', [Controllers\ProcessController::class, 'create_process'])->name('create_process');
    //TESTING

    # HOME PAGE
    Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
    Route::redirect('/home', '/');
    Route::get('/qr/{process_token}', [Controllers\ProcessController::class, 'qr'])->name('qr');

    # Get all document types (for admin only)
    Route::get('/doc_types', [Controllers\DocumentTypeController::class, 'index'])->name('see_doctypes');

    Route::get('/templates', [Controllers\DocumentController::class, 'see_templates'])->name('see_templates');

    # Create and insert Document Types
    Route::get('/templates/create_form', [Controllers\DocumentController::class, 'create'])->name('create_template_form');
    Route::post('/create_document_template', [Controllers\DocumentController::class, 'store'])->name('create_document_template');


    # Get User's Processes
    Route::get('/my_processes', [Controllers\ProcessController::class, 'user_processes'])->name('processes');
    Route::get('/ongoing', [Controllers\ProcessController::class, 'ongoing'])->name('ongoing');
    Route::get('/signed', [Controllers\ProcessController::class, 'signed'])->name('signed');

    Route::get('create_process/{document_id}', [Controllers\ProcessController::class, 'create'])->name('create_proc');

    Route::get('/process_details/{id}', [Controllers\ProcessController::class, 'process_details'])->name('process_details');
    Route::get('/my_process_details/{id}', [Controllers\ProcessController::class, 'my_process_details'])->name('my_process_details');

    Route::post('/sign_return_reject', [Controllers\UserController::class, 'sign_return_reject'])->name('action');

    // Cancel testing
    Route::post('/cancel', [Controllers\ProcessController::class, 'cancel'])->name('cancel');

    // For ADMIN only
    Route::get('/processes/all', [Controllers\ProcessController::class, 'all'])->name('all_processes');;
    Route::get('/users_list', [Controllers\UserController::class, 'all_users'])->name('users_list');
    Route::get('/roles_list', [Controllers\RoleController::class, 'all_roles'])->name('roles_list');

    Route::get('/profile', [Controllers\UserController::class, 'show'])->name('profile');

    Route::get('/templates/{document_id}', [Controllers\DocumentController::class, 'show_document'])->name('templates_application');
    Route::get('/templates/{document_id}/start', [Controllers\ProcessController::class, 'start_process_view'])->name('start_process_view');

});

Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);

    $segments = explode('/', $parse_url);

    if (in_array($segments[1], Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]);
    }

    if ($lang != Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    $url = Request::root().implode("/", $segments);


    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);

})->name('setlocale');
