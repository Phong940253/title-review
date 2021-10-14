<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=2.0.0" rel="stylesheet">
    <!-- Toastr CSS -->
    <link type="text/css"  href="{{ asset('argon') }}/css/toastr.min.css" rel="stylesheet">

    @yield('extend-lib')
</head>
<body class="g-sidenav-hidden">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<form id="logout-form" action="https://argon-dashboard-pro-laravel.creative-tim.com/logout" method="POST" style="display: none;">
    <input type="hidden" name="_token" value="sjkIduLRyLKybFvpOT0mYkjiTeKe116lTFeSn0uy">            </form>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scroll-wrapper scrollbar-inner scroll-scrollx_visible" style="position: relative;"><div class="scrollbar-inner scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 624px;">
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard">
                    <img src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link collapsed" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboards</span>
                            </a>
                            <div class="collapse show" id="navbar-dashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item active">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard" class="nav-link">Dashboard</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard-alternative" class="nav-link">Alternative</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="fab fa-laravel" style="color: #f4645f;"></i>
                                <span class="nav-link-text" style="color: #f4645f;">Laravel Examples</span>
                            </a>
                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/profile" class="nav-link">Profile</a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/role" class="nav-link">Role Management</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/user" class="nav-link">User Management</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/category" class="nav-link">Category Management</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/tag" class="nav-link">Tag Management</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/item" class="nav-link">Item Management</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-pages" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-pages">
                                <i class="ni ni-collection text-yellow"></i>
                                <span class="nav-link-text">Pages</span>
                            </a>
                            <div class="collapse " id="navbar-pages">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/timeline" class="nav-link">Timeline</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-components">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                            <div class="collapse " id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/buttons" class="nav-link">Buttons</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/cards" class="nav-link">Cards</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/grid" class="nav-link">Grid</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/notifications" class="nav-link">Notifications</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/icons" class="nav-link">Icons</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/typography" class="nav-link">Typography</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">Multi level</a>
                                        <div class="collapse show" id="navbar-multilevel" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">Thirdlevelmenu</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">Justanotherlink</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">Onelastlink</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-forms">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Forms</span>
                            </a>
                            <div class="collapse " id="navbar-forms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/elements" class="nav-link">Elements</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/components" class="nav-link">Components</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/validation" class="nav-link">Validations</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text">Tables</span>
                            </a>
                            <div class="collapse " id="navbar-tables">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/tables" class="nav-link">Tables</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/sortable" class="nav-link">Sortable</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/datatables" class="nav-link">Datatables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-maps">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Maps</span>
                            </a>
                            <div class="collapse " id="navbar-maps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/googlemaps" class="nav-link">Google</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/vectormaps" class="nav-link">Vector</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/widgets">
                                <i class="ni ni-archive-2 text-green"></i>
                                <span class="nav-link-text">Widgets</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/charts">
                                <i class="ni ni-chart-pie-35 text-info"></i>
                                <span class="nav-link-text">Charts</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/calendar">
                                <i class="ni ni-calendar-grid-58 text-red"></i>
                                <span class="nav-link-text">Calendar</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/docs/getting-started/overview.html" target="_blank">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Getting started</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/docs/foundation/colors.html" target="_blank">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Foundation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/docs/components/alerts.html" target="_blank">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://argon-dashboard-pro-laravel.creative-tim.com/docs/plugins/charts.html" target="_blank">
                                <i class="ni ni-chart-pie-35"></i>
                                <span class="nav-link-text">Plugins</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 0px; left: 0px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 501px; top: 0px;"></div></div></div></div>
