@extends('layouts.app')

@section('content')
    <div class="col-12">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('messages.role_name')</th>
                <th>@lang('messages.created_date')</th>
                <th>@lang('messages.updated_date')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->role_name}}</td>
                    <td>{{$role->created_at}}</td>
                    <td>{{$role->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
