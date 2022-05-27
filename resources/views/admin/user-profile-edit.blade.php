<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->



<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{URL::asset('dist/images/logo.png')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/flags-icon/css/flag-icon.min.css')}}">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{URL::asset('dist/vendors/quill/quill.snow.css')}}">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="{{URL::asset('dist/css/main.css')}}">

    <link rel="stylesheet" href="{{URL::asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <div class="site-width">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                    <a href="{{url('index')}}" class="horizontal-logo text-left">
                        <span class="h4 font-weight-bold align-self-center mb-0 ml-auto"></span>
                    </a>
                </div>
                <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                    <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                </div>

                
                <div class="navbar-right ml-auto h-100">
                    <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                        <li class="d-inline-block align-self-center  d-block d-lg-none">
                            <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>                               
                                </a>
                        </li>
                        <li class="dropdown align-self-center d-inline-block">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                                    <span class="badge badge-default"> <span class="">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                        </li>
                        <li class="dropdown user-profile align-self-center d-inline-block">
                            <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                                <div class="media">
                                    <img src="dist/images/avatr.png" class="d-flex img-fluid rounded-circle" width="29">
                                </div>
                            </a>

                            <div class="dropdown-menu border dropdown-menu-right p-0">
                                <a href="{{url('user-profile')}}" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-user mr-2 h6 mb-0"></span> View Profile</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-pencil mr-2 h6 mb-0"></span> Edit Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                    <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- END: Header-->

    <!-- START: Main Menu-->
    <div class="sidebar">
        <div class="site-width">

            <!-- START: Menu-->
            <ul id="side-menu" class="sidebar-menu">
                @if(Auth::user()->role->role == 'admin')

                <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                    <ul>
                        <li><a href="{{url('index')}}"><i class="icon-grid"></i> Analytic</a></li>
                        <li class="active"><a href="{{url('employeelist')}}"><i class="icon-people"></i> Employee</a></li>
                        <li><a href="{{url('occupation-add')}}"><i class="icon-people"></i> Occupation</a></li>
                        {{-- <li><a href="{{url('occupation-add')}}"><i class="icon-people"></i> {{ Auth::user()->role->role ?  Auth::user()->role->role : 'not working'}} </a></li> --}}
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i>Manage</a>
                    <ul>
                        <li><a href="{{url('applicationlist')}}"><i class="icon-event"></i> Application</a></li>
                        <li><a href="{{url('applicationlistadd')}}"><i class="icon-event"></i> Add Application</a></li>  
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><i class="icon-people mr-1"></i> Profile</a>
                    <ul>
                        <li><a href="{{url('user-profile')}}"><i class="icon-user"></i>View Profile</a></li>
                    </ul>
                </li>

                @endif

                @if(Auth::user()->role->role == 'employee')
                <li><a href="{{url('applicationlistadd')}}"><i class="icon-event"></i> Add Application</a></li> 
                @endif

            </ul>
            <!-- END: Menu-->
            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Profile Edit</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{url('user-profile')}}">Profile</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputName4">Name</label>
                                                    <input type="text" class="form-control rounded" id="inputName4" placeholder="Name">
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputNumber4">Mobile Number</label>
                                                    <input type="number" class="form-control" id="inputNumber4" placeholder="Mobile Number">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputOccupation4">Email</label>
                                                    <input type="email" class="form-control rounded" id="inputEmail4" placeholder="Email" value="test@gmail.com" readonly>
                                                </div>
                                            </div>



                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="#" class="btn btn-danger ">
                                                <span>Cancel</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: Card DATA-->

        </div>
    </main>
    <!-- END: Content-->



    <!-- START: Footer-->
    <!-- <footer class="site-footer">
        2020 © PICK
    </footer> -->
    <!-- END: Footer-->


    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->

    <!-- START: Template JS-->
    <script src="{{URL::asset('dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/moment/moment.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="{{URL::asset('dist/js/app.js')}}"></script>
    <!-- END: APP JS-->

    <!-- START: Page JS-->
    <script src="{{URL::asset('dist/js/Projects.js')}}"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->



</html>