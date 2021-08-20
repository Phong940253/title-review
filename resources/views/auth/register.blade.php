@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow rounded ">
            <div class="card-body" style="width: 350px;">
                <h6 class="text-muted text-center">Đăng kí</h6>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <div class="input-group">
                            <input id="ms" type="text" placeholder="Mã CB/SV/GV..." class="form-control @error('ms') is-invalid @enderror" name="ms" value="{{ old('ms') }}" required autocomplete="ms" autofocus>

                            @error('ms')
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
                                <label class="input-group-text" for="unitSelected">{{ __('Đơn vị') }}</label>
                            </div>
                            <select class="custom-select" id="unitSelected" name="id_unit" required>
                                <option selected>{{ __('Chọn...') }}</option>
                                {{$units = DB::table('unit')->select('name', 'id')->get()}}
                                @foreach ($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Google reCaptcha -->
                    <div class="form-group @error('g-recaptcha-response') is-invalid @enderror">
                        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>

                        @error('g-recaptcha-response')
                            <span class="help-block with-errors text-danger">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- End Google reCaptcha -->

                    <div class="col-xs-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="accept" id="accept" required>
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
