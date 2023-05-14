<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>TF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><img src="{{ asset('lte/dist/img/logo.png') }}"><b>Sitrafis</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- end /.messages-menu -->

          <!-- Notifications Menu -->
          <!-- end Notifications Menu -->

          <!-- Tasks Menu -->
          <!-- end Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              {{-- <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> --}}
              <img src="{{ asset('images/' . $imageName) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                {{-- <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> --}}
                <img src="{{ asset('images/' . $imageName) }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->level }}
                  <small>Member sejak {{ Auth::user()->created_at->format('j F Y') }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- end Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- end Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
</header>