@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item"><a href="{{route('processes')}}">@lang('messages.my_processes')</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{$process[0]->document_name}}
                </li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$document_data[0]->document_type}}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-4 offset-8">
                                    <div class="row">
                                        <div class="col-12" id="header">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text">
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h2 class="text-center">{{$document_data[0]->document_type}}</h2>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-8 offset-2" id="body">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 offset-8">
                                    Дата: <b>{{$process[0]->created_date}}</b>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 offset-8">
                                    Подпись:
                                </div>
                            </div>
                            <div class="row mt-3 pb-5">
                                @if($process[0]->process_token)
                                <div class="col-2 offset-8">
                                    {!! QrCode::generate('http://127.0.0.1:8000/qr/'.$process[0]->process_token); !!}
                                </div>
                                @endif
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center">@lang('messages.status')</h2>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('messages.stage_number')</th>
                                        <th>@lang('messages.condition')</th>
                                        <th>@lang('messages.comment')</th>
                                        <th>@lang('messages.executor')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($process_stages as $stage)
                                        <tr>
                                            <td>{{$stage->stage_number}}</td>
                                            <td>{{$stage->status}}</td>
                                            <td>{{$stage->comment}}</td>
                                            <td>{{$stage->done_by}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                const user = <?php  echo json_encode($user);?>;
                const deans = <?php  echo json_encode($deans[0]);?>;
                const doc = <?php  echo json_encode($process[0]);?>;
                const dav = <?php echo json_encode($dav[0]);?>;
                const header = `{{$document_data[0]->header}}`;
                const body = `{{$document_data[0]->body}}`;
                var elementHeader = document.getElementById("header");
                elementHeader.innerHTML = header;
                var elementBody = document.getElementById("body");
                elementBody.innerHTML = body;
            </script>
    <!-- /.container-fluid -->
@endsection
