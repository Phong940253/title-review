@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header-common', [
        'title' => __('Xin chào') . ' '. auth()->user()->name,
        'description' => __('Đây là trang thông tin cơ bản, bạn có thể xem và chỉnh sửa thông tin của mình ở đây.'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">

            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="nav-wrapper">
    {{--                            <ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist">--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link rounded-circle active" id="home-tab" data-toggle="tab" href="#tabs_2_1" role="tab" aria-controls="home" aria-selected="true">--}}
    {{--                                        <span class="nav-link-icon d-block"><i class="ni ni-atom"></i></span>--}}
    {{--                                    </a>--}}
    {{--                                </li>--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">--}}
    {{--                                        <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>--}}
    {{--                                    </a>--}}
    {{--                                </li>--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tabs_2_3" role="tab" aria-controls="contact" aria-selected="false">--}}
    {{--                                        <span class="nav-link-icon d-block"><i class="ni ni-cloud-download-95"></i></span>--}}
    {{--                                    </a>--}}
    {{--                                </li>--}}
    {{--                            </ul>--}}
                            <ul class="nav nav-pills nav-pills-circle flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                @for ($i = 1; $i <= count($noidungs); $i++)
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-2 {{($i == 1) ? 'active' : ''}}" id="tabs-icons-text-{{$i}}-tab" data-toggle="tab"
                                       href="#tabs-icons-text-{{$i}}" role="tab" aria-controls="tabs-icons-text-{{$i}}"
                                       aria-selected="{{($i == 1) ? 'true' : 'false'}}">{{$i}}</a>
                                </li>
                                @endfor
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"--}}
{{--                                       aria-selected="false">2</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"--}}
{{--                                       aria-selected="false">3</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"--}}
{{--                                       aria-selected="true">1</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"--}}
{{--                                       aria-selected="false">2</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"--}}
{{--                                       aria-selected="false">3</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"--}}
{{--                                       aria-selected="true">1</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"--}}
{{--                                       aria-selected="false">2</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"--}}
{{--                                       href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"--}}
{{--                                       aria-selected="false">3</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                @for ($i = 1; $i <= count($noidungs); $i++)
                                    <div class="tab-pane fade show {{($i == 1) ? 'active' : ''}}" id="tabs-icons-text-{{$i}}" role="tabpanel"
                                         aria-labelledby="tabs-icons-text-{{$i}}-tab">
                                        <p class="description">{{$noidungs[$i - 1]->content}}</p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
