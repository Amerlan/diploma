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
            <h1 class="h3 mb-0 text-gray-800">{{$process[0]->document_name}}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">{{$process[0]->document_name}}</h5>
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-4 offset-8">
                                    <div class="row">
                                        <div class="col-12">
                                            {{$process_stages[0]->status}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text">
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h2 class="text-center">{{$process[0]->document_name}}</h2>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    <a id="body" href="JavaScript:void(0)" data-toggle="modal" data-target="#causeModal" style="text-decoration: none;">fsdfsd</a>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 offset-8">
                                    Дата: <b>{{$process[0]->created_date}}</b>
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
                                <!--СЮДА НАДО ДОПИСАТЬ условие на все поля. Если одно условие срабатывает, то открыть модалку для заполнения
                                Если нет, то не открывать модалку т.к. пустая будет-->
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-12">--}}
                                {{--                                            <label>--}}
                                {{--                                                Период даты:--}}
                                {{--                                            </label>--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <div class="row">--}}
                                {{--                                                    <div class="col-6">--}}
                                {{--                                                        <input type="date" class="form-control" value="2020-12-10">--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="col-6">--}}
                                {{--                                                        <input type="date" class="form-control" value="2020-12-15">--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <hr>--}}
                                @if($process[0]->reason)
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
                                @if($process[0]->new_fio)
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
                                @if($process[0]->new_speciality)
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
                                @if($process[0]->new_speciality_code)
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
                                @if($process[0]->sum_of_return)
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
                                @if($process[0]->new_university)
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
                                @if($process[0]->academic_year)
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
                                @if($process[0]->midterm_grade)
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
                                @if($process[0]->endterm_grade)
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
                                @if($process[0]->exam_grade)
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
                                @if($process[0]->semester)
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
                                @if($process[0]->phone_number)
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
                                @if($process[0]->subject)
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
                                @if($process[0]->teacher)
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button id="submit" type="button" class="btn btn-primary">Сохранить</button>
                                {{--                                    <button type="button" onclick=""></button>--}}
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
    <!-- /.container-fluid -->
@endsection
