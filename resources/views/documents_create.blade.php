<html>
<head>
    <title>

    </title>
</head>
<body>
<form action="{{route('create_doc')}}" method="POST">
    @csrf
    <p>Document type: <select size="1" name="document_type">
            @for($i = 0; $i < sizeof($types); $i++)
                <option value="{{$types[$i]->document_type}}">{{$types[$i]->document_type}}</option>
            @endfor
        </select></p>
    <p>Executor: <select size="1" name="executor_id">
            @for($i = 0; $i < sizeof($executors); $i++)
                <option value="{{$executors[$i]->user_id}}">{{$executors[$i]->name}}</option>
            @endfor
        </select></p>
    <p><input type="submit"></p>
</form>
</body>
</html>
