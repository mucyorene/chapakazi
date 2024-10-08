<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                                collapse-btn"> <i data-feather="align-justify"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
            <i data-feather="maximize"></i>
          </a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('dashboard/assets/img/users/avatar.png') }}"
            class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
          <div class="dropdown-title">{{Auth::guard('webadmins')->user()->names}}</div>
          <a href="/admin/profile" class="dropdown-item has-icon"> <i class="far
                                    fa-user"></i> Profile
          </a>
          {{-- <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
            Activities
          </a>
          <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
            Settings
          </a> --}}
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href=""><span class="logo-name text-success">Chapakazi</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown" id="dashboardAdmin">
        <a href="{{ route('admin.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown" id="employeeAdmin">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="briefcase"></i><span>Employees</span></a>
        <ul class="dropdown-menu">

          {{-- <li id="employeeAdmin20"><a class="nav-link" href="/dash/employeeRequested">Requested</a></li> --}}
          <li id="employeeAdmin2"><a class="nav-link" href="/dash/allCasual">Recruited</a></li>
          <li id="employeeAdmin1"><a class="nav-link" id="recruites" href="/recruitedEmployee">All Employees</a></li>


        </ul>
      </li>
      <li class="menu-header">Employers</li>
      <li class="dropdown" id="employers">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Employers</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/allEmployers">All</a></li>
        </ul>
      </li>
      {{-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="shopping-bag"></i><span>Advanced</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="avatar.html">Avatar</a></li>
          <li><a class="nav-link" href="card.html">Card</a></li>
          <li><a class="nav-link" href="modal.html">Modal</a></li>
          <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
          <li><a class="nav-link" href="toastr.html">Toastr</a></li>
          <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
          <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
          <li><a class="nav-link" href="pricing.html">Pricing</a></li>
          <li><a class="nav-link" href="tabs.html">Tab</a></li>
        </ul>
      </li> --}}
      {{-- <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank Page</span></a></li>
      <li class="menu-header">Chapakazi</li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Forms</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>
          <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
          <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
          <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
          <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
        </ul>
      </li> --}}
      {{-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
          <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>
          <li><a class="nav-link" href="datatables.html">Datatable</a></li>
          <li><a class="nav-link" href="export-table.html">Export Table</a></li>
          <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="pie-chart"></i><span>Charts</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
          <li><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>
          <li><a class="nav-link" href="chart-echart.html">eChart</a></li>
          <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>
          <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>
          <li><a class="nav-link" href="chart-morris.html">Morris</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Icons</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
          <li><a class="nav-link" href="icon-material.html">Material Design</a></li>
          <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>
          <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>
          <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>
        </ul>
      </li> --}}
      {{-- <li class="menu-header">Media</li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Gallery</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
          <li><a href="gallery1.html">Gallery 2</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>
        <ul class="dropdown-menu">
          <li><a href="carousel.html">Bootstrap Carousel.html</a></li>
          <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>
        </ul>
      </li> --}}
      {{-- <li><a class="nav-link" href="timeline.html"><i data-feather="sliders"></i><span>Timeline</span></a></li>
      <li class="menu-header">Maps</li> --}}
      {{-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Google
            Maps</span></a>
        <ul class="dropdown-menu">
          <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
          <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
          <li><a href="gmaps-geocoding.html">Geocoding</a></li>
          <li><a href="gmaps-geolocation.html">Geolocation</a></li>
          <li><a href="gmaps-marker.html">Marker</a></li>
          <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
          <li><a href="gmaps-route.html">Route</a></li>
          <li><a href="gmaps-simple.html">Simple</a></li>
        </ul>
      </li> --}}
      {{-- <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
            Map</span></a></li> --}}
      {{-- <li class="menu-header">Pages</li> --}}
      {{-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="user-check"></i><span>Auth</span></a>
        <ul class="dropdown-menu">
          <li><a href="auth-login.html">Login</a></li>
          <li><a href="auth-register.html">Register</a></li>
          <li><a href="auth-forgot-password.html">Forgot Password</a></li>
          <li><a href="auth-reset-password.html">Reset Password</a></li>
          <li><a href="subscribe.html">Subscribe</a></li>
        </ul>
      </li> --}}
      {{-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="alert-triangle"></i><span>Errors</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="errors-503.html">503</a></li>
          <li><a class="nav-link" href="errors-403.html">403</a></li>
          <li><a class="nav-link" href="errors-404.html">404</a></li>
          <li><a class="nav-link" href="errors-500.html">500</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
            Pages</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="create-post.html">Create Post</a></li>
          <li><a class="nav-link" href="posts.html">Posts</a></li>
          <li><a class="nav-link" href="profile.html">Profile</a></li>
          <li><a class="nav-link" href="contact.html">Contact</a></li>
          <li><a class="nav-link" href="invoice.html">Invoice</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="chevrons-down"></i><span>Multilevel</span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Menu 1</a></li>
          <li class="dropdown">
            <a href="#" class="has-dropdown">Menu 2</a>
            <ul class="dropdown-menu">
              <li><a href="#">Child Menu 1</a></li>
              <li class="dropdown">
                <a href="#" class="has-dropdown">Child Menu 2</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Child Menu 1</a></li>
                  <li><a href="#">Child Menu 2</a></li>
                </ul>
              </li>
              <li><a href="#"> Child Menu 3</a></li>
            </ul>
          </li>
        </ul>
      </li> --}}
    </ul>
  </aside>
</div>
