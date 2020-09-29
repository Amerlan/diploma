<html>
<head>
    <title> Document types</title>
</head>
<body>
@if(Auth::user())
    {{ Auth::user()->name }}
    <br>
@endif
<a href="{{route('doctype_form')}}">Create new doc type</a>
@foreach($docs as $doc)
    <h3>TYPE: {{$doc->document_type}}</h3>
    <h5>Stage Count: {{$doc->stageCount}}</h5>
    <h5>Document Priority: {{$doc->document_priority}}</h5>
    <hr>
@endforeach
</body>
</html>