</nav>
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand border-bottom navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
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
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="https://argon-dashboard-pro-laravel.creative-tim.com/docs/getting-started/overview.html" target="_blank" class="btn btn-neutral btn-documentation btn-icon">
                        <span class="btn-inner--icon">
                            <i class="ni ni-book-bookmark mr-2"></i>
                        </span>
                            <span class="nav-link-inner--text">Documentation</span>
                        </a>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon">
                            <i class="fas fa-shopping-cart mr-2"></i>
                        </span>
                            <span class="nav-link-inner--text">Purchase now</span>
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
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="/../argon/img/theme/team-3.jpg">
                            </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="https://argon-dashboard-pro-laravel.creative-tim.com/profile" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="https://argon-dashboard-pro-laravel.creative-tim.com/logout" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>        <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Sales value</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales-dark" class="chart-canvas chartjs-render-monitor" style="display: block; width: 282px; height: 350px;" width="846" height="1050"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h5 class="h3 mb-0">Total orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="chart-bars" class="chart-canvas chartjs-render-monitor" width="846" height="1050" style="display: block; width: 282px; height: 350px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <!-- Members list group card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Team members</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Alex Smith</a>
                                        </h4>
                                        <span class="text-warning">●</span>
                                        <small>In a meeting</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Samantha Ivy</a>
                                        </h4>
                                        <span class="text-danger">●</span>
                                        <small>Offline</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- Checklist -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">To do list</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-0">
                        <!-- List group -->
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-success checklist-item-checked">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Call with Dave</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-success">
                                            <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked="">
                                            <label class="custom-control-label" for="chk-todo-task-1"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-warning">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Lunch meeting</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-warning">
                                            <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-2"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-info">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-info">
                                            <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-3"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-danger checklist-item-checked">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Winter Hackaton</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-danger">
                                            <input class="custom-control-input" id="chk-todo-task-4" type="checkbox" checked="">
                                            <label class="custom-control-label" for="chk-todo-task-4"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- Progress track -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Progress track</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/bootstrap.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Argon Design System</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/angular.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Angular Now UI Kit PRO</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/sketch.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>Black Dashboard</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/react.jpg">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h5>React Material Dashboard</h5>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 mb-0">Activity feed</h5>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="#">
                                <img src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg" class="avatar">
                            </a>
                            <div class="mx-3">
                                <a href="#" class="text-dark font-weight-600 text-sm">John Snow</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                        </div>
                        <div class="text-right ml-auto">
                            <button type="button" class="btn btn-sm btn-primary btn-icon">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Follow</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mb-4">
                            Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV
                            because you’re telling them from the off exactly why they should hire you.
                        </p>
                        <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/img-1-1000x600.jpg" class="img-fluid rounded">
                        <div class="row align-items-center my-3 pb-3 border-bottom">
                            <div class="col-sm-6">
                                <div class="icon-actions">
                                    <a href="#" class="like active">
                                        <i class="ni ni-like-2"></i>
                                        <span class="text-muted">150</span>
                                    </a>
                                    <a href="#">
                                        <i class="ni ni-chat-round"></i>
                                        <span class="text-muted">36</span>
                                    </a>
                                    <a href="#">
                                        <i class="ni ni-curved-next"></i>
                                        <span class="text-muted">12</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 d-none d-sm-block">
                                <div class="d-flex align-items-center justify-content-sm-end">
                                    <div class="avatar-group">
                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Jessica Rowland">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg" class="">
                                        </a>
                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Audrey Love">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg" class="rounded-circle">
                                        </a>
                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Michael Lewis">
                                            <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg" class="rounded-circle">
                                        </a>
                                    </div>
                                    <small class="pl-2 font-weight-bold">and 30+ more</small>
                                </div>
                            </div>
                        </div>
                        <!-- Comments -->
                        <div class="mb-1">
                            <div class="media media-comment">
                                <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                <div class="media-body">
                                    <div class="media-comment-text">
                                        <h6 class="h5 mt-0">Michael Lewis</h6>
                                        <p class="text-sm lh-160">Cras sit amet nibh libero nulla vel metus scelerisque ante sollicitudin. Cras purus odio
                                            vestibulum in vulputate viverra turpis.</p>
                                        <div class="icon-actions">
                                            <a href="#" class="like active">
                                                <i class="ni ni-like-2"></i>
                                                <span class="text-muted">3 likes</span>
                                            </a>
                                            <a href="#">
                                                <i class="ni ni-curved-next"></i>
                                                <span class="text-muted">2 shares</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media media-comment">
                                <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                <div class="media-body">
                                    <div class="media-comment-text">
                                        <h6 class="h5 mt-0">Jessica Stones</h6>
                                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                        <div class="icon-actions">
                                            <a href="#" class="like active">
                                                <i class="ni ni-like-2"></i>
                                                <span class="text-muted">10 likes</span>
                                            </a>
                                            <a href="#">
                                                <i class="ni ni-curved-next"></i>
                                                <span class="text-muted">1 share</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="media align-items-center">
                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle mr-4" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                <div class="media-body">
                                    <form>
                                        <textarea class="form-control" placeholder="Write your comment" rows="1"></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Light table</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Project</th>
                                        <th scope="col" class="sort" data-sort="budget">Budget</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Users</th>
                                        <th scope="col" class="sort" data-sort="completion">Completion</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Argon Design System</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $2500 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">pending</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/angular.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $1800 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i>
                                                    <span class="status">completed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/sketch.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Black Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $3150 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-danger"></i>
                                                    <span class="status">delayed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">72%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/react.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $4400 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-info"></i>
                                                    <span class="status">on schedule</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">90%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/vue.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $2200 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i>
                                                    <span class="status">completed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Argon Design System</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $2500 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">pending</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/angular.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $1800 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i>
                                                    <span class="status">completed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/sketch.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Black Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $3150 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-danger"></i>
                                                    <span class="status">delayed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">72%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/angular.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $1800 USD
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i>
                                                    <span class="status">completed</span>
                                                </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-deck">
                    <div class="card bg-gradient-default">
                        <div class="card-body">
                            <div class="mb-2">
                                <sup class="text-white">$</sup> <span class="h2 text-white">3,300</span>
                                <div class="text-light mt-2 text-sm">Your current balance</div>
                                <div>
                                    <span class="text-success font-weight-600">+ 15%</span> <span class="text-light">($250)</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-block btn-neutral">Add credit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <small class="text-light">Orders: 60%</small>
                                    <div class="progress progress-xs my-2">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div class="col"><small class="text-light">Sales: 40%</small>
                                    <div class="progress progress-xs my-2">
                                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Username card -->
                    <div class="card bg-gradient-danger">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <img src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/icons/cards/bitcoin.png" alt="Image placeholder">
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-lg badge-success">Active</span>
                                </div>
                            </div>
                            <div class="my-4">
                                <span class="h6 surtitle text-light">
                            Username
                            </span>
                                <div class="h1 text-white">@johnsnow</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="h6 surtitle text-light">Name</span>
                                    <span class="d-block h3 text-white">John Snow</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Page name</th>
                                <th scope="col">Visitors</th>
                                <th scope="col">Unique users</th>
                                <th scope="col">Bounce rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    /argon/
                                </th>
                                <td>
                                    4,569
                                </td>
                                <td>
                                    340
                                </td>
                                <td>
                                    <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    /argon/index.html
                                </th>
                                <td>
                                    3,985
                                </td>
                                <td>
                                    319
                                </td>
                                <td>
                                    <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    /argon/charts.html
                                </th>
                                <td>
                                    3,513
                                </td>
                                <td>
                                    294
                                </td>
                                <td>
                                    <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    /argon/tables.html
                                </th>
                                <td>
                                    2,050
                                </td>
                                <td>
                                    147
                                </td>
                                <td>
                                    <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    /argon/profile.html
                                </th>
                                <td>
                                    1,795
                                </td>
                                <td>
                                    190
                                </td>
                                <td>
                                    <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Referral</th>
                                <th scope="col">Visitors</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    Facebook
                                </th>
                                <td>
                                    1,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Facebook
                                </th>
                                <td>
                                    5,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">70%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Google
                                </th>
                                <td>
                                    4,807
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">80%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Instagram
                                </th>
                                <td>
                                    3,678
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">75%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    twitter
                                </th>
                                <td>
                                    2,645
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">30%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-lg-left text-muted">
                        © 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp; <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div></footer>    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/vendor/js-cookie/js.cookie.js"></script>
