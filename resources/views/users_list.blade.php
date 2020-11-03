@extends('layouts.app')

@section('content')
    <div class="col-12">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО пользователя</th>
                <th>Почта</th>
                <th>DL ID</th>
                <th>DL почта</th>
                <th>Приорити</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
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
                        <td>{{$user->user_priority}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
