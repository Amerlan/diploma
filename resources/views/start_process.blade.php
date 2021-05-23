@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item"><a href="{{route('see_templates')}}">@lang('messages.list_templates')</a></li>
                <li id="doc_name" class="breadcrumb-item active" aria-current="page">{{ $document[0]->document_name}}</li>
            </ol>
        </nav>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$document[0]->document_type}}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
        </div>

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
                                    <h2 class="text-center">{{$document[0]->title}}</h2>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    <p id="body"></p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 offset-8">
                                    Дата: <b>{{date('d/m/Y')}}</b>
                                </div>
                            </div>
                            <div>
                                @if(auth()->check())
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div id="starter">
                                                <button class="btn btn-primary float-right"><i class="fas fa-play mr-2"></i>@lang('messages.start_process')</button>
                                            </div>
                                            <div id="cancel">
                                                <button class="btn btn-danger float-left">@lang('messages.cancel')</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
                    function SubmitData() {
                        let url = "{{ route ('create_process') }}";
                        let document_name = document.getElementById('doc_name').innerText;
                        fetch(url, {
                            method: 'POST',
                            headers:{
                                'Content-Type': 'application/json',
                                "X-CSRF-Token": $('input[name="_token"]').val()
                            },
                            body:JSON.stringify({
                                'document_name': document_name
                            })
                        })
                        .then((response) =>{
                            console.log(response);
                        })
                        .then((data) =>{
                            console.log(data);
                        })
                    }


                    function Cancel() {
                        let url = "{{ route ('cancel') }}";
                        let document_name = document.getElementById('doc_name').innerText;
                        fetch(url, {
                            method: 'POST',
                            headers:{
                                'Content-Type': 'application/json',
                                "X-CSRF-Token": $('input[name="_token"]').val()
                            },
                            body:JSON.stringify({
                                'document_name': document_name
                            })
                        })}
                </script>
    <script>
        const user = <?php  echo json_encode($user);?>;
        const deans = <?php  echo json_encode($deans[0]);?>;
        $("#starter").on("click", function (){
            SubmitData();
            window.location.href = "/my_processes";
        })
        $("#cancel").on("click", function (){
            Cancel();
            window.location.href = "/home";
        })
        const doc = <?php  echo json_encode($process[0]);?>;
        const dav = <?php echo json_encode($dav[0]);?>;
        const header = `{{$document[0]->header}}`;
        const body = `{{$document[0]->body}}`;
        let elementHeader = document.getElementById("header");
        elementHeader.innerHTML = header;
        let elementBody = document.getElementById("body");
        elementBody.innerHTML = body;
    </script>
@endsection
