@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.list_templates')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.list_templates')</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="list-group">
                @foreach($documents as $doc)
                    <a class="list-group-item list-group-item-action" href="{{route('templates_application', ['document_id' => $doc->id])}}">
                        {{$doc->document_name}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

<!--    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Document types</h3>
            <a href="{{--{{route('doctype_form')}}--}}" style="float: right;">+ Create new doc type</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>TYPE</th>
                    <th>Stage Count</th>
                    <th>Document Priority</th>
                </tr>
                </thead>
                <tbody>
                {{--@foreach($docs as $doc)
                    <tr>
                        <td>{{$doc->document_type}}</td>
                        <td>{{$doc->stageCount}}</td>
                        <td>{{$doc->document_priority}}</td>
                    </tr>
                @endforeach--}}
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
    </div>-->
@endsection
