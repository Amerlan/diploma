<html>
<head>
    <title>Ongoing documents</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
@include('sidebar')
@foreach($documents as $document)
    <h3>doc id: {{$document->document_id}}</h3>
    <h2>doc type: {{$document->document_type}}</h2>
    <h4>executor: {{$document->executor_id}}</h4>
    <h4>Initiator: {{$document->created_by}}</h4>
    <h4>Current stage: {{$document->current_stage}}</h4>
    <h4 style="@if($document->is_rejected)background-color:green; @else background-color:red; @endif">Is rejected: {{$document->is_rejected}}</h4>
    <h5>Created date: {{$document->created_date}}</h5>
    <h5>Signed date: {{$document->signed_date}}</h5>
    <h5>Last change date: {{$document->last_change_date}}</h5>
    <h4 style="@if($document->is_closed)background-color:green; @else background-color:red; @endif">Is closed: {{$document->is_closed}}</h4>
    <hr>
@endforeach
</body>
</html>
