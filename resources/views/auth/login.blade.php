@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow rounded ">
            <div class="card-body" style="width: 350px;">
                <h6 class="text-muted text-center">Đăng nhập</h6>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email ..." autofocus=""
                                   value="{{ old('email') }}" required autocomplete="email"

                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control " placeholder="Mật khẩu ..."
                                   class="form-control @error('password') is-invalid @enderror" required
                                   autocomplete="current-password" autofocus="">
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
                    <div class="d-flex justify-content-between flex-row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __(' Ghi nhớ') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Đăng nhập') }}</button>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
