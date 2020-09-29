<html>
<head>
    <title> Document types</title>
</head>
<body>
<a href="{{route('create_doctype')}}">Create new doc type</a>
@foreach($docs as $doc)
    <br>
    <h3>TYPE: {{$doc->document_type}}</h3>
    <h5>Stage Count: {{$doc->stageCount}}</h5>
    <h5>Document Priority: {{$doc->document_priority}}</h5>
    <br>
@endforeach
</body>
</html>
