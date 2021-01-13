<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Process_stages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\DocumentReceived;

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
        $query = 'SELECT
                    p.process_id, p.document_name, created_date, last_change_date, is_rejected, is_closed
                    FROM processes AS p
                    LEFT JOIN document_roles AS dr ON p.document_name=dr.document_name AND
                    dr.sign_order=p.current_stage
                    LEFT JOIN role_user AS ru ON ru.role_id=dr.role_id
                    LEFT JOIN process_stages AS ps ON ((ps.stage_number=p.current_stage) AND
                                                      (ps.process_id=p.process_id))
                    WHERE user_id='.$request->user()->id.'
                    AND is_rejected=0
                    AND is_closed=0
                   ';
        $ongoing_processes = DB::select($query);
//        return $ongoing_processes;


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
                    p.*, ps.*
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.stage_number=p.current_stage AND
                                                      p.process_id=ps.process_id
                    ';

        if (DB::select($query)){
            $process = DB::table('processes')->where('process_id', '=', $id)
                ->get();
            $process_stages = DB::table('process_stages')->where('process_id', '=', $id)
                ->get();
            $document_data = DB::table('documents')
                ->where('document_name', '=', $process[0]->document_name)
                ->get();
            $deans = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->where('roles.role_name', '=', 'dean')
                ->get()
                ->all();
            $dav = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->where('roles.role_name', '=', 'admin')
                ->get()
                ->all();
            $user = $request->user();

            //            return compact(['process_stages', 'process']);
            return view('process_details',
                compact('process',
                    'process_stages', 'document_data', 'deans', 'user', 'dav'));

        }
        else{
            abort(401, 'This action is unauthorized.');
        }

    }

    public function my_process_details(Request $request, $id)
    {
        $query = 'SELECT
                    p.*, ps.*
                    FROM processes AS p
                    LEFT JOIN process_stages AS ps ON ps.stage_number=p.current_stage AND
                                                      p.process_id=ps.process_id
                    ';

        if (DB::select($query)){
            $process = DB::table('processes')->where('process_id', '=', $id)
                ->get();
            $process_stages = DB::table('process_stages')->where('process_id', '=', $id)
                ->join('users', 'users.id', '=', 'process_stages.done_by')
                ->get(['stage_number', 'status', 'users.name as done_by', 'comment']);
            $document_data = DB::table('documents')
                ->where('document_name', '=', $process[0]->document_name)
                ->get();
            $deans = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->where('roles.role_name', '=', 'dean')
                ->get()
                ->all();
            $dav = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->where('roles.role_name', '=', 'admin')
                ->get()
                ->all();
            $user = $request->user();

            //            return compact(['process_stages', 'process']);
            return view('my_process_details',
                compact('process',
                    'process_stages', 'document_data', 'deans', 'user', 'dav'));

        }
        else{
            abort(401, 'This action is unauthorized.');
        }

    }

    public function qr(Request $request, $process_token)
    {
        return DB::table('processes')->where('process_token', '=', $process_token)
            ->get();
    }

    public function create_process(Request $request){
        $user = $request->user();
        if (!($user->isAdmin())){
            if (DB::table('processes')
                ->where('document_name', '=', $request->document_name)
                ->where('created_by', '=', $user->id)
                ->where('draft', '=', 1)
                ->exists()){
                DB::table('processes')
                    ->where('document_name', '=', $request->document_name)
                    ->where('created_by', '=', $user->id)
                    ->where('draft', '=', 1)
                    ->update([
                        'last_change_date' => date("Y-m-d H:i:s"),
                        'created_date' => date("Y-m-d H:i:s"),
                        'academic_year' => $request->academic_year,
                        'endterm_grade' => $request->endterm_grade,
                        'exam_grade' => $request->exam_grade,
                        'midterm_grade' => $request->midterm_grade,
                        'new_fio' => $request->new_fio,
                        'new_speciality' => $request->new_speciality,
                        'new_speciality_code' => $request->new_speciality_code,
                        'new_university' => $request->new_university,
                        'phone_number' => $request->phone_number,
                        'reason' => $request->reason,
                        'semester' => $request->semester,
                        'subject' => $request->subject,
                        'sum_of_return' => $request->sum_of_return,
                        'teacher' => $request->teacher
                    ]);

            }
            else{
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

                $process_id = DB::table('processes')
                    ->latest('created_date')
                    ->first('process_id')->process_id;

                $stages = DB::table('documents')
                    ->where('document_name', '=', $request->document_name)
                    ->get('stageCount')[0]->stageCount;

                for ($i=1; $i < $stages + 1; $i++){
                    $process_stages = new Process_stages();
                    $process_stages->process_id = $process_id;
                    $process_stages->stage_number = $i;
                    $process_stages->status = 'Ожидание';
                    $process_stages->save();
                }
            }

            return response()->json(1);
        }
        return response()->json(0);
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
