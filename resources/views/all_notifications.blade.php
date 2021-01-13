@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.notifications')</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="list-group">
                @foreach(auth()->user()->notifications  as $notification)
                    <a class="list-group-item list-group-item-action" href={{ route('mark_as_read',['notification_id' => $notification->id, 'process_id' => $notification->data['process_id'] ])}}>@lang('messages.document') "{{$notification->data['document_name']}}"
                        @if($notification->data['status']==1)
                            @lang('messages.signed')
                        @elseif($notification->data['status']==0)
                            @lang('messages.denied')
                        @elseif($notification->data['status']==3)
                            @lang('messages.returned')
                        @endif
                        <span class="small text-gray-500" style="float: right;">{{$notification->created_at}}</span></a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
