<?php

namespace App\Http;

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
    Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
    Route::redirect('/home', '/');


    Route::get('/doc_types', [Controllers\DocumentTypeController::class, 'index'])->name('see_doctypes');

    Route::get('/doc_types/create_form', [Controllers\DocumentTypeController::class, 'create'])->name('doctype_form');
    Route::post('/create_document_type', [Controllers\DocumentTypeController::class, 'store'])->name('create_doctype');

    Route::get('documents/create_form', [Controllers\DocumentController::class, 'create'])->name('document_form');
    Route::post('/create_document', [Controllers\DocumentController::class, 'store'])->name('create_doc');

    // For all of roles but in the future need to change access
    Route::get('/signed_by', [Controllers\UserController::class, 'signed_by'])->name('sign_by'); // Documents that user wait for signing from other
    Route::get('/ongoing_by', [Controllers\UserController::class, 'ongoing_by'])->name('ongoing_in'); // displays documents that YOU need to sign
    Route::get('/rejected_by', [Controllers\UserController::class, 'rejected_by'])->name('rejected_by'); // Documents that user have rejected

    Route::get('/signed_from', [Controllers\UserController::class, 'signed_from'])->name('sign_from'); // Documents that were signed by other
    Route::get('/ongoing_from', [Controllers\UserController::class, 'ongoing_from'])->name('ongoing_out'); // Documents that user need to sign
    Route::get('/rejected_from', [Controllers\UserController::class, 'rejected_from'])->name('rejected_from'); // Documents where user got reject

    Route::get('/sign/{doc_id}', [Controllers\UserController::class, 'toSign'])->name('sign');
    Route::get('/reject/{doc_id}', [Controllers\UserController::class, 'toReject'])->name('reject');
    Route::get('/return/{doc_id}', [Controllers\UserController::class, 'toReturn'])->name('return');

    // For ADMIN only
    Route::get('/all', [Controllers\DocumentController::class, 'all'])->name('all');;
    Route::get('/users_list', [Controllers\UserController::class, 'all_users'])->name('users_list');
    Route::get('/roles_list', [Controllers\UserController::class, 'all_roles'])->name('roles_list');
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
