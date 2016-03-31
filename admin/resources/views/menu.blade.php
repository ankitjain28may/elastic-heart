<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{route('root')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Events<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add_event')}}"> Add Event</a>
                    </li>
                    <li>
                        <a href="{{route('view_event')}}"> View Events</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
