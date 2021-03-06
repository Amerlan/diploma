<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@lang('messages.page_title')</title>
    <link rel="icon" href="{{asset('design/img/university_logo.png')}}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('design/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('design/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('design/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style type="text/css">
        body{
            color:black;
        }
    </style>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><b>E</b> DOCS</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{URL::to('/')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>@lang('messages.menu_panel')</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            @lang('messages.documents')
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @if(auth()->check())
            @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statusesPage" aria-expanded="true" aria-controls="statusesPage">
                        <i class="fa fa-object-group"></i>
                        <span>@lang('messages.doc_templates')</span>
                    </a>
                    <div id="statusesPage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('create_template_form')}}"><i class="fas fa-plus mr-2"></i>@lang('messages.create_template')</a>
                            <a class="collapse-item" href="{{route('see_templates')}}"><i class="fas fa-list mr-2"></i>@lang('messages.list_templates')</a>
                        </div>
                    </div>
                </li>
        @endif
    @endif
    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proccessesPage" aria-expanded="true" aria-controls="proccessesPage">
                <i class="fas fa-stream"></i>
                <span>@lang('messages.processes')</span>
            </a>
            <div id="proccessesPage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (auth()->check())
                        @if (!auth()->user()->isAdmin())
                            <a class="collapse-item" href="{{route('see_templates')}}"><i class="fas fa-plus mr-2"></i>@lang('messages.process_create')</a>
                        @endif
                    @endif
                    @if (auth()->check())
                        @if (auth()->user()->isAdmin())
                            <a class="collapse-item" href="{{route('all_processes')}}"><i class="fas fa-list mr-2"></i>@lang('messages.processes_list')</a>
                        @endif
                    @endif
                    @if (auth()->check())
                        @if (!auth()->user()->isAdmin())
                            <a class="collapse-item" href="{{route('processes')}}"><i class="fas fa-tasks mr-2"></i>@lang('messages.my_processes')</a>
                            <a class="collapse-item" href="{{route('ongoing')}}"><i class="fas fa-inbox mr-2"></i>@lang('messages.incoming_processes')</a>
                            <a class="collapse-item" href="{{route('signed')}}"><i class="fas fa-check mr-2"></i>@lang('messages.signed_processes')</a>
                        @endif
                    @endif
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
    @if(auth()->check())
        @if(auth()->user()->isAdmin())
            <!-- Heading -->
                <div class="sidebar-heading">
                    @lang('messages.parameters')
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                        <i class="fas fa-users"></i>
                        <span>@lang('messages.users')</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('users_list')}}"><i class="fas fa-list mr-2"></i>@lang('messages.list_users')</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoles">
                        <i class="fas fa-users-cog"></i>
                        <span>@lang('messages.roles')</span>
                    </a>
                    <div id="collapseRoles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('roles_list')}}"><i class="fas fa-list mr-2"></i>@lang('messages.list_roles')</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
        @endif
    @endif
    <!-- Nav Item - Charts -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="@lang('messages.search')" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - Language menu-->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">@lang('messages.language_name')</span>
                            <i class='fas fa-angle-down'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'ru']) ?>">
                                Русский(ru)
                            </a>
                            <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'en']) ?>">
                                English(en)
                            </a>
                            <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'kz']) ?>">
                                Қазақша(kz)
                            </a>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                                @if(auth()->user())
                                    @if(auth()->user()->unreadNotifications)
                                    <span class="badge badge-light">{{auth()->user()->unreadNotifications->count()}}</span>
                                    @endif
                                @endif
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                @lang('messages.notifications')
                            </h6>
                            @if(auth()->user())
                                @if(auth()->user()->unreadNotifications)
                            @foreach(auth()->user()->unreadNotifications->take(4) as $notification)
                                <a class="dropdown-item d-flex align-items-center" href={{ route('mark_as_read',['notification_id' => $notification->id, 'process_id' => $notification->data['process_id'] ])}}>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{$notification->created_at}}</div>
                                        <span class="font-weight-bold">@lang('messages.document') "{{$notification->data['document_name']}}"
                                            @if($notification->data['status'] == 0)
                                                @lang('messages.denied')
                                            @elseif($notification->data['status'] == 1)
                                                @lang('messages.signed')
                                            @elseif($notification->data['status'] == 2)
                                                @lang('messages.waiting')
                                            @elseif($notification->data['status'] == 3)
                                                @lang('messages.returned')
                                            @elseif($notification->data['status'] == 4)
                                                @lang('messages.completed')
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                                @endif
                            @endif
                            <a class="dropdown-item text-center small text-gray-500" href="{{route('all_notifications')}}">@lang('messages.all_notifications')</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src={{ Auth::user()->url}}>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('profile')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                @lang('messages.profile')
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                @lang('messages.exit')
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; E-DOCS 2020</span>
                    <br><br>
                    <span>All rights reserved.</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('messages.logout_message1')</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">@lang('messages.logout_message2')</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang('messages.cancel')</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('messages.exit') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('design/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('design/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('design/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('design/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('design/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('design/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('design/js/demo/datatables-demo.js') }}"></script>

<script type="text/javascript">
    $('#dataTable').DataTable({
        "language": {
            "sProcessing": "@lang('messages.processing')",
            "sLengthMenu": "@lang('messages.show_entries')",
            "sZeroRecords": "@lang('messages.zero_records')",
            "sEmptyTable": "@lang('messages.empty_table')",
            "sInfo": "",
            "sInfoEmpty": "@lang('messages.info_empty')",
            "sInfoFiltered": "@lang('messages.info_filtered')",
            "sInfoPostFix": "",
            "sSearch": "@lang('messages.search')",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "@lang('messages.loading')",
            "oPaginate": {
                "sFirst": "@lang('messages.first')", "sLast": "@lang('messages.last')", "sNext": "@lang('messages.next')", "sPrevious": "@lang('messages.previous')"
            },
            "oAria": {
                "sSortAscending": "@lang('messages.sort_ascending')", "sSortDescending": "@lang('messages.sort_descending')"
            }
        }
    });
</script>

</body>

</html>
