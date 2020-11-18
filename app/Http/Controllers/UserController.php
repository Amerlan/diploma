<?php

namespace App\Http\Controllers;

use App\Models\Document_stages;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Display all users for Admin
    public function all_users(Request $request)
    {
        if ($request->user()) {
            if ($request->user()->authorizeRoles(['admin'])) {
                $users = DB::table('users')
                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->join('roles', 'role_id', '=', 'roles.id')
                    ->groupBy('users.id')
                    ->groupBy('dl_id')
                    ->groupBy('dl_mail')
                    ->groupBy('email')
                    ->groupBy('user_id')
                    ->groupBy('name')
                    ->groupBy('users.created_at')
                    ->groupBy('users.updated_at')
                    ->select('users.id', 'name', 'dl_id', 'dl_mail',
                        'email', 'users.created_at', 'users.updated_at')
                    ->selectRaw('GROUP_CONCAT(role_name SEPARATOR ", ") as roles')
                    ->get()
                    ->all();
                //return $users;
                return view('users_list', compact('users'));
            }
        }
        return abort(401, 'Unauthorized request');
    }


    public function toSign(Request $request)
    {

        $validator_role = DB::table('processes')
            ->join('document_roles', 'processes.document_name', '=','document_roles.document_name')
            ->whereColumn('current_stage', '=', 'sign_order')
            ->where('current_stage', '=', $request->stage)
            ->where('process_id', '=', $request->process_id)
            ->get('role_id')->take(1)[0]->role_id;

//        if ($request->user()->authorizeRoles([$validator_role]) ){
//
//            return $request;
//        }
//        $last_stage = DB::table('processes as p')
//            ->join('documents as d', 'p.document_name', '=', 'd.document_name')
//            ->where('p.process_id', '=', $request->process_id)
//            ->get('stageCount')->take(1)[0]->stageCount;
//
//        $current_stage = DB::table('processes')
//            ->where('process_id', '=', $request->process_id)
//            ->get('current_stage')->take(1)[0]->current_stage;
//
//        DB::table('process_stages as ps')
//            ->where('stage_number', '=',  $request->stage)
//            ->where('process_id', '=', $request->process_id)
//            ->update([
//                'status' => 'Подписано',
//                'done_by' => $request->user()->id,
//                'comment' => $request->comment,
//                'last_edited_date' => date("Y-m-d H:i:s")
//            ]);
//
//        if ($request->stage < $last_stage){
//
//            DB::table('processes')
//                ->where('process_id', '=', $request->process_id)
//                ->update([
//                    'last_change_date' => date("Y-m-d H:i:s"),
//                    'current_stage' => intval($current_stage) + 1
//                ]);
//        }
//        if ($request->stage === $last_stage){
//            DB::table('processes')
//                ->where('process_id', '=', $request->process_id)
//                ->update([
//                    'is_closed' => 1,
//                    'closed_date' => date("Y-m-d H:i:s")
//                    ]);
//        }





//        $document = DB::table('documents')->where('document_id', $doc_id); // searching our doc by id
//        $doc_type = $document->get('document_type')->take(1)[0]->document_type;
//        $max_stage = DB::table('document_types')
//            ->where('document_type', $doc_type)
//            ->get('stageCount')->take(1)[0]->stageCount; // get Total amount of stages
//        $current_stage = $document->get('current_stage')->take(1)[0]->current_stage; // get current stage
//        $document->update(['current_stage' => intval($current_stage)+1]); // increment our stage because of signing
//        $document->update(['last_change_date' => date("Y-m-d H:i:s")]);
//
//



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
    public function show(Request $request)
    {
        if ($request->user()) {

            $users = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_id', '=', 'roles.id')
                ->groupBy('dl_id')
                ->groupBy('dl_mail')
                ->groupBy('email')
                ->groupBy('name')
                ->select('name', 'dl_id', 'dl_mail',
                    'email')
                ->selectRaw('GROUP_CONCAT(role_name SEPARATOR ", ") as roles')
                ->where('users.id', '=', $request->user()->id)
                ->get()
                ->all();

            return $users;
                return view('profile', compact('user'));
        }

        return abort(401, 'Unauthorized request');


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
