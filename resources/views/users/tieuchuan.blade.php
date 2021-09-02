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
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-title bg-white border-0">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-pills-circle flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    @for ($i = 1; $i <= count($noidungs); $i++)
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-2 {{($i == 1) ? 'active' : ''}}"
                                               id="tabs-icons-text-{{$i}}-tab" data-toggle="tab"
                                               href="#tabs-icons-text-{{$i}}" role="tab"
                                               aria-controls="tabs-icons-text-{{$i}}"
                                               aria-selected="{{($i == 1) ? 'true' : 'false'}}">{{$i}}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @for ($i = 1; $i <= count($noidungs); $i++)
                                <div class="tab-pane fade show {{($i == 1) ? 'active' : ''}}"
                                     id="tabs-icons-text-{{$i}}" role="tabpanel"
                                     aria-labelledby="tabs-icons-text-{{$i}}-tab">
                                    <form>
                                        <p class="card-text">{{$noidungs[$i - 1]->content}}</p>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"
                                                      placeholder="Điền vào đây ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Minh chứng</label>
                                        </div>
                                    </form>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
