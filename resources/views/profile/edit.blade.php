@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Xin chào') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
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
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Họ và tên') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control" value="{{ old('email', auth()->user()->email) }}" readonly >
                                </div>
                                <div class="form-group{{ $errors->has('sdt') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-sdt">{{ __('Điện thoại liên hệ') }}</label>
                                    <input type="number" name="sdt" id="input-sdt" class="form-control form-control-alternative{{ $errors->has('sdt') ? ' is-invalid' : '' }}" placeholder="{{ __('Số điện thoại') }}" value="" autofocus>

                                    @if ($errors->has('sdt'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sdt') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('birthDay') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-birthDay">{{ __('Ngày sinh') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="birthDay" id="input-birthDay" class="form-control datepicker{{ $errors->has('birthDay') ? ' is-invalid' : '' }}" placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('birthDay'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthDay') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                    <label class="form-control-label mr-3" for="ratio-gender">{{ __('Giới tính') }}</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" id="radio-male" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="radio-male">{{ __('Nam') }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" id="radio-female" class="custom-control-input">
                                        <label class="custom-control-label" for="radio-female">{{ __('Nữ') }}</label>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dan_toc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}</label>
                                    <select class="form-control m-b" name="dan_toc" id="input_dan_toc" placeholder="{{ __('Chọn')}}">
                                        <option value=""></option>
                                        <option selected="" value="1">Kinh</option>
                                        <option value="2">Tày</option>
                                        <option value="3">Thái</option>
                                        <option value="4">Hoa</option>
                                        <option value="5">Khơ-me</option>
                                        <option value="6">Mường</option>
                                        <option value="7">Nùng</option>
                                        <option value="8">Hmông</option>
                                        <option value="9">Dao</option>
                                        <option value="10">Gia-rai</option>
                                        <option value="11">Ngái</option>
                                        <option value="12">Ê-đê</option>
                                        <option value="13">Ba-na</option>
                                        <option value="14">Xơ-đăng</option>
                                        <option value="15">Sán Chay</option>
                                        <option value="16">Cơ-ho</option>
                                        <option value="17">Chăm</option>
                                        <option value="18">Sán Dìu</option>
                                        <option value="19">Hrê</option>
                                        <option value="20">Mnông</option>
                                        <option value="21">Ra-glai</option>
                                        <option value="22">Xtiêng</option>
                                        <option value="23">Bru-Vân Kiều</option>
                                        <option value="24">Thổ</option>
                                        <option value="25">Giáy</option>
                                        <option value="26">Cơ-tu</option>
                                        <option value="27">Gié-Triêng</option>
                                        <option value="28">Mạ</option>
                                        <option value="29">Khơ-mú</option>
                                        <option value="30">Co</option>
                                        <option value="31">Ta-ôi</option>
                                        <option value="32">Chơ-ro</option>
                                        <option value="33">Kháng</option>
                                        <option value="34">Xinh-mun</option>
                                        <option value="35">Hà Nhì</option>
                                        <option value="36">Chu-ru</option>
                                        <option value="37">Lào</option>
                                        <option value="38">La Chi</option>
                                        <option value="39">La Ha </option>
                                        <option value="40">Phù Lá</option>
                                        <option value="41">La Hủ</option>
                                        <option value="42">Lự</option>
                                        <option value="43">Lô Lô</option>
                                        <option value="44">Chứt</option>
                                        <option value="45">Mảng</option>
                                        <option value="46">Pà Thẻn</option>
                                        <option value="47">Cơ Lao</option>
                                        <option value="48">Cống</option>
                                        <option value="49">Bố Y</option>
                                        <option value="50">Si La</option>
                                        <option value="51">Pu Péo</option>
                                        <option value="52">Brâu</option>
                                        <option value="53">Ơ Đu</option>
                                        <option value="54">Rơ-măm</option>
                                        <option value="55">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('dia_chi_thuong_tru') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_dia_chi_thuong_tru">{{ __('Địa chỉ thường trú') }}</label>
                                    <input type="text" name="dia_chi_thuong_tru" id="input_dia_chi_thuong_tru" class="form-control" value=""  >
                                </div>
                                <div class="form-group{{ $errors->has('dia_chi_lien_lac') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_dia_chi_lien_lac">{{ __('Địa chỉ liên lạc') }}</label>
                                    <input type="text" name="dia_chi_lien_lac" id="input_dia_chi_lien_lac" class="form-control" value=""  >
                                </div>
                                <div class="form-group{{ $errors->has('ngay_vao_doan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_ngay_vao_doan">{{ __('Ngày kết nạp Đoàn') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_doan" id="input_ngay_vao_doan" class="form-control datepicker{{ $errors->has('ngay_vao_doan') ? ' is-invalid' : '' }}" placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_doan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_doan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('ngay_vao_dang_du_bi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_ngay_vao_dang_du_bi">{{ __('Ngày kết nạp Đảng (dự bị)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_dang_du_bi" id="input_ngay_vao_dang_du_bi" class="form-control datepicker{{ $errors->has('ngay_vao_dang_du_bi') ? ' is-invalid' : '' }}" placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_dang_du_bi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_dang_du_bi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('ngay_vao_dang_chinh_thuc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_ngay_vao_dang_chinh_thuc">{{ __('Ngày kết nạp Đảng (chính thức)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_dang_chinh_thuc" id="input_ngay_vao_dang_chinh_thuc" class="form-control datepicker{{ $errors->has('ngay_vao_dang_chinh_thuc') ? ' is-invalid' : '' }}" placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_dang_chinh_thuc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_dang_chinh_thuc') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('chuc_vu_hien_tai') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-chuc_vu_hien_tai">{{ __('Chức vụ Đoàn – Hội hiện tại') }}</label>
                                    <input type="text" name="chuc_vu_hien_tai" id="input-chuc_vu_hien_tai" class="form-control form-control-alternative{{ $errors->has('chuc_vu_hien_tai') ? ' is-invalid' : '' }}" placeholder="{{ __('Ghi rõ chức vụ hiện tại') }}" value="" autofocus>

                                    @if ($errors->has('chuc_vu_hien_tai'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('chuc_vu_hien_tai') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('chuc_vu_cao_nhat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-chuc_vu_cao_nhat">{{ __('Chúc vụ Đoàn – Hội cao nhất đã từng đảm nhiệm') }}</label>
                                    <input type="text" name="chuc_vu_cao_nhat" id="input-chuc_vu_cao_nhat" class="form-control form-control-alternative{{ $errors->has('chuc_vu_cao_nhat') ? ' is-invalid' : '' }}" placeholder="{{ __('Ghi rõ chức vụ') }}" value="" autofocus>

                                    @if ($errors->has('chuc_vu_cao_nhat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('chuc_vu_cao_nhat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Lưu') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
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
                                    <label class="form-control-label" for="input-current-password">{{ __('Mật khẩu hiện tại') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Mật khẩu hiện tại') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Mật khẩu mới') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Mật khẩu mới') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Nhập lại mật khẩu mới') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Nhập lại mật khẩu mới') }}" value="" required>
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
