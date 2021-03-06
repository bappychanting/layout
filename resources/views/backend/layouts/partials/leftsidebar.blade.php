<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    
    <div class="user-info">
        <div class="image">
            <img src="{{url('images/backend/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{{ Auth::guard('admin')->user()->name }}}</div>
            <div class="email">{{{ Auth::guard('admin')->user()->email }}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="logout()"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <script>
        function logout(){
            event.preventDefault();
            swal({
                title: 'Are you sure you want to logout？',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d9534f",
                confirmButtonText: 'Logout Now!',
                cancelButtonText: 'Cancel',
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    document.getElementById('logout-form').submit();
                } else {
                    // swal('Cancelled', 'You are still signed in!', 'info');
                }
            });
        }
    </script>
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li {{ Route::is('back.home')? 'class=active':'' }}>
                <a href="{{ route('back.home') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li {{ Route::is('back.news*')? 'class=active':'' }}>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">rss_feed</i>
                    <span>News</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Route::is('back.news.index') || Route::is('back.news.edit') ? 'class=active':'' }}>
                        <a href="{{ route('back.news.index') }}">All News</a>
                    </li>
                    <li {{ Route::is('back.news.create') ? 'class=active':'' }}>
                        <a href="{{ route('back.news.create') }}">Add New News</a>
                    </li>
                </ul>
            </li>
            <li {{ Route::is('back.contents*')? 'class=active':'' }}>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">language</i>
                    <span>Web Contents</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Route::is('back.contents.welcome') ? 'class=active':'' }}>
                        <a href="{{ route('back.contents.welcome') }}">Front Page</a>
                    </li>
                    <li {{ Route::is('back.contents.about') ? 'class=active':'' }}>
                        <a href="{{ route('back.contents.about') }}">About Us</a>
                    </li>
                    <li {{ Route::is('back.contents.terms') ? 'class=active':'' }}>
                        <a href="{{ route('back.contents.terms') }}">Terms of Services</a>
                    </li>
                    <li {{ Route::is('back.contents.policy') ? 'class=active':'' }}>
                        <a href="{{ route('back.contents.policy') }}">Privacy Policy</a>
                    </li>
                </ul>
            </li>
            <li {{ Route::is('back.users*')? 'class=active':'' }}>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">people</i>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Route::is('back.users.index') || Route::is('back.users.show') || Route::is('back.users.edit') ? 'class=active':'' }}>
                        <a href="{{ route('back.users.index') }}">All Users</a>
                    </li>
                    <li {{ Route::is('back.users.create') ? 'class=active':'' }}>
                        <a href="{{ route('back.users.create') }}">Add New User</a>
                    </li>
                </ul>
            </li>
            <li {{ Route::is('back.admins*')? 'class=active':'' }}>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">verified_user</i>
                    <span>Administrators</span>
                </a>
                <ul class="ml-menu">
                    <li {{ Route::is('back.admins.index') || Route::is('back.admins.edit')? 'class=active':'' }}>
                        <a href="{{ route('back.admins.index') }}">All Administrators</a>
                    </li>
                    <li {{ Route::is('back.admins.create') ? 'class=active':'' }}>
                        <a href="{{ route('back.admins.create') }}">Add New Administrator</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Multi Level Menu</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);">
                            <span>Menu Item</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>Menu Item - 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Level - 2</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 3</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Level - 4</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date('Y') == 2019 ? date('Y') : '2019-'.date('Y') }} <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
