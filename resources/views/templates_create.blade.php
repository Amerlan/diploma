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
    <form id="form" class="needs-validation" action="{{route('create_document_template')}}" method="POST" novalidate>
        @csrf
        <div class="col-sm-12" style="float:none;margin:auto;padding-top: 1%">
            <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="document_type">@lang('messages.document_type')</label>
                            <select class="form-control" name="document_type" id="document_type" required>
                                @foreach($document_types as $type)
                                    <option value="{{$type->document_type}}">{{$type->document_type}}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="document_name">@lang('messages.document_name')</label>
                            <input type="text" class="form-control" id="document_name" name="document_name" placeholder="@lang('messages.enter_document_name')" required>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.stage_count')</label>
                            <input id="stage" type="text" class="form-control" name="stageCount" value=1 placeholder="@lang('messages.enter_stage_count')" required readonly>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>

                        </div>
                        <!--Sign order block-->
                        <div class="form-group">
                            <label for="roles">@lang('messages.DOBAVIT')</label>
                            <div class="role_selection mb-2">
                                <select class="select form-control" id="roles" required>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a id="add_role"><span class="iconify" data-icon="bx:bx-plus-medical" data-inline="false"></span></a>
                            <a id="remove_role"><span class="iconify" data-icon="ant-design:minus-outlined" data-inline="false"></span></a>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>
                        </div>
                        <!--Sign order block end-->
                        <div class="form-group">
                            <label>@lang('messages.enter_doc_header')</label>
                            <input type="text" class="form-control" name="header" placeholder="@lang('messages.enter_doc_header_displayed')" required>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.enter_doc_body')</label>
                            <input type="text" class="form-control" name="body" placeholder="@lang('messages.enter_doc_body_displayed')" required>
                            <div class="valid-feedback">
                                @lang('messages.valid_feedback')
                            </div>
                            <div class="invalid-feedback">
                                @lang('messages.invalid_feedback')
                            </div>
                        </div>
                        <!-- Checkboxes menu -->
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="reason" id="reason">
                            <label class="custom-control-label" for="reason">@lang('messages.reason')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="new_fio" id="new_fio">
                            <label class="custom-control-label" for="new_fio">@lang('messages.new_full_name')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="new_speciality" id="new_speciality">
                            <label class="custom-control-label" for="new_speciality">@lang('messages.new_speciality')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="new_speciality_code" id="new_speciality_code">
                            <label class="custom-control-label" for="new_speciality_code">@lang('messages.new_speciality_code')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="sum_of_return" id="sum_of_return">
                            <label class="custom-control-label" for="sum_of_return">@lang('messages.sum_of_return')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="new_university" id="new_university">
                            <label class="custom-control-label" for="new_university">@lang('messages.new_university')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="academic_year" id="academic_year">
                            <label class="custom-control-label" for="academic_year">@lang('messages.academic_year')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="subject" id="subject">
                            <label class="custom-control-label" for="subject">@lang('messages.subject')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="midterm_grade" id="midterm_grade">
                            <label class="custom-control-label" for="midterm_grade">@lang('messages.midterm_grade')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="endterm_grade" id="endterm_grade">
                            <label class="custom-control-label" for="endterm_grade">@lang('messages.endterm_grade')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="exam_grade" id="exam_grade">
                            <label class="custom-control-label" for="exam_grade">@lang('messages.exam_grade')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="teacher" id="teacher">
                            <label class="custom-control-label" for="teacher">@lang('messages.teacher')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="semester" id="semester">
                            <label class="custom-control-label" for="semester">@lang('messages.semester')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="phone_number" id="phone_number">
                            <label class="custom-control-label" for="phone_number">@lang('messages.phone_number')</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="attachments" id="attachments">
                            <label class="custom-control-label" for="attachments">@lang('messages.attachments')</label>
                        </div>
                        <!-- Checkboxes menu end -->
                    </div>
                <input id='role_order' name="role_order" value=0 hidden="true">
                    <div class="card-footer">
                        <a class="btn btn-primary" id="sbmt">@lang('messages.submit')</a>
                        <input id="hidden_submit" hidden=true type="submit" value="@lang('messages.submit')" class="btn btn-primary">
                        <a class="btn btn-default float-right" href="{{URL::to('/')}}">@lang('messages.cancel')</a>
                    </div>
            </div>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
 {{-- Plus-Minus button script --}}
        var element = document.getElementById('add_role');
        var stage = document.getElementById('stage');
        element.addEventListener('click', function(){
            $('.role_selection:last').clone().insertAfter('.role_selection:last');
            stage.value = $('.select').length;
         });
         var rm = document.getElementById("remove_role");
         rm.addEventListener('click', function(){
            $('.role_selection').not(':first').last().remove();
            stage.value = $('.select').length;
         });

         var form = document.getElementById('hidden_submit');
         var send = document.getElementById('sbmt');
         send.addEventListener('click', function(){
            var order = [];
            var sel = $('.select');
            for (var i = 0; i < sel.length; i++){
                order.push(sel[i].value);
            }
            document.getElementById('role_order').value = order.join(',');
            form.click();
         })
    </script>
@endsection
