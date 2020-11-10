@extends('layouts.app')

@section('content')
    <div class="col-12">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('messages.doc_type')</th>
                <th>@lang('messages.executor')</th>
                <th>@lang('messages.created_by')</th>
                <th>@lang('messages.current_stage')</th>
                <th>@lang('messages.is_rejected')</th>
                <th>@lang('messages.created_date')</th>
                <th>@lang('messages.signed_date')</th>
                <th>@lang('messages.last_change_date')</th>
                <th>@lang('messages.is_closed')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->document_id}}</td>
                    <td>{{$document->document_type}}</td>
                    <td>{{$document->executor_role}} {{$document->executor_role_id}}</td>
                    <td>{{$document->name}} {{$document->created_by}}</td>
                    <td>{{$document->current_stage}}</td>
                    @if($document->is_rejected == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                    <td>{{$document->created_date}}</td>
                    <td>{{$document->signed_date}}</td>
                    <td>{{$document->last_change_date}}</td>
                    @if($document->is_closed == 1) <td>@lang('messages.yes') <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>@lang('messages.no') <i class="fas fa-circle" style="color:green"></i></td> @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
