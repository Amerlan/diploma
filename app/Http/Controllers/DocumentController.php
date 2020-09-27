<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Displays all documents
    public function index()
    {
        return view('documents_list');
    }


    // Creates a new document
    public function create()
    {
        //
    }


    // Need to change for private function.
    public function store(Request $request)
    {
        //
    }


    // Displays the certain document
    public function show($id)
    {
        //
    }


    // dont know how we can use it
    public function edit($id)
    {
        //
    }


    // Update status of document
    public function update(Request $request, $id)
    {
        //
    }


    // Deletes (changes to is_closed to True) document
    public function destroy($id)
    {
        //
    }
}
