@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">@lang('messages.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('messages.create_template')</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.create_template')</h1>
    </div>
    <form action="{{route('create_document_template')}}" method="POST">
        @csrf
        <div class="col-sm-12" style="float:none;margin:auto;padding-top: 1%">
            <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('messages.document_name')</label>
                            <input type="text" class="form-control" name="document_name" placeholder="@lang('messages.enter_document_name')">
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.stage_count')</label>
                            <input type="text" class="form-control" name="stageCount" placeholder="@lang('messages.enter_stage_count')">
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.enter_doc_header')</label>
                            <input type="text" class="form-control" name="header" placeholder="@lang('messages.enter_doc_header_displayed')">
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.enter_doc_body')</label>
                            <input type="text" class="form-control" name="body" placeholder="@lang('messages.enter_doc_body_displayed')">
                        </div>
                        <!-- Checkboxes menu -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reason" id="reason">
                            <label class="form-check-label" for="reason">@lang('messages.reason')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_fio" id="new_fio">
                            <label class="form-check-label" for="new_fio">@lang('messages.new_full_name')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_speciality" id="new_speciality">
                            <label class="form-check-label" for="new_speciality">@lang('messages.new_speciality')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_speciality_code" id="new_speciality_code">
                            <label class="form-check-label" for="new_speciality_code">@lang('messages.new_speciality_code')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sum_of_return" id="sum_of_return">
                            <label class="form-check-label" for="sum_of_return">@lang('messages.sum_of_return')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_university" id="new_university">
                            <label class="form-check-label" for="new_university">@lang('messages.new_university')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="academic_year" id="academic_year">
                            <label class="form-check-label" for="academic_year">@lang('messages.academic_year')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subject" id="subject">
                            <label class="form-check-label" for="subject">@lang('messages.subject')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="midterm_grade" id="midterm_grade">
                            <label class="form-check-label" for="midterm_grade">@lang('messages.midterm_grade')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="endterm_grade" id="endterm_grade">
                            <label class="form-check-label" for="endterm_grade">@lang('messages.endterm_grade')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="exam_grade" id="exam_grade">
                            <label class="form-check-label" for="exam_grade">@lang('messages.exam_grade')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="teacher" id="teacher">
                            <label class="form-check-label" for="teacher">@lang('messages.teacher')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="semester" id="semester">
                            <label class="form-check-label" for="semester">@lang('messages.semester')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="phone_number" id="phone_number">
                            <label class="form-check-label" for="phone_number">@lang('messages.phone_number')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="attachments" id="attachments">
                            <label class="form-check-label" for="attachments">@lang('messages.attachments')</label>
                        </div>
                        <!-- Checkboxes menu end -->
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('messages.submit')" class="btn btn-primary">
                        <a class="btn btn-default float-right" href="{{URL::to('/')}}">@lang('messages.cancel')</a>
                    </div>
            </div>
        </div>
    </form>
@endsection
