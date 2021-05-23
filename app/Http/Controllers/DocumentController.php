<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Document_details;
use App\Models\Document_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    public function see_templates()
    {
        $documents = Documents::all();
        return view('doctypes', compact('documents'));
    }

    public function show_document(Request $request, $document_id)
    {
        $user = $request->user();
        $document = DB::table('documents')
            ->where('id', '=', $document_id)
            ->get()->all();
        $document_details = DB::table('document_details')
            ->where('document_name', '=', $document[0]->document_name)
            ->get()->all();
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
        $teachers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.role_name', '=', 'teacher')
            ->get()
            ->all();

        return view('/document_templates/application',
        compact('document', 'deans', 'user', 'dav', 'document_details', 'teachers'));
    }


    // Shows page with creating new document form
    public function create(Request $request)
    {
        $document_types = DB::table('document_types')
            ->get();
        $roles = DB::table('roles')
            ->get()->all();
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])) {
                return view('templates_create', compact('document_types', 'roles'));
            }
        }

        return abort(401, 'Unauthorized request');
    }

    // Stores a new document in DB.
    public function store(Request $request)
    {
        $stages = explode(',', $request->role_order);
        $document = new Documents();
        $document_details = new Document_details();

        $document->document_name = $request->document_name;
        $document->document_type = $request->document_type;
        $document->stageCount = $request->stageCount;
        $document->header = $request->header;
        $document->title = 'Title';#$request->title;
        $document->body = $request->body;
        $document->save();

        if (count($stages) === intval($request->stageCount)){
            for ($i=0; $i<count($stages); $i++){
                $document_roles = new Document_roles();
                $document_roles->document_name = $request->document_name;
                $document_roles->role_id = $stages[$i];
                $document_roles->sign_order = $i + 1;
                $document_roles->save();
            };
        }

        $document_details->document_name = $request->document_name;
        if ($request->reason){
            $document_details->reason = True;
        }
        if ($request->new_fio){
            $document->new_fio = $request->new_fio;
            $document_details->new_fio = True;
        }
        if ($request->new_speciality){
            $document_details->new_speciality = True;
        }
        if ($request->new_speciality_code){
            $document_details->new_speciality_code = True;
        }
        if ($request->sum_of_return){
            $document_details->sum_of_return = True;
        }
        if ($request->new_university){
            $document_details->new_university = True;
        }
        if ($request->academic_year){
            $document_details->academic_year = True;
        }
        if ($request->subject){
            $document_details->subject = True;
        }
        if ($request->midterm_grade){
            $document_details->midterm_grade = True;
        }
        if ($request->endterm_grade){
            $document_details->endterm_grade = True;
        }
        if ($request->exam_grade){
            $document_details->exam_grade = True;
        }
        if ($request->teacher){
            $document_details->teacher = True;
        }
        if ($request->semester){
            $document_details->semester = True;
        }
        if ($request->phone_number){
            $document_details->phone_number = True;
        }
        if ($request->attachments){
            $document_details->attachments = True;
        }
        $document_details->save();
        return redirect('/');
    }


    // Displays the certain document
    public function show($id)
    {
        //
    }


    // dont know how we can use it
    public function edit($id)
    {
        //
    }


    // Update status of document
    public function update(Request $request, $id)
    {
        //
    }


    // Deletes (changes to is_closed to True) document
    public function destroy($id)
    {
        //
    }
}
