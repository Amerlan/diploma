<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');


Route::get('/doc_types', [DocumentTypeController::class, 'index']);

Route::get('/doc_types/create_form', [DocumentTypeController::class, 'create'])->name('doctype_form');
Route::post('/create_document_type', [DocumentTypeController::class, 'store'])->name('create_doctype');

Route::get('documents/create_form', [DocumentController::class, 'create'])->name('document_form');
Route::post('/create_document', [DocumentController::class, 'store'])->name('create_doc');

// For all of roles but in the future need to change access
Route::get('/signed_by', [UserController::class, 'signed_by'])->name('sign_by'); // Documents that user wait for signing from other
Route::get('/ongoing_by', [UserController::class, 'ongoing_by'])->name('ongoing_in'); // displays documents that YOU need to sign
Route::get('/rejected_by', [UserController::class, 'rejected_by'])->name('rejected_by'); // Documents that user have rejected

Route::get('/signed_from', [UserController::class, 'signed_from'])->name('sign_from'); // Documents that were signed by other
Route::get('/ongoing_from', [UserController::class, 'ongoing_from'])->name('ongoing_out'); // Documents that user need to sign
Route::get('/rejected_from', [UserController::class, 'rejected_from'])->name('rejected_from'); // Documents where user got reject

Route::get('/sign/{doc_id}', [UserController::class, 'toSign'])->name('sign');
Route::get('/reject/{doc_id}', [UserController::class, 'toReject'])->name('reject');
Route::get('/return/{doc_id}', [UserController::class, 'toReturn'])->name('return');

// For ADMIN only
Route::get('/all', [DocumentController::class, 'all']);

