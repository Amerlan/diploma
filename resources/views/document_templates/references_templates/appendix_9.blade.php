@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item"><a href="{{route('create_process_list')}}">Шаблоны документов</a></li>
                <li class="breadcrumb-item active" aria-current="page">Справка - Приложение 9</li>
            </ol>
        </nav>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Справка - Приложение 9</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-4 offset-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="western" align=center style="margin-bottom: 0in">
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><IMG SRC="{{ asset('design/img/university_logo_with_name.png')}}" NAME="Рисунок 1" ALIGN=BOTTOM BORDER=0></P>
                                            <P CLASS="western" STYLE="margin-left: -0.5in; margin-bottom: 0in"><BR></BR>
                                            </P>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 offset-8">
                                    <div class="row">
                                        <div class="col-12">
                                            Приложение 9
                                            <br>
                                            к приказу Министра здравоохранения и
                                            социального развития Республики Казахстан,
                                            в которые вносят изменения и дополнения
                                            <br>
                                            Приложение 2-1
                                            <br>
                                            к стандарту  государственной услуги
                                            «Назначение государственных  социальных
                                            пособий по инвалидности, по случаю
                                            потери кормильца и по возрасту»
                                            <br>
                                            Форма
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text">
                            <div class="row mt-5">
                                <div class="col-12">
                                    @if($documents != null)
                                        <h2 class="text-center">{{$document[0]->document_name}}</h2>
                                    @else
                                        <h2 class="text-center">Справка</h2>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    @if($users != null)
                                        &nbsp;&nbsp;&nbsp;Дана  гражданину  {{$users[1]->name}} {{$users[1]->dateOfBirth}}<br>
                                        В том, что он(а) действительно является обучающимся <br>
                                        АО Международного университета информационных технологий {{$users[1]->speciality_name}}.<br>
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,<br>
                                        {{$users[1]->course_number}}, форма обучения-очная.<br>
                                        Справка действительна на {{date('Y')}} - {{date('Y', strtotime('+1 year'))}} учебный год.<br>
                                        Справка выдана для предъявления в отделение<br>
                                        Государственной корпораций<br>
                                        Срок обучения в учебном заведении  4 (четыре) года<br>
                                        Период обучения с {{$users[1]->enrollment_date}} по {{$users[1]->graduation_date}}.<br><br>

                                        <b>Примечание:</b> справка действительна 1 год.<br>
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.
                                    @else
                                        &nbsp;&nbsp;&nbsp;Дана  гражданину  Аманжол Азат Ғабитұлы 11.03.1999 г.р.<br><br>
                                        &nbsp;&nbsp;&nbsp;В том, что он(а) действительно является обучающимся <br>
                                        АО Международного университета информационных технологий 5B070400 - Вычислительная техника и программное обеспечение.<br>
                                        Госуд.лицензия Серия АБ  № 0064060 от 29.05.2009 год без ограничения срока,<br>
                                        3 курса, форма обучения-дневное.<br>
                                        Справка действительна на {{date('Y')}} - {{date('Y', strtotime('+1 year'))}} учебный год.<br>
                                        Справка выдана для предъявления в отделение<br>
                                        Государственной корпораций<br>
                                        Срок обучения в учебном заведении  4 (четыре) года<br>
                                        Период обучения с 01.09.2018г  г по 30.06.2022г.<br><br>

                                        <b>Примечание:</b> справка действительна 1 год.<br>
                                        В случае отчисления обучающегося из учебного заведения или перевода на заочную форму обучения, руководитель учебного заведения извещает отделение Государственной корпораций  по выплате пенсий по месту жительства получателя пособия.
                                    @endif
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
                                <div class="row">
                                    <div class="col-12">
                                        <label>
                                            Период даты:
                                        </label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="date" class="form-control" value="2020-12-10">
                                                </div>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" value="2020-12-15">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>
                                                Причина:
                                            </label>
                                            <textarea class="form-control">заболеванием простудой и невозможности сдачи рубежного экзамена по предмету Java EE SWD-3</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>
                                                Предмет:
                                            </label>
                                            <select class="form-control">
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>
                                                Преподаватель:
                                            </label>
                                            <select class="form-control">
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
                                        <div class="form-group">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Файл
                                                    </th>
                                                    <th>
                                                        Скачать
                                                    </th>
                                                    <th>
                                                        Удалить
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        Справка_04.pdf
                                                    </td>
                                                    <td width="20%">
                                                        <button class="btn btn-info btn-sm btn-block">
                                                            <i class="fas fa-download mr-1"></i>
                                                            Скачать
                                                        </button>
                                                    </td>
                                                    <td width="20%">
                                                        <button class="btn btn-danger btn-sm btn-block">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Удалить
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Согласие_01.pdf
                                                    </td>
                                                    <td width="17%">
                                                        <button class="btn btn-info btn-sm btn-block">
                                                            <i class="fas fa-download mr-1"></i>
                                                            Скачать
                                                        </button>
                                                    </td>
                                                    <td width="17%">
                                                        <button class="btn btn-danger btn-sm btn-block">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Удалить
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Сертификат_02.pdf
                                                    </td>
                                                    <td width="20%">
                                                        <button class="btn btn-info btn-sm btn-block">
                                                            <i class="fas fa-download mr-1"></i>
                                                            Скачать
                                                        </button>
                                                    </td>
                                                    <td width="20%">
                                                        <button class="btn btn-danger btn-sm btn-block">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Удалить
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="button" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
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

@endsection
