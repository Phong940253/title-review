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
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-3">{{ __('Thông tin chung') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Người dùng') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                            </div>
                        </form>
                        <hr class="my-4"/>
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Mật khẩu') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-current-password">{{ __('Mật khẩu hiện tại') }}</label>
                                    <input type="password" name="old_password" id="input-current-password"
                                           class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Mật khẩu hiện tại') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-password">{{ __('Mật khẩu mới') }}</label>
                                    <input type="password" name="password" id="input-password"
                                           class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Mật khẩu mới') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="input-password-confirmation">{{ __('Nhập lại mật khẩu mới') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"
                                           class="form-control form-control-alternative"
                                           placeholder="{{ __('Nhập lại mật khẩu mới') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Đổi mật khẩu') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
