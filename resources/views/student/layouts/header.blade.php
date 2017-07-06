<header class="main-header">
  <!-- Logo -->
  <a href="/student/dashboard" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Caleb</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Caleb</b>University</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ \App\Student::where('id_user', '=', Auth::id())->first()->passport_url }}" class="user-image" alt="User Image" />
            <span class="hidden-xs">{{ \App\Student::where('id_user', '=', Auth::id())->first()->first_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->other_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->last_name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              {{-- <img src="{{ \App\Student::where('id_user', '=', Auth::id())->first()->passport_url }}" class="img-circle" alt="User Image" /> --}}
              <p>
                {{ \App\Student::where('id_user', '=', Auth::id())->first()->first_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->other_name }} {{ \App\Student::where('id_user', '=', Auth::id())->first()->last_name }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/student/account" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="/student/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>