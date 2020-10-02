<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    // Просмотр всех заявок
    public function all(Request $request){
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])){
                return DB::table('documents')->orderBy('created_date')->get()->all();
            }
        }
    }

    // Shows page with creating new document form
    public function create(Request $request)
    {
        $user_id = $request->user()->id;
        $user_role_id = DB::table('role_user')->where('user_id','=',$user_id)->get('role_id')[0]->role_id;
        $types = DB::table('document_types')->get('document_type')->all();
        $executors = DB::table('role_user')->where('role_id','<', $user_role_id)->
            join('users', 'users.id', '=', 'role_user.user_id')->get(['user_id','name']);
        return view('documents_create', compact(['types','executors']));
    }


    // Stores a new document in DB.
    public function store(Request $request)
    {
        $document = new Documents();
        $document->document_type = $request->document_type;
        $document->executor_id = $request->executor_id;
        $document->created_by = $request->user()->id;
        $document->save();
        return redirect('ongoing_by');
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
