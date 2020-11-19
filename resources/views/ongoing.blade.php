@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.incoming_processes')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.incoming_processes')</h1>
    </div>

    <div class="card-body">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>@lang('messages.process') ID</th>
                <th>@lang('messages.document_name')</th>
                <th>@lang('messages.created_date')</th>
                <th>@lang('messages.last_change_date')</th>
                <th>@lang('messages.is_rejected')</th>
                <th>@lang('messages.is_closed')</th>
                <th>@lang('messages.details')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ongoing_processes as $process)
                <tr>
                    <td>{{$process->process_id}}</td>
                    <td>{{$process->document_name}}</td>
                    <td>{{$process->created_date}}</td>
                    <td>{{$process->last_change_date}}</td>
                    @if($process->is_rejected == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                    @if($process->is_closed == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                    <td>
                        <a href={{ route('process_details',['id' => $process ->process_id] )}} class="btn btn-primary btn-sm">@lang('messages.more_details')</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
