<html>
<head>
    <title> Document types</title>
</head>
<body>
<form action="{{route('create_doctype')}}" method="POST">
    @csrf
    <p>Document type: <input type="text" name="doc_type"></p>
        <p>Stage count: <input type="text" name="stage_count"></p>
            <p>Priority: <input type="text" name="priority"></p>
            <p><input type="submit"></p>
</form>
</body>
</html>
