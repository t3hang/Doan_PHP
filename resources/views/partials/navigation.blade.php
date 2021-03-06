
        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="d-none d-sm-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
            
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-muted">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="slimscroll noti-scroll">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                @auth
                                {{ Auth::user()->ten_dang_nhap }}
                                @endauth
                                <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        Welcome !
                                    </h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Đăng Xuất</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/3.png') }}" alt="" height="50">
                                <!-- <span class="logo-lg-text-dark">Upvex</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">X</span> -->
                                <img src="{{ asset('assets/images/3.png') }}" alt="" height="50">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            
                    </ul>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="">
                                <a href="#">
                                    <i class="la la-dashboard"></i>Trang Chủ </a>
                        
                            </li>

                            <li class="has-submenu">
                                <a href=" {{ route('linh-vuc.index') }} ">
                                    <i class="la la-cube"></i>Lĩnh Vực<div class="arrow-down"></div></a>
                                     <ul class="submenu">
                                      <li>
                                        <a href="{{ route('linh-vuc.index') }}">Danh sách Lĩnh Vực</a>
                                      </li>
                                     <!--  <li>
                                        <a href="{{ route('linh-vuc.create') }}">Thêm Lĩnh Vực</a>
                                    </li> -->
                                        <li>
                                        <a href="{{ route('linh-vuc.trash') }}">Danh sách đã xóa</a>
                                      </li>
                                      </li>
                                    </ul>
                    
                            </li>

                            <li class="has-submenu">
                                <a href=" {{ route('cau-hoi.index') }}"> <i class="la la-clone"></i>Câu Hỏi<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                      <li>
                                        <a href="{{ route('cau-hoi.index') }}">Danh sách câu hỏi</a>
                                      </li>
                                      <li>
                                        <a href="{{ route('cau-hoi.create') }}">Thêm câu hỏi</a>
                                      </li>
                                       <li>
                                        <a href="{{ route('cau-hoi.trash') }}">Danh sách xóa</a>
                                      </li>
                                    </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ route('nguoi-choi.index') }}"> <i class="la la-briefcase"></i>Người Chơi<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                      <li>
                                        <a href="{{ route('nguoi-choi.index') }}">Danh sách người chơi</a>
                                      </li>
                                      <li>
                                        <a href="{{ route('nguoi-choi.trash') }}">Danh sách xóa</a>
                                      </li>
                                    </ul>
                                
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('goi-credit.index') }}"> <i class="la la-diamond"></i>Credit<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                      <li>
                                        <a href="{{ route('goi-credit.index') }}">Danh sách gói credit</a>
                                      </li>
                                      <!-- <li>
                                        <a href="{{ route('goi-credit.create') }}">Thêm gói credit</a>
                                      </li> -->
                                      <li>
                                        <a href="{{ route('goi-credit.trash') }}">Danh sách xóa</a>
                                      </li>
                                    </ul>
                                
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('nguoi-choi.index') }}"> <i class="la la-diamond"></i>Lịch sử credit<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                      <li>
                                        <a href="{{ route('lich-su-credit.index') }}">Danh sách mua gói credit</a>
                                      </li>
                                    </ul>
                                
                            </li>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>
        <!-- End Navigation Bar-->