<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a class="navbar-brand" href="{{URL::to('/')}}">Home</a>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('sign_by')}}">Signed by user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sign_from')}}">Signed from other</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ongoing_out')}}">Ongoing outcoming</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ongoing_in')}}">Ongoing incoming</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('rejected_by')}}">Rejected by user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('rejected_from')}}">Rejected from other</a>
            </li>

        </ul>
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="{{route('document_form')}}">Create new document</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('doctype_form')}}">Create new document type</a>
            </li>
        </ul>

    </div>
</nav>
