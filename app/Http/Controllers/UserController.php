<?php

namespace App\Http\Controllers;

use App\Models\Document_stages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Display all users for Admin
    public function all_users(Request $request)
    {
        if ($request->user()) {
            if ($request->user()->authorizeRoles(['admin'])) {
                $users = DB::table('users')->get()->all();
                return view('users_list', compact('users'));
            }
        }
        return abort(401, 'Unauthorized request');
    }



    public function toSign(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id
        $doc_type = $document->get('document_type')->take(1)[0]->document_type;
        $max_stage = DB::table('document_types')
            ->where('document_type', $doc_type)
            ->get('stageCount')->take(1)[0]->stageCount; // get Total amount of stages
        $current_stage = $document->get('current_stage')->take(1)[0]->current_stage; // get current stage
        $document->update(['current_stage' => intval($current_stage)+1]); // increment our stage because of signing
        $document->update(['last_change_date' => date("Y-m-d H:i:s")]);

        //ВРЕМЕННО ОФНУТО
//        $document->update('executor_id', $next); ВОТ ТУТ НАДО ПОДУМАТЬ КОМУ ПЕРЕДАВАТЬ НА ПОДПИСЬ ПОТОМ.

        // check was it last stage?
        if ($max_stage == $current_stage){
            // if yes, close document
            $document->update(['is_closed' => True]);
            $document->update(['signed_date' => date("Y-m-d H:i:s")]);
        }

        // Затравочка на будущее
//        $stages = new Document_stages();
//        $stages->document_id = $doc_id;
//        $stages->current_role_id = $request->user()->user_role - 1;
//        $stages->signed_by = $request->user()->id;
//        $stages->returned_by = null;
//        $stages->rejected_by = null;
//        $stages->comment = $request->comment;
//        $stages->save();


        return redirect()->back();
    }

    public function toReject(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id

        $document->update(['current_stage' => -1]); // increment our stage because of signing
        $document->update(['last_change_date' => date("Y-m-d H:i:s")]);
        $document->update(['is_rejected' => True]);

        // Затравочка на будущее
//        $stages = new Document_stages();
//        $stages->document_id = $doc_id;
//        $stages->current_role_id = $request->user()->user_role - 1;
//        $stages->signed_by = null;
//        $stages->returned_by = null;
//        $stages->rejected_by = $request->user()->id;
//        $stages->comment = $request->comment;
//        $stages.save();

        return redirect()->back();
    }

    public function toReturn(Request $request, $doc_id)
    {
        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id
        $current_stage = $document->get('current_stage')->take(1)[0]->current_stage; // get current stage
        if ($current_stage != 1) {
            $document->update(['current_stage' => ($current_stage - 1)]);
        }
//        $document->update('executor_id', $previous); ВОТ ТУТ НАДО ПОДУМАТЬ КОМУ ПЕРЕДАВАТЬ НА ИЗМЕНЕНИЯ НАЗАД.

        // Затравочка на будущее
//        $stages = new Document_stages();
//        $stages->document_id = $doc_id;
//        $stages->current_role_id = $request->user()->user_role - 1;
//        $stages->signed_by = null;
//        $stages->returned_by = $request->user()->id;
//        $stages->rejected_by = null;
//        $stages->comment = $request->comment;
//        $stages.save();

        return redirect()->back();
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
