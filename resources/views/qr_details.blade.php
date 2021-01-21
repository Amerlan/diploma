<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@lang('messages.page_title')</title>

    <style type="text/css">
        body{
            background-color: #4c74dc;
        }
        div {
            width: 600px;   /* ширина */
            height: 800px; /* высота */
            padding: 30px 20px 30px 50px; /* внутренние отступы - верх, право, низ, лево */
            margin: 50px auto;  /* выравнивание по центру */
            box-shadow: 10px 10px 20px black; /* небольшая тень для объемности */
            background-color: white;  /* цвет фона в блоке */
            font-family:  "Times New Roman"; /* нужный шрифт */
            font-size:14px;  /* размер шрифта */
            line-height:21px; /* высота строки 14*1.5 */
        }
        p {
            padding: 500px 20px 30px 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="col-12">
        <h2 class="text-center">{{$qr[0]->document_type}}</h2>
        <br>
        Выдан: <u>"{{$qr[0]->name}}"</u>
        <br>
        @if($qr[0]->document_name)
                    @lang('messages.document_name'): <u>"{{$qr[0]->document_name}}"</u>
                <br><br>
            @endif
            @if($qr[0]->reason)
                    @lang('messages.reason'): <u>{{$qr[0]->reason}}</u>
                <br><br>
            @endif
            @if($qr[0]->new_fio)
                    @lang('messages.full_name'): <u>{{$qr[0]->new_fio}}</u>
                <br><br>
            @endif
            @if($qr[0]->new_speciality)
                    @lang('messages.speciality'): <u>{{$qr[0]->new_speciality}}</u>
                <br><br>
            @endif
            @if($qr[0]->new_speciality_code)
                @lang('messages.speciality_code'): <u>{{$qr[0]->new_speciality_code}}</u>
                <br><br>
            @endif
            @if($qr[0]->sum_of_return)
                @lang('messages.sum_of_return'): <u>{{$qr[0]->sum_of_return}}</u>
                <br><br>
            @endif
            @if($qr[0]->new_university)
                @lang('messages.university'): <u>{{$qr[0]->new_university}}</u>
                <br><br>
            @endif
            @if($qr[0]->academic_year)
                @lang('messages.academic_year'): <u>{{$qr[0]->academic_year}}</u>
                <br><br>
            @endif
            @if($qr[0]->subject)
                @lang('messages.subject'): <u>{{$qr[0]->subject}}</u>
                <br><br>
            @endif
            @if($qr[0]->midterm_grade)
                @lang('messages.midterm_grade'): <u>{{$qr[0]->midterm_grade}}</u>
                <br><br>
            @endif
            @if($qr[0]->endterm_grade)
                @lang('messages.endterm_grade'): <u>{{$qr[0]->endterm_grade}}</u>
                <br><br>
            @endif
            @if($qr[0]->exam_grade)
                @lang('messages.exam_grade'): <u>{{$qr[0]->exam_grade}}</u>
                <br><br>
            @endif
            @if($qr[0]->teacher)
                @lang('messages.teacher'): <u>{{$qr[0]->teacher}}</u>
                <br><br>
            @endif
            @if($qr[0]->semester)
                @lang('messages.semester'): <u>{{$qr[0]->semester}}</u>
                <br><br>
            @endif
            @if($qr[0]->phone_number)
                @lang('messages.phone_number'): <u>{{$qr[0]->phone_number}}</u>
                <br><br>
            @endif
            @if($qr[0]->created_date)
                @lang('messages.created_date'): <u>{{$qr[0]->created_date}}</u>
                <br><br>
            @endif
            @if($qr[0]->closed_date)
                @lang('messages.closed_date'): <u>{{$qr[0]->closed_date}}</u>

        @endif
        <br><br>
        {!! QrCode::generate('http://127.0.0.1:8000/qr/'.$qr[0]->process_token); !!}
    </div>
</body>


</html>
