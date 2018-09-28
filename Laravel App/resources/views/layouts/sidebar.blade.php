<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a> {{ Auth::user()->email }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/home"><i class="fa fa-line-chart"></i> <span>Overview</span></a></li>
        <li><a href="/plants"><i class="fa fa-line-chart"></i> <span>Plants</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-line-chart"></i> <span>Power Generation</span></a></li>
        <li><a href="#"><i class="fa fa-line-chart"></i> <span>Customers</span></a></li>
        <li><a href="#"><i class="fa fa-line-chart"></i> <span>Reports</span></a></li>
        <li><a href="#"><i class="fa fa-line-chart"></i> <span>Income</span></a></li> -->
        
        {{-- <li><a href="/home/media"><i class="fa fa-file-image-o"></i> <span>Media Manager</span></a></li> --}}
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>