@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.profile')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.profile')</h1>
    </div>

    @foreach($user as $user)
        <div class="container-fluid col-md-6">
            <div class="card card-primary align-items-center">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-profile rounded-circle" src={{$user->url}}>
                        <h3 id="name"></h3>
                        <p class="text-muted">@lang('messages.role') - {{$user->roles}}</p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b class="float-left">DL ID:</b>
                                <a class="float-right">{{$user->dl_id}}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Dl mail:</b>
                                <a class="float-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->dl_mail}}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Email:</b>
                                <a class="float-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
    const user = <?php  echo json_encode($user);?>;
    const str = `{{$user->show_name}}`;
    var element = document.getElementById("name");
    element.innerHTML = str;
</script>
@endsection
