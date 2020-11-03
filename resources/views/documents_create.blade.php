<html>
<head>
    <title>
        Create a new document to sign.
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
    <p><input type="submit"></p>
</form>
</body>
</html>
