<?php

namespace App\Http\Controllers;

use App\Models\Process;
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
                    p.process_id, p.document_name, created_date, last_change_date, is_rejected, is_closed, current_stage
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.process_id=p.process_id AND current_stage=stage_number
                     LEFT JOIN document_roles AS dr ON dr.document_name=p.document_name AND stage_number=sign_order
                     LEFT JOIN role_user AS ru ON ru.role_id=dr.role_id
                     WHERE
                     ru.user_id='.$request->user()->id.' AND (done_by IS NULL
                      OR
                    done_by='.$request->user()->id.') AND is_closed=0 AND is_rejected=0';

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

    public function create_process_list()
    {
        $documents = DB::table('documents')->get()->all();
        return view('create_process', compact('documents'));
    }

    public function create(Request $request, $document_id)
    {
        $document = DB::table('documents')
            ->where('id', '=', $document_id)
            ->get()
            ->all();
//        return $document;
        return view('fill_process', compact('document'));
    }

    public function process_details(Request $request, $id)
    {
        $query = 'SELECT
                    role_name
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.process_id=p.process_id AND current_stage=stage_number
                     LEFT JOIN document_roles AS dr ON dr.document_name=p.document_name AND stage_number=sign_order
                     LEFT JOIN role_user AS ru ON ru.role_id=dr.role_id
                     LEFT JOIN roles on roles.id=ru.role_id
                     WHERE
                     ru.user_id='.$request->user()->id.'
                      AND (done_by IS NULL OR done_by='.$request->user()->id.')
                    AND is_closed=0
                    AND is_rejected=0
                    AND p.process_id='.$id;

        if (DB::select($query)){
            $validator_role = DB::select($query)[0]->role_name;
        }
        else{
            abort(401, 'This action is unauthorized.');
        }

        if ($request->user()->authorizeRoles($validator_role)){

            $process = DB::table('processes')->where('process_id', '=', $id)
                ->get();
            $process_stages = DB::table('process_stages')->where('process_id', '=', $id)
                ->get();
//            return compact('process', 'process_stages');
            return view('process_details', compact('process', 'process_stages'));
        }
    }

    public function my_process_details(Request $request, $id)
    {
        $query = 'SELECT
                    role_name
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.process_id=p.process_id AND current_stage=stage_number
                     LEFT JOIN document_roles AS dr ON dr.document_name=p.document_name AND stage_number=sign_order
                     LEFT JOIN role_user AS ru ON ru.role_id=dr.role_id
                     LEFT JOIN roles on roles.id=ru.role_id
                     WHERE
                     ru.user_id='.$request->user()->id.'
                      AND (done_by IS NULL OR done_by='.$request->user()->id.')
                    AND is_closed=0
                    AND is_rejected=0
                    AND p.process_id='.$id;

        if (DB::select($query)){
            $validator_role = DB::select($query)[0]->role_name;
        }
        else{
            abort(401, 'This action is unauthorized.');
        }

        if ($request->user()->authorizeRoles($validator_role)){

            $process = DB::table('processes')->where('process_id', '=', $id)
                ->get();
            $process_stages = DB::table('process_stages')->where('process_id', '=', $id)
                ->get();
            //return compact('process', 'process_stages');
            return view('my_process_details', compact('process', 'process_stages'));
        }
    }

    public function index()
    {
        //
    }

    public function create_process(Request $request){
        if (!($request->user()->isAdmin())){
            $process = new Process();
            $process->document_name = $request->document_name;
            $process->academic_year = $request->academic_year;
            $process->endterm_grade = $request->endterm_grade;
            $process->exam_grade = $request->exam_grade;
            $process->midterm_grade = $request->midterm_grade;
            $process->new_fio = $request->new_fio;
            $process->new_speciality = $request->new_speciality;
            $process->new_speciality_code = $request->new_speciality_code;
            $process->new_university = $request->new_university;
            $process->phone_number = $request->phone_number;
            $process->reason = $request->reason;
            $process->semester = $request->semester;
            $process->subject = $request->subject;
            $process->sum_of_return = $request->sum_of_return;
            $process->teacher = $request->teacher;
            $process->created_by = $request->user()->id;
            $process->save();
            return $request;
        }
        return $request;
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
