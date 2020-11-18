@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.process_create')</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.choose_process_type')</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
    </div>

    <div hidden="true">
        <form id="create_proc" method="POST" action="{{route('create_process_post')}}">
            @csrf
            <input id="doc_name" name="document_name" value="">
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="list-group">
                @foreach($documents as $document)
                    <a href="{{route('create_process_post')}}" class="list-group-item list-group-item-action" onclick="
                                               document.getElementById('doc_name').value = {{$document->document_name}};
                                              document.getElementById('create_proc').submit();">

                        {{$document->document_name}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
