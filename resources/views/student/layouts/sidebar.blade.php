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
        <p>{{ \App\Student::where('id_user', '=', Auth::id())->first()->first_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->other_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->last_name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" style="margin-top: 30px">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="/student/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
        </a>
      </li>
      <li class="treeview">
        <a href="/student/account">
          <i class="fa fa-files-o"></i>
          <span>My Account</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Courses</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="/student/courses"><i class="fa fa-circle-o"></i> Registered Courses</a></li>
          <li><a href="/student/courseRegistration"><i class="fa fa-circle-o"></i> Course Registration</a></li>
        </ul>
      </li>
      <li class="treeview" style="margin-bottom: 400px">
        <a href="/student/result">
          <i class="fa fa-files-o"></i>
          <span>Results</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
