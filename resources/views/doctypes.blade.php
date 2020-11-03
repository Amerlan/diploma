@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Document types</h3>
        <a href="{{route('doctype_form')}}" style="float: right;">+ Create new doc type</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>TYPE</th>
                <th>Stage Count</th>
                <th>Document Priority</th>
            </tr>
            </thead>
            <tbody>
            @foreach($docs as $doc)
                <tr>
                    <td>{{$doc->document_type}}</td>
                    <td>{{$doc->stageCount}}</td>
                    <td>{{$doc->document_priority}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>TYPE</th>
                <th>Stage Count</th>
                <th>Document Priority</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
