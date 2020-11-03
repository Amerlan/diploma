<?php

namespace App\Http\Controllers;

use App\Models\DocumentTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $docs = DocumentTypes::all();
        return view('doctypes', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])) {
                return view('doctypes_create');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])){
                $new_doc = new DocumentTypes;
                $new_doc->document_type = $request->doc_type;
                $new_doc->executor_role = $request->exector_role;
                $new_doc->stageCount = $request->stage_count;
                $new_doc->document_priority = $request->priority;
                $new_doc->save();
                return $this->index();
            }
        }
        else{
            return None;
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
