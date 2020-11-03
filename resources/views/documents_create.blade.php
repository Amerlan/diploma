@extends('layouts.admin')

@section('content')
    <div class="col-lg-7" style="float:none;margin:auto;padding-top: 7%">
        <!-- general form elements disabled -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Create document</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('create_doc')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- select -->
                            <div class="form-group">
                                <label>Document type</label>
                                <select class="form-control" name="document_type">
                                    @for($i = 0; $i < sizeof($types); $i++)
                                        <option value="{{$types[$i]->document_type}}">{{$types[$i]->document_type}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a class="btn btn-default float-right" href="{{URL::to('/')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
