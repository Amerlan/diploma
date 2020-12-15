<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    public function see_templates()
    {
        $documents = Documents::all();
        return view('doctypes', compact('documents'));
    }

    public function show_document(Request $request, $document_id)
    {
//        return $document_name;
        $document = DB::table('documents')
            ->where('id', '=', $document_id)
            ->get()->all();
        $deans = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.role_name', '=', 'dean')
            ->get()
            ->all();
        $dav = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.role_name', '=', 'admin')
            ->get()
            ->all();

        $document_details = DB::table('document_details')
            ->where('id', '=', $document_id)
            ->get()->all();

//        return $document;
        $user = $request->user();
        return view('/document_templates/application', compact('document', 'deans', 'user', 'dav', 'document_details'));
    }


    // Shows page with creating new document form
    public function create(Request $request)
    {
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])) {
                return view('templates_create');
            }
        }

        return abort(401, 'Unauthorized request');
    }

    // Stores a new document in DB.
    public function store(Request $request)
    {
        return $request;
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
