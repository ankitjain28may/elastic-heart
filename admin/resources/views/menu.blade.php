<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{route('root')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-paw fa-fw"></i> Events<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add_event')}}"> Add Event</a>
                    </li>
                    <li>
                        <a href="{{route('view_event')}}"> View Events</a>
                    </li>
                   <!--  <li>
                        <a href="{{route('view_questions')}}"> View Questions</a>
                    </li> -->
                </ul>
            </li>

            <li>
                <a href="{{route('add_soc_form')}}"><i class="fa fa-rocket fa-fw"></i> Add Society</a>
            </li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
