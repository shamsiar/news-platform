        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
              <span class="logo-sm">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="17">
              </span>
            </a>
            <!-- Light Logo-->
            <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
              <span class="logo-sm">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" class="admin-logo">
              </span>
              <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" class="admin-logo">
              </span>
            </a>
            <button type="button" class="btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover p-0"
              id="vertical-hover">
              <i class="ri-record-circle-line"></i>
            </button>
          </div>

          <div id="scrollbar">
            <div class="container-fluid">

              <div id="two-column-menu">
              </div>
              <ul class="navbar-nav" id="navbar-nav">

                <!-- Dashboard -->
                <li class="nav-item">
                  <a class="nav-link menu-link @if (Route::currentRouteNamed('admin.dashboard')) active @endif"
                    href="{{ route('admin.dashboard') }}">
                    <i class="ri-dashboard-2-line"></i>
                    <span data-key="t-dashboards">Dashboards</span>
                  </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Core Platform Features</span></li>

                <!-- Category -->
                <li class="nav-item">
                  <a class="nav-link menu-link @if (Route::currentRouteNamed('category.manage') || Route::currentRouteNamed('category.create')) active @endif" href="#sidebarServices"
                    data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarServices">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">All Categories</span>
                  </a>
                  <div class="menu-dropdown @if (Route::currentRouteNamed('category.manage') || Route::currentRouteNamed('category.create')) show @endif collapse"
                    id="sidebarServices">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="{{ route('category.manage') }}"
                          class="nav-link @if (Route::currentRouteNamed('category.manage')) active @endif" data-key="t-calendar">Manage
                          All Category </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('category.create') }}"
                          class="nav-link @if (Route::currentRouteNamed('category.create')) active @endif" data-key="t-chat">Add New
                          Category </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <!-- News Post -->
                <li class="nav-item">
                  <a class="nav-link menu-link @if (Route::currentRouteNamed('post.manage') || Route::currentRouteNamed('post.create')) active @endif" href="#sidebarNews"
                    data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNews">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">All News</span>
                  </a>
                  <div class="menu-dropdown @if (Route::currentRouteNamed('post.manage') || Route::currentRouteNamed('post.create')) show @endif collapse" id="sidebarNews">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="{{ route('post.manage') }}"
                          class="nav-link @if (Route::currentRouteNamed('post.manage')) active @endif" data-key="t-calendar">Manage
                          All News </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('post.create') }}"
                          class="nav-link @if (Route::currentRouteNamed('post.create')) active @endif" data-key="t-chat">Add New
                          News </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i>
                  <span data-key="t-pages">Visitor Management</span>
                </li>

                <!-- Platform Settings -->
                <li class="nav-item">
                  <a class="nav-link menu-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarSettings">
                    <i class="ri-settings-2-line"></i> <span data-key="t-apps">Platform Settings</span>
                  </a>
                  <div class="menu-dropdown collapse" id="sidebarSettings">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="{{ route('settings.index') }}"
                          class="nav-link @if (Route::currentRouteNamed('settings.index')) active @endif" data-key="t-calendar">App
                          Settings </a>
                      </li>
                      {{-- <li class="nav-item">
                        <a href="" class="nav-link" data-key="t-calendar">Manage Settings </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link" data-key="t-calendar">Manage Settings </a>
                      </li> --}}
                    </ul>
                  </div>
                </li>

              </ul>
            </div>
            <!-- Sidebar -->
          </div>

          <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
