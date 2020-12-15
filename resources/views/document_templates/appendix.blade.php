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
                                    <a id="body" href="JavaScript:void(0)" data-toggle="modal" data-target="#causeModal" style="text-decoration: none;"></a>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 offset-8">
                                    Дата: <b>{{date('d/m/Y')}}</b>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 offset-8">
                                    Подпись: <a href="JavaScript:void(0)" style="text-decoration: none;" data-toggle="modal" data-target="#signModal">Поставить подпись</a>
                                </div>
                            </div>
                            <div class="row mt-3 pb-5">
                                <div class="col-2 offset-8">
                                    <img src="{{ asset('design/img/sign.png')}}" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cause Modal -->
                <div class="modal fade" id="causeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Детали заявления</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if($document_details[0]->phone_number)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Укажите контактный телефон:
                                                </label>
                                                <input id="phone_number" type="number" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button id="submit" type="button" class="btn btn-primary">Сохранить</button>
                                {{--                                    <button type="button" onclick=""></button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var submitButton = document.getElementById('submit');
                    submitButton.addEventListener('click', function () {
                        SubmitData();
                    });
                    //all modal data
                    console.log(document.getElementById('reason'));
                    var reason = document.getElementById('reason') != null ? document.getElementById('reason').value : null;
                    var new_fio = document.getElementById('new_fio') != null ? document.getElementById('new_fio').value : null;
                    var new_speciality = document.getElementById('new_speciality') != null ? document.getElementById('new_speciality').value : null;
                    var new_speciality_code = document.getElementById('new_speciality_code') != null ? document.getElementById('new_speciality_code').value : null;
                    var sum_of_return = document.getElementById('sum_of_return') != null ? document.getElementById('sum_of_return').value : null;
                    var new_university = document.getElementById('new_university') != null ? document.getElementById('new_university').value : null;
                    var academic_year = document.getElementById('academic_year') != null ? document.getElementById('academic_year').value : null;
                    var subject = document.getElementById('subject') != null ? document.getElementById('subject').value : null;
                    var midterm_grade = document.getElementById('midterm_grade') != null ? document.getElementById('midterm_grade').value : null;
                    var endterm_grade = document.getElementById('endterm_grade') != null ? document.getElementById('endterm_grade').value : null;
                    var exam_grade = document.getElementById('exam_grade') != null ? document.getElementById('exam_grade').value : null;
                    var teacher = document.getElementById('teacher') != null ? document.getElementById('teacher').value : null;
                    var semester = document.getElementById('semester') != null ? document.getElementById('semester').value : null;
                    var phone_number = document.getElementById('phone_number') != null ? document.getElementById('phone_number').value : null;
                    var attachments = document.getElementById('attachments') != null ? document.getElementById('attachments').value : null;
                    var document_name = document.getElementById('doc_name').innerText;


                    function SubmitData() {
                        var url = '{{ route ('testing') }}';
                        fetch(url, {
                            method: 'POST',
                            headers:{
                                'Content-Type': 'application/json',
                                "X-CSRF-Token": $('input[name="_token"]').val()
                            },
                            body:JSON.stringify({
                                'reason': reason,
                                'new_fio': new_fio,
                                'new_speciality': new_speciality,
                                'new_speciality_code': new_speciality_code,
                                'sum_of_return': sum_of_return,
                                'new_university': new_university,
                                'academic_year': academic_year,
                                'subject': subject,
                                'midterm_grade': midterm_grade,
                                'endterm_grade': endterm_grade,
                                'exam_grade': exam_grade,
                                'teacher': teacher,
                                'semester': semester,
                                'phone_number': phone_number,
                                'attachments': attachments,
                                'document_name': document_name,
                            })
                        })
                            .then((response) => {
                                console.log(response.json);
                            })
                            .then((data) =>{
                                alert(data);
                            })
                        {{--                        window.location.replace('/')--}}
                    }
                </script>
                <!-- Sign Modal -->
                <div class="modal fade" id="signModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Подписать документ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>
                                        Введите пароль подписи :
                                    </label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="button" class="btn btn-primary">Подписать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const user = <?php  echo json_encode($user);?>;
        const deans = <?php  echo json_encode($deans[0]);?>;
        console.log(user);
        const doc = <?php  echo json_encode($document[0]);?>;
        const dav = <?php echo json_encode($dav[0]);?>;
        const header = `{{$document[0]->header}}`;
        console.log(header);
        const body = `{{$document[0]->body}}`;
        var elementHeader = document.getElementById("header");
        elementHeader.innerHTML = header;
        var elementBody = document.getElementById("body");
        elementBody.innerHTML = body;
    </script>
@endsection
