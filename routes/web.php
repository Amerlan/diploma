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
Route::get('/signed', [UserController::class, 'signed']); //displays signed documents by others
Route::get('/ongoing', [UserController::class, 'ongoing']); // displays documents that YOU need to sign
Route::get('/rejected', [UserController::class, 'rejected']); // displays rejected user's documents

Route::post('/sign/{doc_id}', [UserController::class, 'toSign'])->name('sign');
Route::post('/reject/{doc_id}', [UserController::class, 'toReject'])->name('reject');
Route::post('/return/{doc_id', [UserController::class, 'toReturn'])->name('return');

// For ADMIN only
Route::get('/all', [DocumentController::class, 'all']);

