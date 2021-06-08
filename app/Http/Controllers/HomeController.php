<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
        $user =  $request->user()->id;

        $processes = DB::table('processes')
            ->where([['created_by', $user]])
            ->where([['draft', 0]])
            ->orderBy('is_closed', 'asc')
            ->orderBy('is_rejected', 'asc')
            ->get(['process_id', 'document_name', 'current_stage',
                'created_date', 'closed_date', 'last_change_date','is_rejected', 'is_closed'])
            ->all();

        return view('my_processes', compact('processes'));
    }
}
