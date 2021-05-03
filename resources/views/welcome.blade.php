<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    {{-- @livewireStyles --}}
    <link rel="stylesheet" href="{{ URL::asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    @yield('stylesheet')
    <link rel="stylesheet" href="{{ URL::asset('/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-dark navbar-navy">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link{{ request()->routeIs('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                @auth
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs alp">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">


                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left" style="float:left;">
                                    <a href="/user/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right" style="float:right;">
                                    {{-- <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                  this.closest('form').submit();"
                                            class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </form> --}}
                                </div>
                            </li>
                        </ul>
                    </li> {{-- @livewire('watch') --}}
                @endauth


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Crazy ERP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @auth
                            <a href="/user/profile" class="d-block">{{ Auth::user()->name }}</a>
                        @endauth
                        @guest
                            <a href="#" class="d-block">guest</a>

                        @endguest
                        {{-- <a href="#" class="d-block">{{ Auth::user()->roles[0]->title }}</a> --}}
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>
                        @can('superadmin_access')
                            <li class="nav-item">
                                <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Users

                                    </p>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="/employee" class="nav-link {{ request()->is('employee') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-house-user"></i>
                                    <p>
                                        Employee

                                    </p>
                                </a>

                            </li>
                        @endcan

                        <li class="nav-item">
                            <a href="/vendor" class="nav-link {{ request()->is('vendor') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Vendors
                                </p>
                            </a>

                        </li>



                        <li class="nav-item ">
                            <a href="/customer" class="nav-link {{ request()->is('customer') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Customer

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="/stock" class="nav-link {{ request()->is('stock') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>Stocks</p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#"
                                class="nav-link {{ request()->is('purchase') ? 'active' : '' }}{{ request()->is('purchase/*') ? 'active' : '' }}">
                                <i class="fas fa-inventory"></i>
                                <p>
                                    Purchase Orders
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/purchase/create"
                                        class="nav-link {{ request()->is('purchase/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Create Purchase Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/purchase"
                                        class="nav-link {{ request()->is('purchase') ? 'active' : '' }}">
                                        <i class="fas fa-th-list nav-icon"></i>
                                        <p>View/Edit Purchase Order</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#"
                                class="nav-link {{ request()->is('order') ? 'active' : '' }} {{ request()->is('order/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/order/create"
                                        class="nav-link {{ request()->is('order/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Create Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/order" class="nav-link {{ request()->is('order') ? 'active' : '' }}">
                                        <i class="fas fa-th-list nav-icon"></i>
                                        <p>View/Edit Order</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="/transaction"
                                class="nav-link {{ request()->is('transaction') ? 'active' : '' }}{{ request()->is('transaction/*') ? 'active' : '' }}">
                                <img src="/dist/img/trans.svg" style="width: 1.6rem; fill: white;">
                                <p>
                                    Transactions

                                </p>
                            </a>

                        </li>




                        <li class="nav-item">
                            {{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();" class="nav-link">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>
                                        {{ __('Logout') }}
                            </form> --}}







                            </p>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer no-print">

            <strong>Copyright &copy; 2020 <a href="https://www.crazymouse.co.in">Crazymouse.co.in</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    {{-- @livewireScripts --}}
    <!-- jQuery -->
    <script src="{{ URL::asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ URL::asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    @yield('javascript')
    <script src="{{ URL::asset('/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('/dist/js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });

    </script>



</body>

</html>
