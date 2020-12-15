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
                <div class="card-header">
                    <h3 class="card-title">Create document template</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Document type</label>
                            <input type="text" class="form-control" name="document_name" placeholder="Enter document name">
                        </div>
                        <div class="form-group">
                            <label>Stage count</label>
                            <input type="text" class="form-control" name="stageCount" placeholder="Enter stage count">
                        </div>
                        <div class="form-group">
                            <label>Enter document header</label>
                            <input type="text" class="form-control" name="header" placeholder="Enter header that will be displayed">
                        </div>
                        <div class="form-group">
                            <label>Enter document body</label>
                            <input type="text" class="form-control" name="body" placeholder="Enter body that will be displayed">
                        </div>
                        <!-- Checkboxes menu -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reason" id="reason">
                            <label class="form-check-label" for="reason">Reason</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_fio" id="new_fio">
                            <label class="form-check-label" for="new_fio">New FIO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_speciality" id="new_speciality">
                            <label class="form-check-label" for="new_speciality">New speciality</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_speciality_code" id="new_speciality_code">
                            <label class="form-check-label" for="new_speciality_code">New speciality code</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sum_of_return" id="sum_of_return">
                            <label class="form-check-label" for="sum_of_return">Sum of return</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="new_university" id="new_university">
                            <label class="form-check-label" for="new_university">New university</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="academic_year" id="academic_year">
                            <label class="form-check-label" for="academic_year">Academic year</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subject" id="subject">
                            <label class="form-check-label" for="subject">Subject</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="midterm_grade" id="midterm_grade">
                            <label class="form-check-label" for="midterm_grade">Midterm grade</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="endterm_grade" id="endterm_grade">
                            <label class="form-check-label" for="endterm_grade">Endterm grade</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="exam_grade" id="exam_grade">
                            <label class="form-check-label" for="exam_grade">Exam grade</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="teacher" id="teacher">
                            <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="semester" id="semester">
                            <label class="form-check-label" for="semester">Semester</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="phone_number" id="phone_number">
                            <label class="form-check-label" for="phone_number">Phone number</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="attachments" id="attachments">
                            <label class="form-check-label" for="attachments">Attachments</label>
                        </div>
                        <!-- Checkboxes menu end -->
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a class="btn btn-default float-right" href="{{URL::to('/')}}">Cancel</a>
                    </div>
            </div>
        </div>
    </form>
@endsection
