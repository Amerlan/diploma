<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    // Просмотр всех заявок
    public function all(Request $request){
        if ($request->user()){
            if ($request->user()->authorizeRoles(['admin'])){
                $documents = DB::table('processes')
                    ->join('roles', 'roles.id', '=', 'processes.executor_role_id')
                    ->join('users AS creator', 'processes.created_by', '=', 'creator.id')
                    ->join('documents as docs', 'processes.document_id', '=', 'docs.document_id')
                    ->get(['process_id', 'document_name', 'current_stage', 'executor_role_id',
                        'roles.role_name as executor_role',
                        'created_by', 'creator.name as name', 'is_rejected', 'created_date',
                        'signed_date', 'last_change_date','is_closed']);
                return view('all_documents', compact('documents'));
            }
        }
    }

    // Shows page with creating new document form
    public function create(Request $request)
    {
        $role = $request->user()->user_role;
        #
        $types = DB::table('document_types')
            ->get('document_type')->all();
//            ->where([['executor_role', $role]])

        return view('documents_create', compact('types'));
    }

    // Stores a new document in DB.
    public function store(Request $request)
    {
        $document = new Documents();
        $document->document_type = $request->document_type;
        $executor_role = DB::table('document_types')
                                ->where('document_type', '=',$request->document_type)
                                ->get('executor_role')
                                ->all()[0]->executor_role;
        $document->executor_role_id = $executor_role;
        $document->created_by = $request->user()->id;
        $document->save();
        return redirect('ongoing_by');
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