<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
<!-- Argon JS -->
<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/js/argon.js?v=1.0.1"></script>
{{--<div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"><div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div></div>--}}
{{--<script src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/js/demo.min.js"></script>--}}

{{--<style>--}}
{{--    #ofBar {--}}
{{--        background: linear-gradient(135deg, #FF9500 0%, #f37227 100%);--}}
{{--        text-align: left;--}}
{{--        z-index: 999999999;--}}
{{--        font-size: 16px;--}}
{{--        color: #fff;--}}
{{--        padding: 18px 5%;--}}
{{--        font-weight: 400;--}}
{{--        display: block;--}}
{{--        position: relative;--}}
{{--        top: 0px;--}}
{{--        box-shadow: 0 6px 13px -4px rgba(0, 0, 0, 0.25);--}}
{{--    }--}}
{{--    #ofBar b {--}}
{{--        font-size: 15px !important;--}}
{{--    }--}}
{{--    #count-down {--}}
{{--        display: initial;--}}
{{--        padding-left: 10px;--}}
{{--        font-weight: bold;--}}
{{--    }--}}
{{--    #close-bar {--}}
{{--        font-size: 22px;--}}
{{--        color: #3e3947;--}}
{{--        margin-right: 0;--}}
{{--        position: absolute;--}}
{{--        right: 5%;--}}
{{--        background: white;--}}
{{--        opacity: 0.5;--}}
{{--        padding: 0px;--}}
{{--        height: 25px;--}}
{{--        line-height: 21px;--}}
{{--        width: 25px;--}}
{{--        border-radius: 50%;--}}
{{--        text-align: center;--}}
{{--        top: 18px;--}}
{{--        cursor: pointer;--}}
{{--        z-index: 9999999999;--}}
{{--        font-weight: 200;--}}
{{--    }--}}
{{--    #close-bar:hover{--}}
{{--        opacity: 1;--}}
{{--    }--}}
{{--    #btn-bar {--}}
{{--        background-color: #fff;--}}
{{--        color: #40312d;--}}
{{--        border-radius: 4px;--}}
{{--        padding: 10px 20px;--}}
{{--        font-weight: bold;--}}
{{--        text-transform: uppercase;--}}
{{--        font-size: 12px;--}}
{{--        opacity: .95;--}}
{{--        margin-left: 15px;--}}
{{--        top: 0px;--}}
{{--        position: relative;--}}
{{--        cursor: pointer;--}}
{{--        text-align: center;--}}
{{--        box-shadow: 0 5px 10px -3px rgba(0,0,0,.23), 0 6px 10px -5px rgba(0,0,0,.25);--}}
{{--    }--}}
{{--    #btn-bar:hover{--}}
{{--        opacity: 0.9;--}}
{{--    }--}}
{{--    #btn-bar{--}}
{{--        opacity: 1;--}}
{{--    }--}}

{{--    #btn-bar span {--}}
{{--        color: red;--}}
{{--    }--}}
{{--    .right-side{--}}
{{--        float: right;--}}
{{--        margin-right: 60px;--}}
{{--        top: -6px;--}}
{{--        position: relative;--}}
{{--        display: block;--}}
{{--    }--}}

{{--    #oldPriceBar {--}}
{{--        text-decoration: line-through;--}}
{{--        font-size: 16px;--}}
{{--        color: #fff;--}}
{{--        font-weight: 400;--}}
{{--        top: 2px;--}}
{{--        position: relative;--}}
{{--    }--}}
{{--    #newPrice{--}}
{{--        color: #fff;--}}
{{--        font-size: 19px;--}}
{{--        font-weight: 700;--}}
{{--        top: 2px;--}}
{{--        position: relative;--}}
{{--        margin-left: 7px;--}}
{{--    }--}}

{{--    #fromText {--}}
{{--        font-size: 15px;--}}
{{--        color: #fff;--}}
{{--        font-weight: 400;--}}
{{--        margin-right: 3px;--}}
{{--        top: 0px;--}}
{{--        position: relative;--}}
{{--    }--}}

{{--    @media(max-width: 991px){--}}
{{--        .right-side{--}}
{{--            float:none;--}}
{{--            margin-right: 0px;--}}
{{--            margin-top: 5px;--}}
{{--            top: 0px--}}
{{--        }--}}
{{--        #ofBar {--}}
{{--            padding: 50px 20px 20px;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        #btn-bar{--}}
{{--            display: block;--}}
{{--            margin-top: 10px;--}}
{{--            margin-left: 0;--}}
{{--        }--}}
{{--    }--}}
{{--    @media (max-width: 768px) {--}}
{{--        #count-down {--}}
{{--            display: block;--}}
{{--            font-size: 25px;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}
{{--<script type="text/javascript" id="">function setCookie(b,d,c){var a=new Date;a.setTime(a.getTime()+864E5*c);c="expires\x3d"+a.toUTCString();document.cookie=b+"\x3d"+d+";"+c+";path\x3d/"}function readCookie(b){b+="\x3d";for(var d=document.cookie.split(";"),c=0;c<d.length;c++){for(var a=d[c];" "==a.charAt(0);)a=a.substring(1,a.length);if(0==a.indexOf(b))return a.substring(b.length,a.length)}return null}--}}
{{--    function createOfferBar(){var b=document.createElement("div");b.setAttribute("id","ofBar");b.innerHTML="\x3cb\x3e8 Autumn Specials\x3c/b\x3e \ud83c\udf89 Choose your favorite one and save 80% OFF! \x3cb\x3eLIMITED TIME\x3c/b\x3e\x3ca href\x3d'https://www.creative-tim.com/campaign?ref\x3ddofb-autumn-2021' target\x3d'_blank' id\x3d'btn-bar'\x3eSee Offer\x3c/a\x3e\x3c/span\x3e\x3ca id\x3d'close-bar'\x3e\u00d7\x3c/a\x3e";document.body.insertBefore(b,document.body.firstChild)}--}}
{{--    function closeOfferBar(){document.getElementById("ofBar").setAttribute("style","display:none");setCookie("view_offer_bar","true",1)}var value=readCookie("view_offer_bar");null==value&&(createOfferBar(),document.getElementById("close-bar").addEventListener("click",closeOfferBar));</script>--}}
{{--<iframe name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame" src="https://vars.hotjar.com/box-dfc01efbdc94bb0936d9a35a502b0b64.html" style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe>--}}
<div id="mttContainer" class="bootstrapiso" style="left: 0px; top: 0px; position: fixed; z-index: 100000200; width: 500px; margin-left: -250px;" data-original-title="" title=""></div></body></html>
