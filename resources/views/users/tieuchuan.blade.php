@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Xin chào') . ' '. auth()->user()->name,
        'description' => __('Đây là trang thông tin cơ bản, bạn có thể xem và chỉnh sửa thông tin của mình ở đây.'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="col order-xl-2" id="alerts">
                </div>
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#" onclick="ChangeAvarta();" id="uploaded_image">
                                    @if (isset(auth()->user()->url_image))
                                        <img src="{{ asset('argon') }}/img/theme/default.jpg" alt="icon"
                                             class="rounded-circle">
                                    @else
                                        <img src="{{ asset('argon') }}/img/theme/default.jpg" alt="icon"
                                             class="rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
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
                                    <input type="email" name="email" id="input-email" class="form-control"
                                           value="{{ old('email', auth()->user()->email) }}" readonly>
                                </div>
                                <div class="form-group{{ $errors->has('sdt') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-sdt">{{ __('Điện thoại liên hệ') }}</label>
                                    <input type="number" name="sdt" id="input-sdt"
                                           class="form-control form-control-alternative{{ $errors->has('sdt') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Số điện thoại') }}" value="" autofocus>

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
                                        <input type="text" name="birthDay" id="input-birthDay"
                                               class="form-control datepicker{{ $errors->has('birthDay') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
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
                                        <input type="radio" name="gender" id="radio-male" class="custom-control-input"
                                               checked="">
                                        <label class="custom-control-label" for="radio-male">{{ __('Nam') }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" id="radio-female"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="radio-female">{{ __('Nữ') }}</label>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dan_toc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}</label>
                                    <select class="form-control m-b" name="dan_toc" id="input_dan_toc"
                                            placeholder="{{ __('Chọn')}}">
                                        {!! $nations !!}
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('dia_chi_thuong_tru') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_dia_chi_thuong_tru">{{ __('Địa chỉ thường trú') }}</label>
                                    <input type="text" name="dia_chi_thuong_tru" id="input_dia_chi_thuong_tru"
                                           class="form-control" value="">
                                </div>
                                <div class="form-group{{ $errors->has('dia_chi_lien_lac') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_dia_chi_lien_lac">{{ __('Địa chỉ liên lạc') }}</label>
                                    <input type="text" name="dia_chi_lien_lac" id="input_dia_chi_lien_lac"
                                           class="form-control" value="">
                                </div>
                                <div class="form-group{{ $errors->has('ngay_vao_doan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_doan">{{ __('Ngày kết nạp Đoàn') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_doan" id="input_ngay_vao_doan"
                                               class="form-control datepicker{{ $errors->has('ngay_vao_doan') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_doan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_doan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('ngay_vao_dang_du_bi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_dang_du_bi">{{ __('Ngày kết nạp Đảng (dự bị)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_dang_du_bi" id="input_ngay_vao_dang_du_bi"
                                               class="form-control datepicker{{ $errors->has('ngay_vao_dang_du_bi') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_dang_du_bi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_dang_du_bi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div
                                    class="form-group{{ $errors->has('ngay_vao_dang_chinh_thuc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input_ngay_vao_dang_chinh_thuc">{{ __('Ngày kết nạp Đảng (chính thức)') }}</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" name="ngay_vao_dang_chinh_thuc"
                                               id="input_ngay_vao_dang_chinh_thuc"
                                               class="form-control datepicker{{ $errors->has('ngay_vao_dang_chinh_thuc') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Chọn ngày') }}" value="" autofocus>
                                    </div>
                                    @if ($errors->has('ngay_vao_dang_chinh_thuc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ngay_vao_dang_chinh_thuc') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('chuc_vu_hien_tai') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-chuc_vu_hien_tai">{{ __('Chức vụ Đoàn – Hội hiện tại') }}</label>
                                    <input type="text" name="chuc_vu_hien_tai" id="input-chuc_vu_hien_tai"
                                           class="form-control form-control-alternative{{ $errors->has('chuc_vu_hien_tai') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Ghi rõ chức vụ hiện tại') }}" value="" autofocus>

                                    @if ($errors->has('chuc_vu_hien_tai'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('chuc_vu_hien_tai') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('chuc_vu_cao_nhat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-chuc_vu_cao_nhat">{{ __('Chúc vụ Đoàn – Hội cao nhất đã từng đảm nhiệm') }}</label>
                                    <input type="text" name="chuc_vu_cao_nhat" id="input-chuc_vu_cao_nhat"
                                           class="form-control form-control-alternative{{ $errors->has('chuc_vu_cao_nhat') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Ghi rõ chức vụ') }}" value="" autofocus>

                                    @if ($errors->has('chuc_vu_cao_nhat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('chuc_vu_cao_nhat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('id_unit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="unitSelected">{{ __('Khoa') }}</label>
                                    <select class="custom-select" id="unitSelected" name="id_unit" required>
                                        <option value="">{{ __('Chọn khoa') }}</option>
                                    </select>
                                    @if ($errors->has('id_unit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="yearSelected">{{ __('Năm') }}</label>
                                    <select class="custom-select" id="yearSelected" name="year" required>
                                        <option value="">{{ __('Chọn năm') }}</option>
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
        </div>
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
                            <div class="col-md-8 text-center">
                                <div id="image_demo" style="width:350px; margin-top:30px"></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
        </div>
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

        $(document).ready(function () {
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle' //circle
                },
                boundary: {
                    width: 300,
                    height: 300
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
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (response) {
                    var fd = new FormData();
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
                                $('#uploaded_image').html(data.image);
                            } else {
                                const alert = "<div class='alert alert-danger alert-dismissible fade show mb-6' role='alert'>" +
                                    // "<span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>" +
                                    "<span class='alert-inner--text'><strong>Lỗi! </strong>" + data.msg + "</span>" +
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                                $('#alerts').html(alert);
                            }
                        }
                    });
                })
            });
        });
    </script>
@endsection
