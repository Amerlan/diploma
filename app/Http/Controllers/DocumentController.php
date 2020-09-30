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
        else{
            return None;
        }
    }

    // Shows page with creating new document form
    public function create()
    {
        //return view('documents_create');
    }


    // Stores a new document in DB.
    public function store(Request $request)
    {
        $document = new Documents();
        $document->document_type = $request->type;
        $document->executor_id = $request->executor;
        $document->created_by = $request->user()->id;
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
