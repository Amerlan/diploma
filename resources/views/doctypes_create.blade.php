@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.create_template')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.create_template')</h1>
    </div>
    <form action="{{route('create_doctype')}}" method="POST">
        @csrf
        <div class="col-lg-7" style="float:none;margin:auto;padding-top: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create document type</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Document type</label>
                            <input type="text" class="form-control" name="doc_type" placeholder="Enter doc type">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Stage count</label>
                            <input type="text" class="form-control" name="stage_count" placeholder="Enter stage count">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Priority</label>
                            <input type="text" class="form-control" name="priority" placeholder="Enter priority">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a class="btn btn-default float-right" href="{{URL::to('/')}}">Cancel</a>
                    </div>
            </div>
        </div>
    </form>
@endsection
