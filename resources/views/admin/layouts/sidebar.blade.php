<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->email }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="/admin/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
        </a>
      </li>
      <li class="treeview">
        <a href="/admin/faculties">
          <i class="fa fa-files-o"></i>
          <span>Faculties</span>
        </a>
      </li>
      <li class="treeview">
        <a href="/admin/departments">
          <i class="fa fa-files-o"></i>
          <span>Departments</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Academic Setting</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/levels"><i class="fa fa-circle-o"></i> Levels</a></li>
          <li><a href="/admin/courses"><i class="fa fa-circle-o"></i> Courses</a></li>
          <li><a href="/admin/semesters"><i class="fa fa-circle-o"></i> Semesters</a></li>
          <li><a href="/admin/units"><i class="fa fa-circle-o"></i> Units</a></li>
        </ul>
      </li>
      <li>
        <a href="/admin/registerableCourses">
          <i class="fa fa-th"></i> <span>Registerable Courses</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-th"></i> <span>User Accounts</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/userAccounts/student"><i class="fa fa-circle-o"></i> Student</a></li>
          <li><a href="/admin/userAccounts/staff"><i class="fa fa-circle-o"></i> Staff</a></li>
        </ul>
      </li>
      <li style="margin-bottom: 400px">
        <a href="/admin/results"><i class="fa fa-th"></i> <span>Results</span></a>
      </li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
