@extends('layouts.app')

@section('content')
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
                    @if($document->is_rejected == 1) <td>Yes <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>No <i class="fas fa-circle" style="color:green"></i></td> @endif
                    <td>{{$document->created_date}}</td>
                    <td>{{$document->signed_date}}</td>
                    <td>{{$document->last_change_date}}</td>
                    @if($document->is_closed == 1) <td>Yes <i class="fas fa-circle" style="color:firebrick"></i> </td>  @else  <td>No <i class="fas fa-circle" style="color:green"></i></td> @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection