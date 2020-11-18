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

                //return $processes;

                return view('all_processes', compact('processes'));
            }
        }
    }

    // Displays all documents that user have rejected
    public function user_processes(Request $request)
    {
        $user =  $request->user()->id;

        $processes = DB::table('processes')->where([['created_by', $user]])
            ->orderBy('is_closed', 'asc')
            ->orderBy('is_rejected', 'asc')
            ->get(['process_id', 'document_name', 'current_stage',
                'created_date', 'closed_date', 'last_change_date','is_rejected', 'is_closed'])
            ->all();

        //return $processes;

        return view('my_processes', compact('processes'));
    }

    // Displays all INCOMING requests to sign
    public function ongoing(Request $request)
    {
        // distinct , done_by
        $query = 'SELECT
                    p.process_id, p.document_name, created_date, last_change_date, is_rejected, is_closed
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.process_id=p.process_id AND current_stage=stage_number
                     LEFT JOIN document_roles AS dr ON dr.document_name=p.document_name AND stage_number=sign_order
                     LEFT JOIN role_user AS ru ON ru.role_id=dr.role_id
                     WHERE
                     ru.user_id='.$request->user()->id.' AND (done_by IS NULL
                      OR
                    done_by='.$request->user()->id.')';

        $ongoing_processes = DB::select($query);

        //return $processes;

        return view('ongoing', compact('ongoing_processes'));
    }

    // Displays all documents that user have signed
    public function signed(Request $request)
    {
        $user_id = $request->user()->id;

        $signed_processes = DB::table('process_stages as stages')
            ->join('processes as p', 'p.process_id', '=', 'stages.process_id')
            ->where('done_by', '=', $user_id)
            ->get()
            ->all();

        //return $signed_processes;

        return view('signed', compact('signed_processes'));
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
