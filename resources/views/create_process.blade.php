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

    <div class="row">
        <div class="col-12">
            <div class="list-group">
                @foreach($documents as $document)
                    <a class="list-group-item list-group-item-action" href={{route('create_proc', ['document_id' => $document->id])}}>
                        {{$document->document_name}}
                    </a>
                @endforeach
                <a class="list-group-item list-group-item-action" href={{route('templates')}}>
                    Заявление(шаблон)
                </a>
            </div>
        </div>
    </div>

@endsection
