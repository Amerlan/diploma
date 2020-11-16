@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.list_users')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.list_users')</h1>
    </div>
    <div class="col-12">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('messages.username')</th>
                <th>@lang('messages.email')</th>
                <th>DL ID</th>
                <th>@lang('messages.dl_email')</th>
                <th>@lang('messages.roles')</th>
                <th>@lang('messages.created_date')</th>
                <th>@lang('messages.updated_date')</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->dl_id}}</td>
                        <td>{{$user->dl_mail}}</td>
                        <td>{{$user->roles}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
