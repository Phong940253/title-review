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
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/default.jpg">
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
                    <a class="nav-link {{(isset($id_tieuchi) || isset($id_tieuchuan)) ? "" : "active"}}" href="{{ route('profile.edit') }}">
                        <i class="ni ni-circle-08 text-primary"></i> {{ __('Thông tin cá nhân') }}
                    </a>
                </li>
                @isset($tieuchis)
                    @foreach($tieuchis as $tieuchi)
                        <li class="nav-item">
                            @if (count($tieuchi->tieuchuans) != 0)
                                <a class="nav-link {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchi->id ? "active" : "" ): ""}}" href="#navbar-{{$tieuchi->id}}" data-toggle="collapse" role="button" aria-expanded="{{isset($id_tieuchi) ? ($id_tieuchi == $tieuchi->id ? "true" : "false") : "false"}}" aria-controls="navbar-{{$tieuchi->id}}">
                                    <span class="nav-link-text ml-4">{{$tieuchi->name}}</span>
                                </a>
                            @else
                                <a class="nav-link {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchi->id ? "active" : "" ): ""}}" href="{{route('tieuchuan')}}?id_tieuchi={{$tieuchi->id}}">
                                    <span class="nav-link-text ml-4">{{$tieuchi->name}}</span>
                                </a>
                            @endif
                                <div class="collapse {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchi->id ? "show" : "") : ""}}" id="navbar-{{$tieuchi->id}}">
                                    <ul class="nav nav-sm flex-column">

                                        @foreach ($tieuchi->tieuchuans as $tieuchuan)
                                            <li class="nav-item">
                                                <a class="nav-link  {{isset($id_tieuchuan) ? ($id_tieuchuan == $tieuchuan->id ? "active" : "" ): ""}}" href="{{ route('tieuchuan') }}?id_tieuchuan={{$tieuchuan->id}}&id_tieuchi={{$tieuchi->id}}">
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
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">--}}
{{--                        <i class="fab fa-laravel" style="color: #f4645f;"></i>--}}
{{--                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>--}}
{{--                    </a>--}}

{{--                    <div class="collapse show" id="navbar-examples">--}}
{{--                        <ul class="nav nav-sm flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('profile.edit') }}">--}}
{{--                                    {{ __('User profile') }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('user.index') }}">--}}
{{--                                    {{ __('User Management') }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('icons') }}">--}}
{{--                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" href="{{ route('map') }}">--}}
{{--                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('table') }}">--}}
{{--                      <i class="ni ni-bullet-list-67 text-default"></i>--}}
{{--                      <span class="nav-link-text">Tables</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">--}}
{{--                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Quy chế</h6>
            <!-- Navigation -->
{{--            <ul class="navbar-nav mb-md-3">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">--}}
{{--                        <i class="ni ni-spaceship"></i> Getting started--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">--}}
{{--                        <i class="ni ni-palette"></i> Foundation--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">--}}
{{--                        <i class="ni ni-ui-04"></i> Components--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </div>
</nav>
