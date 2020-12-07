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


    public function toSign($request)
    {

//        $validator_role = DB::table('processes')
//            ->join('document_roles', 'processes.document_name', '=','document_roles.document_name')
//            ->whereColumn('current_stage', '=', 'sign_order')
//            ->where('current_stage', '=', $request->stage)
//            ->where('process_id', '=', $request->process_id)
//            ->get('role_id')->take(1)[0]->role_id;


        $last_stage = DB::table('processes as p')
            ->join('documents as d', 'p.document_name', '=', 'd.document_name')
            ->where('p.process_id', '=', $request->process_id)
            ->get('stageCount')->take(1)[0]->stageCount;


        $current_stage = DB::table('processes')
            ->where('process_id', '=', $request->process_id)
            ->get('current_stage')->take(1)[0]->current_stage;

        DB::table('process_stages as ps')
            ->where('stage_number', '=',  $request->stage)
            ->where('process_id', '=', $request->process_id)
            ->update([
                'status' => 'Подписано',
                'done_by' => $request->user()->id,
                'comment' => $request->comment,
                'last_edited_date' => date("Y-m-d H:i:s")
            ]);

        if (intval($request->stage) < intval($last_stage)){

            DB::table('processes')
                ->where('process_id', '=', $request->process_id)
                ->update([
                    'last_change_date' => date("Y-m-d H:i:s"),
                    'current_stage' => intval($current_stage) + 1
                ]);
        }
        if (intval($request->stage) === intval($last_stage)){
            DB::table('processes')
                ->where('process_id', '=', $request->process_id)
                ->update([
                    'is_closed' => 1,
                    'last_change_date' => date("Y-m-d H:i:s"),
                    'closed_date' => date("Y-m-d H:i:s")
                    ]);
        }


        return redirect('/ongoing');
    }

    public function toReject($request)
    {
        DB::table('process_stages as ps')
            ->where('stage_number', '=',  $request->stage)
            ->where('process_id', '=', $request->process_id)
            ->update([
                'status' => 'Отказано',
                'done_by' => $request->user()->id,
                'comment' => $request->comment,
                'last_edited_date' => date("Y-m-d H:i:s")
            ]);


            DB::table('processes')
                ->where('process_id', '=', $request->process_id)
                ->update([
                    'is_rejected' => 1,
                    'is_closed' => 1,
                    'last_change_date' => date("Y-m-d H:i:s"),
                    'closed_date' => date("Y-m-d H:i:s")
                ]);

        return redirect('/ongoing');
    }

    public function toReturn($request)
    {
        $current_stage = DB::table('processes')
            ->where('process_id', '=', $request->process_id)
            ->get('current_stage')->take(1)[0]->current_stage;

        if (intval($current_stage)===1){
            return 0;
        }
        else{
            DB::table('process_stages as ps')
                ->where('stage_number', '=',  $request->stage)
                ->where('process_id', '=', $request->process_id)
                ->update([
                    'status' => 'Возвращено на доработку',
                    'done_by' => $request->user()->id,
                    'comment' => $request->comment,
                    'last_edited_date' => date("Y-m-d H:i:s")
                ]);

            DB::table('processes')
                ->where('process_id', '=', $request->process_id)
                ->update([
                    'last_change_date' => date("Y-m-d H:i:s"),
                    'current_stage' => intval($current_stage) - 1
                ]);
            return redirect('/ongoing');
        }

    }

    public function sign_return_reject(Request $request){
        if ($request->action === 'sign'){
            return $this->toSign($request);
        }
        if ($request->action === 'return'){
            return $this->toReturn($request);
        }
        if ($request->action === 'reject'){
            return $this->toReject($request);
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        if ($request->user()) {

            $user = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_id', '=', 'roles.id')
                ->groupBy('dl_id')
                ->groupBy('dl_mail')
                ->groupBy('email')
                ->groupBy('name')
                ->groupBy('show_name')
                ->groupBy('url')
                ->select('name', 'dl_id', 'dl_mail',
                    'email', 'url', 'show_name')
                ->selectRaw('GROUP_CONCAT(role_name SEPARATOR ", ") as roles')
                ->where('users.id', '=', $request->user()->id)
                ->get()
                ->all();

//                return $user;
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
