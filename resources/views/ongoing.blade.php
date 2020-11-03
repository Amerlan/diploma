@extends('layouts.admin')

@section('content')
        @foreach($documents as $document)
            <h3>doc id: {{$document->document_id}}</h3>
            <h2>doc type: {{$document->document_type}}</h2>
            <h4>executor role: {{$document->executor_role}} {{$document->executor_role_id}}</h4>
            <h4>Initiator: {{$document->name}} {{$document->created_by}}</h4>
            <h4>Current stage: {{$document->current_stage}}</h4>
            <h4 style="@if($document->is_rejected)background-color:green; @else background-color:red; @endif">Is rejected: {{$document->is_rejected}}</h4>
            <h5>Created date: {{$document->created_date}}</h5>
            <h5>Signed date: {{$document->signed_date}}</h5>
            <h5>Last change date: {{$document->last_change_date}}</h5>
            <h4 style="@if($document->is_closed)background-color:green; @else background-color:red; @endif">Is closed: {{$document->is_closed}}</h4>
            <a href="{{route('sign', ['doc_id'=>$document->document_id])}}"><h2>Sign</h2></a>
            <a href="{{route('reject', ['doc_id'=>$document->document_id])}}"><h2>Reject</h2></a>
            <a href="{{route('return', ['doc_id'=>$document->document_id])}}"><h2>Return</h2></a>
            <hr>
        @endforeach
@endsection
