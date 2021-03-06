<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Z'16 | {{ ucwords($event->event_name) }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->

    <!-- Custom CSS -->
    <link href="{{ URL::asset('public/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('public/css/custom.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/css/flipclock.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"> PLEXUS | {{ ucwords($event->event_name)}} </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" href="{{ route('logout') }}">
                        <i class="fa fa-user fa-fw"></i> Logout</a>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{ route('battleground', $event->event_name) }}" class="@if($action == 'battle') active @endif">
                                <i class="fa fa-group fa-fw"></i> 
                                Battleground 
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ route('rules', $event->event_name) }}" class="@if($action == 'rules') active @endif">
                                <i class="fa fa-edit fa-fw"></i> 
                                Rules
                            </a>
                        </li>
                        <li>
                            <a href="" id="submit-ans" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-rocket fa-fw"></i> 
                                Submit Answers & End Test
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        @yield('content_mcq')
        <!-- /#page-wrapper -->

    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to submit the answers and end the test??!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="submit-sure">Yea I'm Sure</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <!-- Custom Theme JavaScript -->
    <script src="{{URL::asset('public/js/sb-admin-2.js')}}"></script>

</body>

</html>
