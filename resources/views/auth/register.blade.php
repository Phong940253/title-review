@extends('layouts.app', ['class' => 'bg-default'])

@section('extend-lib')
    <!-- Recapcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            {{ __('Đăng ký') }}
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('ms') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('ms') ? ' is-invalid' : '' }}" placeholder="{{ __('Mã Cán bộ / Sinh viên / Học sinh') }}" type="text" name="ms" value="{{ old('ms') }}" required autofocus>
                                </div>
                                @if ($errors->has('ms'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ms') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Họ và tên') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Mật khẩu') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Nhập lại mật khẩu') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_unit') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="unitSelected">{{ __('Đơn vị') }}</label>
                                    </div>
                                    <select class="custom-select form-control form-control-alternative" id="unitSelected" name="id_unit" required>
                                        <option selected disabled value="">{{ __('Chọn đơn vị') }}</option>
                                        {{$units = DB::table('unit')->select('name', 'id')->get()}}
                                        @foreach ($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('id_unit'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_unit') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Google reCaptcha -->
                            <div class="form-group @error('g-recaptcha-response') is-invalid @enderror">
                                <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ config('app.site_key') }}"></div>

                                @error('g-recaptcha-response')
                                <span class="help-block with-errors text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @enderror
                            </div>
{{--                            <!-- End Google reCaptcha -->--}}
{{--                            <div class="text-muted font-italic">--}}
{{--                                <small>{{ __('độ mạnh mật khẩu') }}: <span class="text-success font-weight-700">{{ __('strong') }}</span></small>--}}
{{--                            </div>--}}
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" name="accept" type="checkbox" required>
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('Đồng ý với các quy định của chương trình')}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
{{--                            @if($errors->any())--}}
{{--                                {!! implode('', $errors->all('<div>:message</div>')) !!}--}}
{{--                            @endif--}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Đăng ký') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
