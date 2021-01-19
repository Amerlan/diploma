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
                            <div id="starter">
                                @if(auth()->check())
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <button class="btn btn-primary float-right"><i class="fas fa-play mr-2"></i>@lang('messages.start_process')</button>
                                            </div>
                                        </div>
                                @endif
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
                                    @if($document_details[0]->reason)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Причина:
                                                </label>
                                                <textarea id="reason" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if($document_details[0]->new_fio)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Новое ФИО:
                                                    </label>
                                                    <input id="new_fio" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->new_speciality)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Новая специальность:
                                                    </label>
                                                    <input id="new_speciality" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->new_speciality_code)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Код новой специальности:
                                                    </label>
                                                    <input id="new_speciality_code" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->sum_of_return)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Код новой специальности:
                                                    </label>
                                                    <input id="sum_of_return" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->new_university)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Название университета:
                                                    </label>
                                                    <input id="new_university" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->academic_year)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Учебный год:
                                                    </label>
                                                    <input id="academic_year" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->midterm_grade)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Оценка за РК1:
                                                    </label>
                                                    <input id="midterm_grade" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->endterm_grade)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Оценка за РК2:
                                                    </label>
                                                    <input id="endterm_grade" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->exam_grade)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Оценка за Экзамен:
                                                    </label>
                                                    <input id="exam_grade" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($document_details[0]->semester)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Укажите семестр:
                                                    </label>
                                                    <input id="semester" min="1" max="2" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
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
                                    @if($document_details[0]->subject)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Предмет:
                                                </label>
                                                <select id="subject" class="form-control">
                                                    <option>SWD 1 - PHP Programming Language</option>
                                                    <option>SWD 2 - C# ASP.NET</option>
                                                    <option selected>SWD 3 - Java Enterprise Edition</option>
                                                    <option>SWD 4 - Neural Network</option>
                                                    <option>SWD 5 - Angular Front End</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if($document_details[0]->teacher)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Преподаватель:
                                                </label>
                                                <select id="teacher" class="form-control">
                                                    <option>Zhuanyshev I.O. - senior lecuter</option>
                                                    <option>Uatbayev M.M. - senior lecuter</option>
                                                    <option selected>Tolegenov A.M. - senior lecuter</option>
                                                    <option>Duzbayev N.T. - associate professor</option>
                                                    <option>Mukhanov S.B. - senior lecturer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if($document_details[0]->attachments)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Прикрепления (Справки, докуемнты, сертификаты и.т.д.):
                                                </label>
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Выбрать файл</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-success btn-block">
                                                            <i class="fas fa-plus mr-2"></i>
                                                            Прикрепить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                    <button id="submit" type="button" class="btn btn-primary">Сохранить</button>
{{--                                    <button type="button" onclick=""></button>--}}
                                </div>
                            </div>
                    </div>
                </div>
                <script>
                    var submitButton = document.getElementById('submit');
                    submitButton.addEventListener('click', function () {
                        SubmitData(true);
                        window.location.href += "/start";
                    });
                    //all modal data


                    function SubmitData(draft_flag) {
                        var url = "{{ route ('create_process') }}";
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
                        var draft = draft_flag;
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
                                'draft': draft,
                            })
                        })
                        .then((response) =>
                            console.log(response)
                        )
                        .then((data) =>{
                            console.log(data);
                        })

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
        var document_details = <?php  echo json_encode($document_details[0]);?>;
        console.log(document_details)
        $("#starter").show()
        $("#starter").on("click", function (){
            SubmitData(false);
            window.location.href = "/my_processes";
        })
        var flag = true;
        for (var key in document_details) {
            if (document_details[key] === 1) {
                $('#starter').hide()
                flag = false;
            }
        }
        const doc = <?php  echo json_encode($document[0]);?>;
        const dav = <?php echo json_encode($dav[0]);?>;
        const header = `{{$document[0]->header}}`;
        const body = `{{$document[0]->body}}`;
        var elementHeader = document.getElementById("header");
        elementHeader.innerHTML = header;
        var elementBody = document.getElementById("body");
        elementBody.innerHTML = body;
        if (flag === true){
            elementBody.dataset.target = '';
            var d = document.createElement('p');
            d.innerHTML = elementBody.innerHTML;
            elementBody.parentNode.replaceChild(d, elementBody);
            // DISABLE MODAL
        }
    </script>
@endsection
