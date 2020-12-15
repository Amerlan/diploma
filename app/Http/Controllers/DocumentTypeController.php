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


    public function create(Request $request)
    {
        /*if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])) {
                return view('doctypes_create');
            }
        }

        return abort(401, 'Unauthorized request');*/
    }

    public function store(Request $request)
    {
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])){
                $new_doc = new DocumentTypes;
                $new_doc->document_type = $request->document_type;
                $new_doc->save();
                return $this->index();
            }
        }
        else{
            return abort(401, 'Unauthorized request');;
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
