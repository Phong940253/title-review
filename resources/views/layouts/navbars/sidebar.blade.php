<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </li>
            <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                    <i class="ni ni-zoom-split-in"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                    <!-- Dropdown header -->
                    <div class="px-3 py-3">
                        <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                    </div>
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>2 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>3 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>5 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>2 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-5.jpg" class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>3 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- View all -->
                    <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-ungroup"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                    <div class="row shortcuts px-4">
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                    <i class="ni ni-calendar-grid-58"></i>
                                </span>
                            <small>Calendar</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                    <i class="ni ni-email-83"></i>
                                </span>
                            <small>Email</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                    <i class="ni ni-credit-card"></i>
                                </span>
                            <small>Payments</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                    <i class="ni ni-books"></i>
                                </span>
                            <small>Reports</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                    <i class="ni ni-pin-3"></i>
                                </span>
                            <small>Maps</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                    <i class="ni ni-basket"></i>
                                </span>
                            <small>Shop</small>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Hồ sơ của tôi') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Cài đặt') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Hoạt động') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Hỗ trợ') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Đăng xuất') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.edit') }}">
                        <i class="ni ni-circle-08 text-primary"></i> {{ __('Thông tin cá nhân') }}
                    </a>
                </li>
                @isset($tieuchis)
                    @foreach($tieuchis as $tieuchi)
                        <li class="nav-item">
                            @if (count($tieuchi->tieuchuans) != 0)
                                <a class="nav-link" href="#navbar-{{$tieuchi->id}}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-{{$tieuchi->id}}">
                                    <span class="nav-link-text ml-4">{{$tieuchi->name}}</span>
                                </a>
                            @else
                                <a class="nav-link" href="#navbar-{{$tieuchi->id}}">
                                    <span class="nav-link-text ml-4">{{$tieuchi->name}}</span>
                                </a>
                            @endif
                                <div class="collapse" id="navbar-{{$tieuchi->id}}">
                                    <ul class="nav nav-sm flex-column">

                                        @foreach ($tieuchi->tieuchuans as $tieuchuan)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                                    {{$tieuchuan->name}}
                                                </a>
                                            </li>
                                     @endforeach
                                 </ul>
                                </div>
                        </li>
                    @endforeach
                @endisset
                <script>

                </script>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                      <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
