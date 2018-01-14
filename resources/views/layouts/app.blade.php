<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('title') - {{ config('app.name', 'APH Pelicano') }}</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">

<!-- DataTables CSS -->
<link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">{{ config('app.name', 'APH Pelicano') }}</a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">
        <!-- Authentication Links -->
        @if(Auth::check())
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
          </li>
        @endif
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div> <!-- /input-group -->
            </li>
            <li><a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li><a href="flot.html">Flot Charts</a></li>
                <li><a href="morris.html">Morris.js Charts</a></li>
              </ul> <!-- /.nav-second-level --></li>
            <li><a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a></li>
            <li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a></li>
            <li><a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li><a href="panels-wells.html">Panels and Wells</a></li>
                <li><a href="buttons.html">Buttons</a></li>
                <li><a href="notifications.html">Notifications</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="icons.html"> Icons</a></li>
                <li><a href="grid.html">Grid</a></li>
              </ul> <!-- /.nav-second-level --></li>
            <li><a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li><a href="#">Second Level Item</a></li>
                <li><a href="#">Second Level Item</a></li>
                <li><a href="#">Third Level <span class="fa arrow"></span></a>
                  <ul class="nav nav-third-level">
                    <li><a href="#">Third Level Item</a></li>
                    <li><a href="#">Third Level Item</a></li>
                    <li><a href="#">Third Level Item</a></li>
                    <li><a href="#">Third Level Item</a></li>
                  </ul> <!-- /.nav-third-level --></li>
              </ul> <!-- /.nav-second-level --></li>
            <li><a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li><a href="blank.html">Blank Page</a></li>
                <li><a href="login.html">Login Page</a></li>
              </ul> <!-- /.nav-second-level --></li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" style="padding-top: 20px">
      @yield('content')
    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ asset('js/metisMenu.min.js') }}"></script>

  <!-- DataTables JavaScript -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.responsive.js') }}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

  @stack('scripts')
</body>
</html>
