<div class="header pb-8 d-flex align-items-center bg-primary">
    <!-- Header container -->
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{ isset($page['currentPage']) ? $page['currentPage'] : "" }}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a
                                    href="{{route('home')}}"><i
                                        class="fas fa-home"></i></a></li>
                            @isset ($page['parentPage'])
                                <li class="breadcrumb-item">
                                    <a>{{$page['parentPage']}}</a>
                                </li>
                            @endisset
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($page['currentPage']) ? $page['currentPage'] : "" }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

