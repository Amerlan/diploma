<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Displays all documents that user have rejected
    public function rejected_by(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['executor_id', $user_id], ['is_rejected', True]])->get();
        //return $documents;
        return view('document_list', compact('documents'));
    }

    // Displays all documents that user wait for signing from other
    public function ongoing_by(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['created_by', $user_id], ['is_closed', False],
            ['is_rejected', False]])->get();
        //return $documents;
        return view('document_list', compact('documents'));
    }

    // Displays all documents that user have signed
    public function signed_by(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['executor_id', $user_id], ['is_closed', True]])->get();
        return view('document_list', compact('documents'));
    }



    // Displays all documents where user got reject
    public function rejected_from(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['created_by', $user_id], ['is_rejected', True]])->get();
        //return $documents;
        return view('document_list', compact('documents'));
    }

    // Displays all documents that user need to sign
    public function ongoing_from(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['executor_id', $user_id], ['is_closed', False],
            ['is_rejected', False]])->get();
        //return $documents;
        return view('document_list', compact('documents'));
    }

    // Documents that were signed by other
    public function signed_from(Request $request)
    {
        $user_id =  $request->user()->id;
        $documents = DB::table('documents')->where([['created_by', $user_id], ['is_closed', True]])->get();
        return view('document_list', compact('documents'));
    }

    public function toSign(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id
        $doc_type = $document->get('document_type');
        $max_stage = DB::table('document_types')
            ->where('document_type', $doc_type)
            ->get('stageCount'); // get Total amount of stages
        $current_stage = $document->get('current_stage'); // get current stage

        $document->update('current_stage', $current_stage+1); // increment our stage because of signing
        $document->update('last_change_date', date("Y-m-d H:i:s"));

//        $document->update('executor_id', $next); ВОТ ТУТ НАДО ПОДУМАТЬ КОМУ ПЕРЕДАВАТЬ НА ПОДПИСЬ ПОТОМ.

        // check was it last stage?
        if ($max_stage == $current_stage){
            // if yes, close document
            $document->update('is_closed', True);
            $document->update('signed_date', date("Y-m-d H:i:s"));
        }
        return redirect('/ongoing');
    }

    public function toReject(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id

        $document->update('current_stage', -1); // increment our stage because of signing
        $document->update('last_change_date', date("Y-m-d H:i:s"));
        $document->update('is_rejected', True);

        return redirect('/ongoing');
    }

    public function toReturn(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id
        $current_stage = $document->get('current_stage'); // get current stage
        if (!($current_stage == 1)) {
            $document->update('current_stage', $current_stage - 1);
        }
//        $document->update('executor_id', $previous); ВОТ ТУТ НАДО ПОДУМАТЬ КОМУ ПЕРЕДАВАТЬ НА ИЗМЕНЕНИЯ НАЗАД.

        return redirect('/ongoing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
