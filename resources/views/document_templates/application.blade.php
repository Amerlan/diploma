@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item"><a href="{{route('see_templates')}}">Шаблоны документов</a></li>
                <li class="breadcrumb-item active" aria-current="page">Заявление</li>
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
                        <form method="post" action="">
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
                                    @if($document_details->reason)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Причина:
                                                </label>
                                                <textarea name="reason" class="form-control">заболеванием простудой и невозможности сдачи рубежного экзамена по предмету Java EE SWD-3</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @elseif($document_details->new_fio)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Новое ФИО:
                                                    </label>
                                                    <input name="new_fio" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @elseif($document_details->new_speciality)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        Новая специальность:
                                                    </label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @elseif($document_details->subject)
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
                                    @elseif($document_details->teacher)
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
                                    @elseif($document_details->attachments)
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                    <button type="button" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
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
