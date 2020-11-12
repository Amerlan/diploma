<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessController extends Controller
{
    // Просмотр всех процессов
    public function all(Request $request){
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])){
                $processes = DB::table('processes')
                    ->join('users AS creator', 'processes.created_by', '=', 'creator.id')
                    ->join('documents as docs', 'processes.document_name', '=', 'docs.document_name')
                    ->get(['process_id', 'docs.document_name', 'stageCount','creator.name as name', 'current_stage',
                        'is_rejected', 'is_closed', 'created_date',
                        'closed_date', 'last_change_date']);

                return view('all_documents', compact('processes'));
            }
        }
    }

    // Displays all documents that user have rejected
    public function user_processes(Request $request)
    {
        $user =  $request->user()->id;
        $processes = DB::table('processes')->where([['created_by', $user]])
            ->get(['process_id', 'document_name', 'current_stage',
                'roles.role_name as executor_role', 'created_date',
                'closed_date', 'last_change_date','is_rejected', 'is_closed'])
            ->orderBy('is_closed', 'asc')
            ->orderBy('is_rejected', 'asc');

        return $processes;
        return view('document_list', compact('processes'));
    }

    // Displays all INCOMING requests to sign
    public function ongoing(Request $request)
    {
        $user_role =  $request->user()->user_role;
        $user_id = $request->user()->id;
        return DB::table('processes')
            ->join('document_roles', 'processes.document_name', '=','document_roles.document_name')
            ->whereColumn('current_stage', '=', 'sign_order')
            ->where('role_id', '=', $user_role)
            ->get(["process_id", "processes.document_name", "created_by", "created_date", 'current_stage'])->all();

        return view('document_list', compact('documents'));
    }

    // Displays all documents that user have signed
    public function signed(Request $request)
    {
        $user_role = $request->user()->user_role;

        return DB::table('process_stages')
            ->where('done_by', '=', $user_role)
            ->get("process_id")->all();

        return view('document_list', compact('documents'));
    }


    public function index()
    {
        //
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
