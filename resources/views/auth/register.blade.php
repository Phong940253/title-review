@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow rounded ">
            <div class="card-body" style="width: 350px;">
                <h6 class="text-muted text-center">Đăng kí</h6>
                <form action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="input-group">
                            <input id="name" type="text" placeholder="Mã CB/SV/GV..." class="form-control @error('maso') is-invalid @enderror" name="maso" value="{{ old('maso') }}" required autocomplete="name" autofocus>

                            @error('maso')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input id="name" type="text" placeholder="Họ và tên..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input id="email" type="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input id="password" type="password" placeholder="Mật khẩu..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input id="password-confirm" type="password" placeholder="Nhập lại mật khẩu..." class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">{{ __('Đơn vị') }}</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected></option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <!-- Google reCaptcha -->
                    <div class="form-group">
                        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                    </div>
                    <!-- End Google reCaptcha -->

                    <div class="col-xs-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="accept" id="accept">
                            <label class="form-check-label">{{ __('Đồng ý với các quy định của chương trình') }}</label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Đăng kí') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
