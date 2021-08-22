@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow rounded ">
            <div class="card-body" style="width: 350px;">
                <h6 class="text-muted text-center">Đặt lại mật khẩu</h6>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email ..." autofocus=""
                                   value="{{ old('email') }}" required autocomplete="email">
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
                    <div class="d-flex justify-content-between flex-row align-items-center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Gửi link đặt lại mật khẩu') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
