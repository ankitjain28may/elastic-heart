<!DOCTYPE html>
<?php $domain = 'plexus.dev'; ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Z'16 | {{ $event->event_name }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  @if($question->html != null)

  <!-- {{ $question->html }} -->
  
  @endif
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/style.css">

</head>
<body class="hold-transition skin-purple sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header fixed">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>x</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Plexus | {{ $event->event_name }} </b>.</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top bg-purple" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class=""><i class="ion ion-android-menu" style="font-size:20px;"></i></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown">
                <!--                   <img src="dist/img/user2-160x160.jpg" class="user-image" alt="Logout Icon">-->                  
                <i class="ion ion-power" style="font-size:20px;"></i>
                <span class="hidden-xs text-grey" style="font-size:22px;">Logout</span>
              </a>

            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar fixed">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <h4>{{ Auth::user()->name }}</h4>
            <a href="#"><i class="ion ion-flag text-danger"></i>1468</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Shortcuts</li>
          <li class="active treeview">
            <a href="{{ route('battleground') }}">
              <i class="ion ion-grid"></i> 
              <span>Battleground</span>
            </a>
          </li>
          <li class="treeview">
            <a href="{{ route('leaderboard') }}">
              <i class="ion ion-stats-bars"></i>
              <span>Leaderboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="{{ route('rules') }}">
              <i class="ion ion-stats-bars"></i>
              <span>Rules</span>
            </a>
          </li>
          <li class="treeview">
            <a href="{{ $event->forum }}">
              <i class="ion ion-speakerphone"></i>
              <span>Forums</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="ion ion-android-share"></i> <span>Switch Events</span>
              <i class="ion ion-ios-arrow-down pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @if( strtolower($event->event_name) == 'algothematics')
              <li>
                <a href="algothematics.{{ $domain }}">
                  <i class="ion ion-android-radio-button-off text-purple"></i> 
                  Algothematics 
                  <i class="ion ion-ios-arrow-right pull-right"></i>
                </a>
              </li>
              @endif
              @if( strtolower($event->event_name) == 'errata')
              <li>
                <a href="errata.{{ $domain }}">
                  <i class="ion ion-android-radio-button-off text-purple"></i> 
                  Errata 
                  <i class="ion ion-ios-arrow-right pull-right"></i>
                </a>
              </li>
              @endif
              @if( strtolower($event->event_name) == 'khoj')
              <li>
                <a href="khoj.{{ $domain }}">
                  <i class="ion ion-android-radio-button-off text-purple"></i> 
                  Khoj 
                  <i class="ion ion-ios-arrow-right pull-right"></i>
                </a>
              </li>
              @endif
            </ul>
          </li>


            <!-- <li class="header">Brag on<i class="ion ion-android-share-alt" id="icon"></i></li>
            <li><a href="#"><i class="ion ion-android-radio-button-off text-aqua"></i> <span>Facebook</span></a></li>
            <li><a href="#"><i class="ion ion-android-radio-button-off text-red"></i> <span>Google+</span></a></li> -->


            <!-- <li class="header">Hurry !</li>
            <li><a href="#"> <span>Facebook</span> -->
              <!-- A clock for time display -->
            </a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      @if($event->type <= 3)
      yeild('section_single')
      @elseif($event->type == 4)
      yeild('section_mcq')
      @endif
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Zealicon</b>'16
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="http://hackncs.com" class="text-grey">Nibble Computer Labs</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App  For Collapsing and Expanding-->
    <script src="dist/js/app.js"></script>
  </body>
  </html>