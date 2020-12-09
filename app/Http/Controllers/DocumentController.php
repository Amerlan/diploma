<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    public function show_document(Request $request, $document_name)
    {

    }


    // Shows page with creating new document form
    public function create()
    {
        $types = DB::table('document_types')
            ->get('document_type')->all();

        return view('documents_create', compact('types'));
    }

    // Stores a new document in DB.
    public function store(Request $request)
    {
        $document = new Documents();

        $document->document_name = $request->document_name;
        $document->document_type = $request->document_type;
        $document->stageCount = $request->stageCount;

        $document->save();
        return redirect('ongoing');
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
