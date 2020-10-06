@extends('layouts.admin')
@section('content')
       <!-- @foreach($documents as $document)
            <h3>doc id: {{$document->document_id}}</h3>
            <h2>doc type: {{$document->document_type}}</h2>
            <h4>executor: {{$document->ename}} {{$document->executor_id}}</h4>
            <h4>Initiator: {{$document->cname}} {{$document->created_by}}</h4>
            <h4>Current stage: {{$document->current_stage}}</h4>
            <h4 style="@if($document->is_rejected)background-color:green; @else background-color:red; @endif">Is rejected: {{$document->is_rejected}}</h4>
            <h5>Created date: {{$document->created_date}}</h5>
            <h5>Signed date: {{$document->signed_date}}</h5>
            <h5>Last change date: {{$document->last_change_date}}</h5>
            <h4 style="@if($document->is_closed)background-color:green; @else background-color:red; @endif">Is closed: {{$document->is_closed}}</h4>
            <hr>
        @endforeach-->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Document type</th>
                <th>Executor id</th>
                <th>Created By</th>
                <th>Current Stage</th>
                <th>Is rejected</th>
                <th>Created date</th>
                <th>Signed date</th>
                <th>Last change date</th>
                <th>Is closed</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->document_id}}</td>
                    <td>{{$document->document_type}}</td>
                    <td>{{$document->ename}} {{$document->executor_id}}</td>
                    <td>{{$document->cname}} {{$document->created_by}}</td>
                    <td>{{$document->current_stage}}</td>
                    <td>{{$document->is_rejected}}</td>
                    <td>{{$document->created_date}}</td>
                    <td>{{$document->signed_date}}</td>
                    <td>{{$document->last_change_date}}</td>
                    <td>{{$document->is_closed}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
