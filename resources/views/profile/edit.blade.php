@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Xin chào') . ' '. isset(auth()->user()->name) ? auth()->user()->name : "",
        'description' => __('Đây là trang thông tin cơ bản, bạn có thể xem và chỉnh sửa thông tin của mình ở đây.'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            @can('sửa thông tin')
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a onclick="ChangeAvarta();" id="uploaded_image">
                                    <img alt="Avatar" id="Avatar" class="rounded-circle" src="{{ asset(isset(auth()->user()->url_image) ? auth()->user()->url_image : 'argon/img/theme/default.jpg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-5 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div class="text-center">
                                        {{--                                        <form method="POST" action="{{ route('upload-image')}}" id="form-upload-file">--}}
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="d-none" id="upload_image" type="file" name="upload_avarta"
                                               accept="image/*">
                                        <button class="btn btn-success mb-1"
                                                type="button" onclick="ChangeAvarta();">
                                            {{ __('Thay hình đại diện') }}
                                        </button>
                                        {{--                                        </form>--}}

                                        <h3>
                                            {{ auth()->user()->name }}<span class="font-weight-light"></span>
                                        </h3>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>{{auth()->user()->email}}
                                        </div>
                                        <hr class="my-4"/>
                                        <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                                        <a href="#">{{ __('Show more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
                                <div class="form-group{{ $errors->has('ms') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Mã cán bộ / Sinh viên / Học sinh') }}</label>
                                    <input type="text" name="ms" id="input-ms"
                                           class="form-control form-control-alternative{{ $errors->has('ms') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Mã cán bộ / Sinh viên / Học sinh') }}"
                                           value="{{ old('ms', auth()->user()->ms) }}" autofocus>

                                    @if ($errors->has('ms'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ms') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Họ và tên') }}</label>
                                    <input type="text" name="name" id="input-name"
                                           class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Name') }}"
                                           value="{{ old('name', auth()->user()->name) }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           value="{{ old('email', auth()->user()->email) }}" readonly>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-sdt">{{ __('Điện thoại liên hệ') }}</label>
                                    <input type="number" name="telephone" id="input-sdt"
                                           class="form-control form-control-alternative{{ $errors->has('sdt') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Số điện thoại') }}" value="{{ old('telephone', auth()->user()->telephone) }}" autofocus>

                                    @if ($errors->has('telephone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('birthDay') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-birthDay">{{ __('Ngày sinh') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="birthDay" id="input-birthDay" data-date-format="yyyy-mm-dd"
                                               class="form-control form-control-alternative datepicker{{ $errors->has('birthDay') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="{{ old('birthDay', auth()->user()->birthDay) }}" autofocus>
                                    </div>
                                    @if ($errors->has('birthDay'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthDay') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                    <label class="form-control-label mr-3"
                                           for="ratio-gender">{{ __('Giới tính') }}</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" id="radio-male" class="custom-control-input" {{ is_null(old('gender')) ? (!auth()->user()->gender ? "checked" : "") : (!old('gender') ? "checked" : "")}} value="0">
                                        <label class="custom-control-label" for="radio-male">{{ __('Nam') }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" id="radio-female" class="custom-control-input" {{ is_null(old('gender')) ? (auth()->user()->gender ? "checked" : "") : (old('gender') ? "checked" : "")}} value="1">
                                        <label class="custom-control-label" for="radio-female">{{ __('Nữ') }}</label>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}</label>
                                    <select class="form-control form-control-alternative m-b" name="nation" id="input_dan_toc"
                                            placeholder="{{ __('Chọn')}}">
                                        @isset($nation)
                                            {!! $nation !!}
                                        @endisset
                                    </select>

                                    @if ($errors->has('nation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_religion') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_religion">{{ __('Tôn giáo') }}</label>
                                    <select class="form-control form-control-alternative m-b" name="id_religion"
                                            id="input_religion">
                                        @isset($religion)
                                            {!! $religion !!}
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_religion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_religion') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_province') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_province">{{ __('Địa chỉ thường trú') }}</label>
                                    <select class="form-control form-control-alternative m-b" name="id_province"
                                            id="input_province">
                                        @isset($city)
                                            {!! $city !!}
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_province'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_province') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_district') ? ' has-danger' : '' }}">
                                    <select class="form-control form-control-alternative m-b" name="id_district"
                                            id="input_district">
                                        <option value="" disabled>{{ __('Chọn huyện, quận, thị xã') }}</option>
                                        @isset (auth()->user()->id_district)
                                            <option value="{{ auth()->user()->id_district }}" selected>{{ DB::table('districts')->find(auth()->user()->id_district)->name }}</option>
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_district'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_district') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_ward') ? ' has-danger' : '' }}">
                                    <select class="form-control form-control-alternative m-b" name="id_ward" id="input_ward">
                                        <option value="" disabled>{{ __('Chọn xã, phường, thị trấn') }}</option>
                                        @isset (auth()->user()->id_ward)
                                            <option value="{{ auth()->user()->id_ward }}" selected>{{ DB::table('wards')->find(auth()->user()->id_ward)->name }}</option>
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_ward'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_ward') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                    <input type="text" name="street" id="input-street"
                                           class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Nhập số nhà, tên đường') }}" value="{{ old('street', auth()->user()->street) }}"
                                           autofocus>

                                    @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_current_province') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_current_province">{{ __('Địa chỉ hiện tại') }}</label>
                                    <select class="form-control form-control-alternative m-b" name="id_current_province"
                                            id="input_current_province">
                                        @isset($current_city)
                                            {!! $current_city !!}
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_current_province'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_current_province') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_current_district') ? ' has-danger' : '' }}">
                                    <select class="form-control form-control-alternative m-b" name="id_current_district"
                                            id="input_current_district">
                                        <option disabled>{{ __('Chọn huyện, quận, thị xã') }}</option>
                                        @isset (auth()->user()->id_current_district)
                                            <option value="{{ auth()->user()->id_current_district }}" selected>{{ DB::table('districts')->find(auth()->user()->id_current_district)->name }}</option>
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_current_district'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_current_district') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_current_ward') ? ' has-danger' : '' }}">
                                    <select class="form-control form-control-alternative m-b" name="id_current_ward"
                                            id="input_current_ward">
                                        <option disabled>{{ __('Chọn xã, phường, thị trấn') }}</option>
                                        @isset (auth()->user()->id_current_ward)
                                            <option value="{{ auth()->user()->id_current_ward }}" selected>{{ DB::table('wards')->find(auth()->user()->id_current_ward)->name }}</option>
                                        @endisset
                                    </select>

                                    @if ($errors->has('id_current_ward'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_current_ward') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('current_street') ? ' has-danger' : '' }}">
                                    <input type="text" name="current_street" id="input-current-street"
                                           class="form-control form-control-alternative{{ $errors->has('current_street') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Nhập số nhà, tên đường') }}"
                                           value="{{ old('current_street', auth()->user()->current_street) }}" autofocus>

                                    @if ($errors->has('current_street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_street') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('date_admission_doan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_doan">{{ __('Ngày kết nạp Đoàn') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="date_admission_doan" id="input_ngay_vao_doan" data-date-format="yyyy-mm-dd"
                                               class="form-control datepicker{{ $errors->has('date_admission_doan') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_doan', auth()->user()->date_admission_doan) }}" autofocus>
                                    </div>
                                    @if ($errors->has('date_admission_doan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_admission_doan') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('date_admission_dang_reserve') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_dang_du_bi">{{ __('Ngày kết nạp Đảng (dự bị)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="date_admission_dang_reserve" id="input_ngay_vao_dang_du_bi" data-date-format="yyyy-mm-dd"
                                               class="form-control datepicker{{ $errors->has('date_admission_dang_reserve') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_reserve', auth()->user()->date_admission_dang_reserve) }}" autofocus>
                                    </div>
                                    @if ($errors->has('date_admission_dang_reserve'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_admission_dang_reserve') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div
                                    class="form-group{{ $errors->has('date_admission_dang_official') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_dang_chinh_thuc">{{ __('Ngày kết nạp Đảng (chính thức)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="date_admission_dang_official"
                                               id="input_ngay_vao_dang_chinh_thuc" data-date-format="yyyy-mm-dd"
                                               class="form-control datepicker{{ $errors->has('date_admission_dang_official') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_official', auth()->user()->date_admission_dang_official) }}" autofocus>
                                    </div>
                                    @if ($errors->has('date_admission_dang_official'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_admission_dang_official') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('current_position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-chuc_vu_hien_tai">{{ __('Chức vụ Đoàn – Hội hiện tại') }}</label>
                                    <input type="text" name="current_position" id="input-chuc_vu_hien_tai"
                                           class="form-control form-control-alternative{{ $errors->has('current_position') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Ghi rõ chức vụ hiện tại') }}" value="{{ old('current_position', auth()->user()->current_position) }}" autofocus>

                                    @if ($errors->has('current_position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_position') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('highest_position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-chuc_vu_cao_nhat">{{ __('Chúc vụ Đoàn – Hội cao nhất đã từng đảm nhiệm') }}</label>
                                    <input type="text" name="highest_position" id="input-chuc_vu_cao_nhat"
                                           class="form-control form-control-alternative{{ $errors->has('highest_position') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Ghi rõ chức vụ') }}" value="{{ old('highest_position', auth()->user()->highest_position) }}" autofocus>

                                    @if ($errors->has('highest_position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('highest_position') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('id_unit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="unitSelected">{{ __('Khoa') }}</label>
                                    <select class="form-control form-control-alternative m-b" id="unitSelected" name="id_unit">
                                        @isset($unit)
                                            {!! $unit !!}
                                        @endisset
                                    </select>
                                    @if ($errors->has('id_unit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_unit') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="yearSelected">{{ __('Năm') }}</label>
                                    <select class="form-control form-control-alternative m-b" id="yearSelected" name="year">
                                        @isset($year)
                                            {!! $year !!}
                                        @endisset
                                    </select>
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Lưu') }}</button>
                                </div>
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
            @endcan
        </div>
        @can('sửa thông tin')
        <div id="uploadimageModal" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        {{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        <h4 class="modal-title">Upload & Crop Image</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div id="image_demo" style="width:100%;"></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button class="btn btn-success crop_image">Cắt và tải ảnh lên</button>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @include('layouts.footers.auth')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}"/>
    <script>
        const ChangeAvarta = () => {
            $("#upload_image").trigger('click');
        }

        $("#input_province").change(function () {
            $.ajax({
                url: "{{ route('get-district') }}?idProvince=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#input_district').html(data.html);
                }
            });
        });

        $("#input_district").change(function () {
            $.ajax({
                url: "{{ route('get-ward') }}?idDistrict=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#input_ward').html(data.html);
                }
            });
        });

        $("#input_current_province").change(function () {
            $.ajax({
                url: "{{ route('get-district') }}?idProvince=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#input_current_district').html(data.html);
                }
            });
        });

        $("#input_current_district").change(function () {
            $.ajax({
                url: "{{ route('get-ward') }}?idDistrict=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#input_current_ward').html(data.html);
                }
            });
        });

        $(document).ready(function () {
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 135,
                    height: 180,
                    type: 'square' //circle
                },
                boundary: {
                    width: 400,
                    height: 400
                }
            });

            $('#upload_image').on('change', function () {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function () {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function (event) {
                $image_crop.croppie('result', {
                    type: 'blob',
                    size: 'viewport'
                }).then(function (response) {
                    let fd = new FormData();
                    fd.append("image", response);
                    fd.append('_token', '{{ csrf_token() }}');
                    $.ajax({
                        url: "upload-image",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('#uploadimageModal').modal('hide');
                            if (data.success) {
                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                $("#Avatar").attr("src", data.image);
                                $("#smallAvatar").attr("src", data.image);
                                $("#fullAvatar").attr("src", data.image);
                                toastr['success'](data.msg, "Thành công");
                            } else {
                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr['error'](data.msg, "Lỗi");
                            }
                        }
                    });
                })
            });
        });
    </script>
@endsection
