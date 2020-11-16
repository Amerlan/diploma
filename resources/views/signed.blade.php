@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.signed_processes')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.signed_processes')</h1>
    </div>

    <div class="card-body">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>@lang('messages.process') ID</th>
                <th>@lang('messages.document_name')</th>
                <th>@lang('messages.comment')</th>
                <th>@lang('messages.last_change_date')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($signed_processes as $process)
                <tr>
                    <td>{{$process->process_id}}</td>
                    <td>{{$process->document_name}}</td>
                    <td>{{$process->comment}}</td>
                    <td>{{$process->last_change_date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
