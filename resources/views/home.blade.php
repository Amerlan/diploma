@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Мои документы</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Мои документы</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Экспортировать документ</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Тип документа</th>
                    <th>Дата запуска</th>
                    <th>Статус</th>
                    <th>Текущий пользователь</th>
                    <th>Детали</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Заявление на продление "РК 1"</td>
                    <td>12.12.2020</td>
                    <td>На рассмотрении</td>
                    <td>Заместитель декана</td>
                    <td>
                        <a href="process_details.html" class="btn btn-primary btn-sm">Подробнее</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Заявление на "аппелацию"</td>
                    <td>16.12.2020</td>
                    <td>Отклонен</td>
                    <td>Декан</td>
                    <td>
                        <a href="process_details.html" class="btn btn-primary btn-sm">Подробнее</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Документ "Обьяснительное"</td>
                    <td>19.12.2020</td>
                    <td>Подписан</td>
                    <td>Зав. Кафедрой</td>
                    <td>
                        <a href="process_details.html" class="btn btn-primary btn-sm">Подробнее</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Заявление на продление "Пересдачу Финального Экзамена"</td>
                    <td>22.12.2020</td>
                    <td>На заполнении</td>
                    <td>Студент</td>
                    <td>
                        <a href="process_details.html" class="btn btn-primary btn-sm">Подробнее</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Заявление на продление "РК 2"</td>
                    <td>26.12.2020</td>
                    <td>Утвержден</td>
                    <td>Проректор</td>
                    <td>
                        <a href="process_details.html" class="btn btn-primary btn-sm">Подробнее</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
