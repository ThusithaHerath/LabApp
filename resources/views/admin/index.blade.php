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
                </li>
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
            <div class="row">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Dashboard</h4>
                            <p>Welcome to liner admin panel</p>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-basket icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">2,390</h2>
                                    <h6 class="card-liner-subtitle">Monthly Orders</h6>
                                </div>
                            </div>
                            <div id="apex_today_order"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-user icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">390</h2>
                                    <h6 class="card-liner-subtitle">Employee</h6>
                                </div>
                            </div>

                            <div id="apex_today_visitors"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-bag icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">$4,390</h2>
                                    <h6 class="card-liner-subtitle">Monthly Sale</h6>
                                </div>
                            </div>
                            <div id="apex_today_sale"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <span class="card-liner-icon mt-1">$</span>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">$4,390</h2>
                                    <h6 class="card-liner-subtitle">Total Profit</h6>
                                </div>
                            </div>
                            <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                            <div id="apex_today_profit"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h6 class="card-title">Recent Orders</h6>
                        </div>
                        <div class="card-body table-responsive p-0">

                            <table class="table  mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Project Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0001</td>
                                        <td>03/11/2015</td>
                                        <td>Addison Nichols</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-primary">Standby</span></td>
                                    </tr>
                                    <tr class="ng-scope">
                                        <td>0002</td>
                                        <td>05/11/2015</td>
                                        <td>Albert Watkins</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-dark">Pending</span></td>
                                    </tr>
                                    <tr class="ng-scope">
                                        <td>0003</td>
                                        <td>07/09/2015</td>
                                        <td>Johnny Fernandez</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-success">Standby</span></td>
                                    </tr>

                                    <tr class="ng-scope">
                                        <td>0014</td>
                                        <td>30/09/2015</td>
                                        <td>Nora Lambert</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-info">Pending</span></td>
                                    </tr>
                                    <tr class="ng-scope">
                                        <td>0015</td>
                                        <td>29/07/2015</td>
                                        <td>Shelly Robertson</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-danger">Canceled</span></td>
                                    </tr>
                                    <tr class="ng-scope">
                                        <td>0016</td>
                                        <td>22/07/2015</td>
                                        <td>Everett Garcia</td>

                                        <td>Lost & Found System.</td>

                                        <td><span class="badge outline-badge-dark">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title">New User Application</h6>
                            <button class="btn btn-info btn-sm"><a href="{{url('applicationlist')}}" class="text-light">View All</a></button>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <ul class="list-group list-unstyled">
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author1.jpg" alt="" class="img-fluid ml-0 mt-2  rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Jonathan</span><br>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>
                                            <div class="ml-auto my-auto">
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="View"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author2.jpg" alt="" class="img-fluid ml-0 mt-2  rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">kelvin</span><br>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>
                                            <div class="ml-auto my-auto">
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="View"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author3.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Peter</span><br>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>
                                            <div class="ml-auto my-auto">
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="View"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author9.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Ray Sin</span><br>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>
                                            <div class="ml-auto my-auto">
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="View"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="ml-2" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author6.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Abexon Dixon</span><br/>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>

                                            <div class="ml-auto mail-tools">
                                                <a href="#" data-toggle="tooltip" title="View" data-placement="bottom"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Edit" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Delete" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author7.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Nathan S. Johnson</span><br/>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>

                                            <div class="ml-auto mail-tools">
                                                <a href="#" data-toggle="tooltip" title="View" data-placement="bottom"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Edit" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Delete" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2">
                                        <div class="media d-flex w-100">
                                            <a href="#"><img src="dist/images/author8.jpg" alt="" class="img-fluid ml-0 mt-2 rounded-circle" width="40"></a>
                                            <div class="media-body align-self-center pl-2">
                                                <span class="mb-0 font-w-600">Roger L. Arteaga</span><br/>
                                                <p class="mb-0 font-w-500 tx-s-12">California, USA</p>
                                            </div>
                                            <div class="ml-auto mail-tools">
                                                <a href="#" data-toggle="tooltip" title="View" data-placement="bottom"><i class="icon-envelope"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Edit" data-placement="bottom" class="ml-2"><i class="icon-pencil"></i></a>
                                                <a href="#" data-toggle="tooltip" title="Delete" data-placement="bottom" class="ml-2"><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
    <footer class="site-footer">

    </footer>
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

    <!-- START: Page Vendor JS-->
    <script src="{{URL::asset('dist/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/morris/morris.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/starrr/starrr.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.canvaswrapper.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.colorhelpers.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.saturated.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.browser.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.drawSeries.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.uiConstants.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.legend.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/lineprogressbar/jquery.lineProgressbar.js')}}"></script>
    <script src="{{URL::asset('dist/vendors/lineprogressbar/jquery.barfiller.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page JS-->
    <script src="{{URL::asset('dist/js/home.script.js')}}"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->



</html>