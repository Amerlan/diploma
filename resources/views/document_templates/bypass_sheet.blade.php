@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item"><a href="{{route('create_process_list')}}">@lang('messages.process_create')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('messages.fill_process')</li>
            </ol>
        </nav>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@lang('messages.fill_process')</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.export_document')</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">{{$document[0]->document_name}}</h5>
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-4 offset-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="western" align=center style="margin-bottom: 0in">
                                                <font SIZE=2 style="font-size: 11pt"><b>МЕЖДУНАРОДНЫЙ УНИВЕРСИТЕТ ИНФОРМАЦИОННЫХ ТЕХНОЛОГИЙ</b></font></p>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><IMG SRC="{{ asset('design/img/university_logo.png')}}" NAME="Рисунок 1" ALIGN=BOTTOM WIDTH=97 HEIGHT=34 BORDER=0></P>
                                            <P CLASS="western" STYLE="margin-left: -0.5in; margin-bottom: 0in"><BR></BR>
                                            </P>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt"><B>ОБХОДНОЙ
                                                        ЛИСТ</B></FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ"><B>
                                            </B></SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt"><B>№ _____</B></FONT></P>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">об
                                                    отсутствии задолженности у студента
                                                    при отчислении</FONT></P>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Ф.И.О.
                                                    студента
                                                    _____________________________________________________</FONT></P>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Специальность
                                                    _____________________________________Группа____________</FONT></P>
                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Номер
                                                    и дата приказа отчисления
                                                    ________________________________________</FONT></P>
                                            <P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
                                            </P>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text">
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h2 class="text-center">Обходной лист</h2>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-10 offset-2">

                                    <TABLE WIDTH=712 CELLPADDING=7 CELLSPACING=0>
                                        <COL WIDTH=21>
                                            <COL WIDTH=101>
                                                <COL WIDTH=94>
                                                    <COL WIDTH=114>
                                                        <COL WIDTH=109>
                                                            <COL WIDTH=80>
                                                                <COL WIDTH=93>
                                                                    <TR>
                                                                        <TD ROWSPAN=2 WIDTH=21 HEIGHT=10 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">п/п</FONT></P>
                                                                            <P CLASS="western" ALIGN=CENTER>№</P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Наименование
                                                                                    подразделения</FONT></P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Кабинет</FONT></P>
                                                                        </TD>
                                                                        <TD COLSPAN=3 WIDTH=331 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Руководитель</FONT></P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Примечание</FONT></P>
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Должность</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Ф.И.О.</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Подпись</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=21 HEIGHT=30 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">1</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Библиотека</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">5
                                                                                    этаж</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Директор</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" STYLE="margin-right: -0.08in"><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Сарсенбаева
			Ж.А.</SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt"> </FONT>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Учебники,
                                                                                    литература, периодика</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD ROWSPAN=2 WIDTH=21 HEIGHT=24 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-left: -0.08in; margin-right: -0.08in">
                                                                                <FONT SIZE=2 STYLE="font-size: 11pt">2</FONT></P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>АХД</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">211
			каб</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">И.о.заместителя
			директора</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Когенбаева
			А.Н.      </SPAN></FONT>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">ТМЦ,
                                                                                </FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">и
			др.</SPAN></FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="en-US">2</SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt">
                                                                                    этаж</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Специалист
			по ЦПН</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P LANG="kk-KZ" CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Пропуска</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD ROWSPAN=2 WIDTH=21 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">3</FONT></P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Бухгалтерия</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">10
                                                                                    этаж</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Главный
                                                                                    бухгалтер</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P LANG="kk-KZ" CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><A NAME="_GoBack"></A>
                                                                                <BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><BR>
                                                                            </P>
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Оплата
                                                                                    за обучение,</FONT></P>
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">задолжен-ть</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">10
                                                                                    этаж</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Бухгалтер</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Касса
                                                                                    (подотчет)</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=21 HEIGHT=27 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">4</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Заведующий
                                                                                        кафедрой</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Руководитель
                                                                                    подразделения</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P LANG="kk-KZ" CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><BR>
                                                                            </P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=21 HEIGHT=27 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">5</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Деканат</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">3</FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">09</SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt">
                                                                                    каб</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">Декан
                                                                                </FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">ФЦТ</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Толегенов
			А.М.</SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt">
                                                                                </FONT>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=21 HEIGHT=56 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">6</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Департамент
                                                                                        маркетинга и </B></FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="en-US"><B>PR</B></SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">105
                                                                                    каб</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Начальник
			</SPAN></FONT><FONT SIZE=2 STYLE="font-size: 11pt">Центра
                                                                                    Карьеры </FONT>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Бакирхан
			Л.</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD ROWSPAN=2 WIDTH=21 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">7</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD ROWSPAN=2 WIDTH=101 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><B>Учебный
                                                                                        отдел</B></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">313
                                                                                    каб</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Начальник
			отдела офис-регистраторов</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="text-indent: -0.08in"><FONT SIZE=2 STYLE="font-size: 11pt">Киикбаева</FONT><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">
			Р.М.</SPAN></FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">Документация</FONT></P>
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt">печати/</FONT></P>
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">штампы</FONT></P>
                                                                        </TD>
                                                                    </TR>
                                                                    <TR>
                                                                        <TD WIDTH=94 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt">313
                                                                                    каб</FONT></P>
                                                                        </TD>
                                                                        <TD WIDTH=114 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in"><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Менеджер
			по курсу</SPAN></FONT></P>
                                                                            <P LANG="kk-KZ" CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=109 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P LANG="kk-KZ" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in">
                                                                                <BR>
                                                                            </P>
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=80 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><BR>
                                                                            </P>
                                                                        </TD>
                                                                        <TD WIDTH=93 STYLE="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                                                                            <P CLASS="western" ALIGN=CENTER><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="kk-KZ">Студ.билет</SPAN></FONT></P>
                                                                        </TD>
                                                                    </TR>
                                    </TABLE>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 offset-8">
                                    Дата: <b>13/12/2020</b>
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
                            <div class="row mt-5">
                                <div class="col-12">
                                    <button class="btn btn-primary float-right"><i class="fas fa-play mr-2"></i>Запустить процесс</button>
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
