@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.processes_list')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.processes_list')</h1>
    </div>

    <div class="card-body">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>@lang('messages.process') ID</th>
                <th>@lang('messages.document_name')</th>
                <th>@lang('messages.stage_count')</th>
                <th>@lang('messages.creator_name')</th>
                <th>@lang('messages.current_stage')</th>
                <th>@lang('messages.created_date')</th>
                <th>@lang('messages.closed_date')</th>
                <th>@lang('messages.last_change_date')</th>
                <th>@lang('messages.is_rejected')</th>
                <th>@lang('messages.is_closed')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($processes as $process)
                <tr>
                    <td>{{$process->process_id}}</td>
                    <td>{{$process->document_name}}</td>
                    <td>{{$process->stageCount}}</td>
                    <td>{{$process->name}}</td>
                    <td>{{$process->current_stage}}</td>
                    <td>{{$process->created_date}}</td>
                    <td>{{$process->closed_date}}</td>
                    <td>{{$process->last_change_date}}</td>
                    @if($process->is_rejected == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                    @if($process->is_closed == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
