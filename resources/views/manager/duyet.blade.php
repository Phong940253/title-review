@can('duyệt - xem đề cử')
<div class="container-fluid">
    <div class="accordion" id="accordionScroll">
        <div class="row">
                <div class="col-xl-12 mb-3">
                    <div class="card card-profile shadow mb-0">
                        <div class="card-header text-center border-0 pt-5 pt-4 pb-0 pb-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a id="uploaded_image">
                                            <img alt="Avatar" id="Avatar" width="140" height="140" class="rounded-circle" src="{{ $user->url_image ?? 'argon/img/theme/default.jpg' }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-3">
                                        <div class="text-center">
                                            <h3>
                                                {{ $user->name }}<span class="font-weight-light"></span>
                                            </h3>
                                            <div>
                                                {!! $unit !!}
                                            </div>
                                            <input type="hidden" name="id_users" value="{{$user->id}}">
                                            <input type="hidden" name="id_danhhieu_doituong" value="{{$id_danhhieu_doituong}}">
                                            <div class="mt-2">
                                                Xét duyệt:
                                                @role('khoa')
                                                    <label class="custom-toggle mb--1">
                                                        <input name="confirmed" class="pl-2" type="checkbox" {{ $xet_duyet->confirmed ? ' checked' : "" }}>
                                                        <span class="custom-toggle-slider rounded-circle"></span>
                                                    </label>
                                                @endrole
                                                @role('truong')
                                                    <div class="custom-toggle mb--1">
                                                        <input class="pl-2" type="checkbox" {{ $xet_duyet->confirmed ? ' checked' : "" }}>
                                                        <span class="custom-toggle-slider rounded-circle"></span>
                                                    </div>
                                                @endrole
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mb-3">
                    <div class="card bg-secondary shadow mb-0">
                        <div class="card-header bg-white border-0"  id="heading0" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                            <div class="row align-items-center">
                                <h3 class="mb-0 ml-3">{{ __('Thông tin chung') }}</h3>
                            </div>
                        </div>
                        <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordionScroll">
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">{{ __('Người dùng') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">{{ __('Mã cán bộ / Sinh viên / Học sinh') }}</label>
                                        <input type="text" id="input-ms"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Mã cán bộ / Sinh viên / Học sinh') }}"
                                               value="{{ old('ms', $user->ms) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">{{ __('Họ và tên') }}</label>
                                        <input type="text" id="input-name"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Name') }}"
                                               value="{{ old('name', $user->name) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" id="input-email" class="form-control form-control-alternative"
                                               value="{{ old('email', $user->email) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input-sdt">{{ __('Điện thoại liên hệ') }}</label>
                                        <input type="number" id="input-sdt"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Số điện thoại') }}" value="{{ old('telephone', $user->telephone) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-birthDay">{{ __('Ngày sinh') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input-birthDay" data-date-format="yyyy-mm-dd"
                                                   class="form-control form-control-alternative datepicker"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('birthDay', $user->birthDay) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label mr-3"
                                               for="ratio-gender">{{ __('Giới tính') }}</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radio-male" class="custom-control-input" {{ is_null(old('gender')) ? (!$user->gender ? "checked" : "") : (!old('gender') ? "checked" : "")}} value="0" readonly>
                                            <label class="custom-control-label" for="radio-male">{{ __('Nam') }}</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radio-female" class="custom-control-input" {{ is_null(old('gender')) ? ($user->gender ? "checked" : "") : (old('gender') ? "checked" : "")}} value="1" readonly>
                                            <label class="custom-control-label" for="radio-female">{{ __('Nữ') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}</label>
                                        <select class="form-control form-control-alternative m-b" id="input_dan_toc"
                                                placeholder="{{ __('Chọn')}}" readonly>
                                            @isset($nation)
                                                {!! $nation !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="input_religion">{{ __('Tôn giáo') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_religion" readonly>
                                            @isset($religion)
                                                {!! $religion !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="input_province">{{ __('Địa chỉ thường trú') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_province" readonly>
                                            @isset($city)
                                                {!! $city !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_district" readonly>
                                            @isset($district)
                                                {!! $district !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control form-control-alternative m-b" id="input_ward" readonly>
                                            @isset($ward)
                                                {!! $ward !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" id="input-street"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Nhập số nhà, tên đường') }}" value="{{ old('street', $user->street) }}"
                                               readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input_current_province">{{ __('Địa chỉ hiện tại') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_province" readonly>
                                            @isset($current_city)
                                                {!! $current_city !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_district" readonly>
                                            @isset($current_district)
                                                {!! $current_district !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_ward" readonly>
                                            @isset($current_ward)
                                                {!! $current_ward !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" id="input-current-street"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Nhập số nhà, tên đường') }}"
                                               value="{{ old('current_street', $user->current_street) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_doan">{{ __('Ngày kết nạp Đoàn') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input_ngay_vao_doan" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_doan', $user->date_admission_doan) }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_dang_du_bi">{{ __('Ngày kết nạp Đảng (dự bị)') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input_ngay_vao_dang_du_bi" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_reserve', $user->date_admission_dang_reserve) }}" readonly>
                                        </div>
                                    </div>

                                    <div
                                        class="form-group">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_dang_chinh_thuc">{{ __('Ngày kết nạp Đảng (chính thức)') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text"
                                                   id="input_ngay_vao_dang_chinh_thuc" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_official', $user->date_admission_dang_official) }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input-chuc_vu_hien_tai">{{ __('Chức vụ Đoàn – Hội hiện tại') }}</label>
                                        <input type="text" id="input-chuc_vu_hien_tai"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Ghi rõ chức vụ hiện tại') }}" value="{{ old('current_position', $user->current_position) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="input-chuc_vu_cao_nhat">{{ __('Chúc vụ Đoàn – Hội cao nhất đã từng đảm nhiệm') }}</label>
                                        <input type="text" id="input-chuc_vu_cao_nhat"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('Ghi rõ chức vụ') }}" value="{{ old('highest_position', $user->highest_position) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="unitSelected">{{ __('Khoa') }}</label>
                                        <select class="form-control form-control-alternative m-b" id="unitSelected" readonly>
                                            @isset($unit)
                                                {!! $unit !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="yearSelected">{{ __('Năm') }}</label>
                                        <select class="form-control form-control-alternative m-b" id="yearSelected" readonly>
                                            @isset($year)
                                                {!! $year !!}
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                    $allNoiDung = collect([]);
                @endphp
                @isset($tieuchis)
                    @foreach($tieuchis as $tieuchi)
                        @if (count($tieuchi->tieuchuans) <= 0)
                            <div class="col-xl-12 mb-3">
                                <div class="card bg-white shadow mb-0">
                                    <div class="card-header bg-white border-0"  id="heading{{$tieuchi->id}}" data-toggle="collapse" data-target="#collapse{{$tieuchi->id}}" aria-expanded="false" aria-controls="collapse{{$tieuchi->id}}">
                                        <div class="row align-items-center">
                                            <h3 class="mb-0 ml-3">{{ $tieuchi->name }}</h3>
                                        </div>
                                    </div>

                                    <div id="collapse{{ $tieuchi->id }}" class="collapse" aria-labelledby="heading{{$tieuchi->id}}">
                                        <div class="card-body">
                                            <div class="pl-lg-4">
                                                @php
                                                    $noidungs = $TieuchuanController->getNoidung($tieuchi->id, NULL);
                                                    $allNoiDung = $allNoiDung->concat($noidungs);
                                                    $replies = isset($noidungs) ? $TieuchuanController->getReplies($noidungs->pluck('id'), $user->id) : "";
                                                @endphp
                                                @if (count($noidungs) > 0)
                                                    @foreach ($noidungs as $noidung)
                                                        <form action="{{route('send-comment')}}" method="post" enctype="multipart/form-data" id="submitForm{{$noidung->id}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="FormControlTextarea{{$noidung->id}}">{!! $noidung->content !!}</label>
                                                                <textarea class="form-control" id="FormControlTextarea{{$noidung->id}}" rows="7"
                                                                          placeholder="Điền vào đây ..." readonly>{{ is_null($reply = $replies->firstWhere('id_noidung', '=', $noidung->id)) ? "" : $reply->reply}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="dropzone-multiple-component">Minh chứng</label>
                                                                <div id="dropzone-multiple-component"
                                                                     class="tab-pane tab-example-result fade active show"
                                                                     role="tabpanel"
                                                                     aria-labelledby="dropzone-multiple-component-tab">
                                                                    <div class="dropzone dropzone-multiple dz-clickable"
                                                                         data-toggle="dropzone" data-dropzone-multiple id="dropzone"
                                                                         value="{{$noidung->id}}">
                                                                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                                        </ul>
                                                                        <ul class="dz-preview dz-preview-multiple d-none list-group list-group-lg list-group-flush"
                                                                            id="preview">
                                                                            <li class="list-group-item px-0 dz-processing dz-image-preview">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-auto">
                                                                                        <img class="avatar img rounded" alt="Ảnh"
                                                                                             data-dz-thumbnail>
                                                                                    </div>
                                                                                    <div class="col ml--3">
                                                                                        <a class="custom-download" href="" target="_blank">
                                                                                            <h4 class="mb-1" data-dz-name="">Ảnh chụp màn
                                                                                                hình (6).png</h4></a>
                                                                                        <p class="small text-muted mb-0"
                                                                                           data-dz-size=""><strong>0.5</strong> MB</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="dz-default dz-message d-none">
                                                                            <span>Kéo thả hoặc chọn file minh chứng để tải lên (Tối đa 10 file, mỗi file tối đa 2MB)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @role('truong')
                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                       for="comment">{{ __('Nhận xét') }}</label>
                                                                <textarea class="form-control" id="comment" rows="2" name="comment"
                                                                          placeholder="Điền vào đây ..." autofocus>{{ isset($reply) ? $reply->comment : "" }}</textarea>
                                                                @if ($errors->has('comment'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('comment') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="evaluateSelected">{{ __('Đánh giá') }}</label>
                                                                <select class="form-control form-control-alternative m-b" id="evaluateSelected" name="evaluate" autofocus>
                                                                    <option disabled selected>{{ __('Chọn đánh giá') }}</option>
                                                                    <option value='Đạt' {{ (old('evaluate') == 'Đạt' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == "Đạt") ? "selected" : ""))}}>Đạt</option>
                                                                    <option value='Minh chứng chưa có độ tin cậy' {{ (old('evaluate') == 'Minh chứng chưa có độ tin cậy' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Minh chứng chưa có độ tin cậy') ? "selected" : ""))}}>Minh chứng chưa có độ tin cậy</option>
                                                                    <option value='Minh chứng không phù hợp' {{  (old('evaluate') == 'Minh chứng không phù hợp' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Minh chứng không phù hợp') ? "selected" : "")) }}>Minh chứng không phù hợp</option>
                                                                    <option value='Không có minh chứng' {{  (old('evaluate') == 'Không có minh chứng' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Không có minh chứng') ? "selected" : "")) }}>Không có minh chứng</option>
                                                                    <option value='Không đủ tiêu chuẩn theo quy chế' {{  (old('evaluate') == 'Không đủ tiêu chuẩn theo quy chế' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Không đủ tiêu chuẩn theo quy chế') ? "selected" : "")) }}>Không đủ tiêu chuẩn theo quy chế</option>

                                                                </select>
                                                                @if ($errors->has('evaluate'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('evaluate') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="id_noidung" value="{{ $noidung->id }}"/>
                                                            <input type="hidden" name="id_users" value="{{ $user->id }}"/>
                                                            @endrole
                                                            <hr class="mt-3 mb-4"/>
                                                        </form>
                                                    @endforeach
                                                @else
                                                    <div class="form-group">
                                                        <label for="FormControlTextarea{{$noidung->id}}">{{ __('Không có nội dung') }}</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($tieuchi->tieuchuans as $tieuchuan)
                            <div class="col-xl-12 mb-3">
                                <div class="card bg-white shadow mb-0">
                                    <div class="card-header bg-white border-0"  id="heading{{$tieuchi->id * 10000 . $tieuchuan->id}}" data-toggle="collapse" data-target="#collapse{{$tieuchi->id * 10000 . $tieuchuan->id}}" aria-expanded="false" aria-controls="collapse{{$tieuchi->id * 10000 . $tieuchuan->id}}">
                                        <div class="row align-items-center">
                                            <h3 class="mb-0 ml-3">{{ $tieuchi->name . " - " . $tieuchuan->name }}</h3>
                                        </div>
                                    </div>
                                    <div id="collapse{{ $tieuchi->id * 10000 . $tieuchuan->id }}" class="collapse" aria-labelledby="heading{{$tieuchi->id * 10000 . $tieuchuan->id}}">
                                        <div class="card-body">
                                            <div class="pl-lg-4">
                                                @php
                                                    $noidungs = $TieuchuanController->getNoidung($tieuchi->id, $tieuchuan->id);
                                                    $allNoiDung = $allNoiDung->concat($noidungs);
                                                    $replies = isset($noidungs) ? $TieuchuanController->getReplies($noidungs->pluck('id'), $user->id) : "";
                                                @endphp
                                                @if (count($noidungs) > 0)
                                                    @foreach ($noidungs as $noidung)
                                                        <form action="{{route('send-comment')}}" method="post" enctype="multipart/form-data" id="submitForm{{$noidung->id}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="FormControlTextarea{{$noidung->id}}">{!! $noidung->content !!}</label>
                                                                <textarea class="form-control" id="FormControlTextarea{{$noidung->id}}" rows="7"
                                                                          placeholder="Điền vào đây ..." readonly>{{ is_null($reply = $replies->firstWhere('id_noidung', '=', $noidung->id)) ? "" : $reply->reply}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="dropzone-multiple-component">Minh chứng</label>
                                                                <div id="dropzone-multiple-component"
                                                                     class="tab-pane tab-example-result fade active show"
                                                                     role="tabpanel"
                                                                     aria-labelledby="dropzone-multiple-component-tab">
                                                                    <div class="dropzone dropzone-multiple dz-clickable"
                                                                         data-toggle="dropzone" data-dropzone-multiple id="dropzone"
                                                                         value="{{$noidung->id}}">
                                                                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                                        </ul>
                                                                        <ul class="dz-preview dz-preview-multiple d-none list-group list-group-lg list-group-flush"
                                                                            id="preview">
                                                                            <li class="list-group-item px-0 dz-processing dz-image-preview">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-auto">
                                                                                        <img class="avatar img rounded" alt="Ảnh"
                                                                                             data-dz-thumbnail>
                                                                                    </div>
                                                                                    <div class="col ml--3">
                                                                                        <a class="custom-download" href="" target="_blank">
                                                                                            <h4 class="mb-1" data-dz-name="">Ảnh chụp màn
                                                                                                hình (6).png</h4></a>
                                                                                        <p class="small text-muted mb-0"
                                                                                           data-dz-size=""><strong>0.5</strong> MB</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="dz-default dz-message d-none">
                                                                            <span>Kéo thả hoặc chọn file minh chứng để tải lên (Tối đa 10 file, mỗi file tối đa 2MB)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @role('truong')
                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                       for="comment">{{ __('Nhận xét') }}</label>
                                                                <textarea class="form-control" id="comment" rows="2" name="comment"
                                                                          placeholder="Điền vào đây ..." autofocus>{{ isset($reply) ? $reply->comment : "" }}</textarea>
                                                                @if ($errors->has('comment'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('comment') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="evaluateSelected">{{ __('Đánh giá') }}</label>
                                                                <select class="form-control form-control-alternative m-b" id="evaluateSelected" name="evaluate" autofocus>
                                                                    <option disabled selected>{{ __('Chọn đánh giá') }}</option>
                                                                    <option value='Đạt' {{ (old('evaluate') == 'Đạt' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == "Đạt") ? "selected" : ""))}}>Đạt</option>
                                                                    <option value='Minh chứng chưa có độ tin cậy' {{ (old('evaluate') == 'Minh chứng chưa có độ tin cậy' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Minh chứng chưa có độ tin cậy') ? "selected" : ""))}}>Minh chứng chưa có độ tin cậy</option>
                                                                    <option value='Minh chứng không phù hợp' {{  (old('evaluate') == 'Minh chứng không phù hợp' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Minh chứng không phù hợp') ? "selected" : "")) }}>Minh chứng không phù hợp</option>
                                                                    <option value='Không có minh chứng' {{  (old('evaluate') == 'Không có minh chứng' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Không có minh chứng') ? "selected" : "")) }}>Không có minh chứng</option>
                                                                    <option value='Không đủ tiêu chuẩn theo quy chế' {{  (old('evaluate') == 'Không đủ tiêu chuẩn theo quy chế' ? "selected" : (((isset($reply) ? $reply->evaluate : "") == 'Không đủ tiêu chuẩn theo quy chế') ? "selected" : "")) }}>Không đủ tiêu chuẩn theo quy chế</option>

                                                                </select>
                                                                @if ($errors->has('evaluate'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('evaluate') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="id_noidung" value="{{ $noidung->id }}"/>
                                                            <input type="hidden" name="id_users" value="{{ $user->id }}"/>
                                                            @endrole
                                                            <hr class="mt-3 mb-4"/>
                                                        </form>
                                                    @endforeach
                                                @else
                                                    <div class="form-group">
                                                        <label for="FormControlTextarea{{$noidung->id}}">{{ __('Không có nội dung') }}</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endisset
                @role('truong')
                <div class="col-xl-12 mb-3">
                    <div class="card bg-white shadow mb-0">
                        <div class="card-header bg-white border-0"  id="heading--1" data-toggle="collapse" data-target="#collapse--1" aria-expanded="false" aria-controls="collapse--1">
                            <div class="row align-items-center">
                                <h3 class="mb-0 ml-3">{{ __('Tổng kết hồ sơ') }}</h3>
                            </div>
                        </div>
                        <div id="collapse--1" class="collapse" aria-labelledby="heading--1">
                            <div class="card-body">
                                <div class="pl-lg-4">
                                    @php
                                    @endphp
                                    <div class="form-group">
                                        <form action="{{route('xep-loai')}}" method="post" enctype="multipart/form-data" id="submitForm-1">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                       for="rank">{{ __('Xếp loại') }}</label>
                                                <input type="text" class="form-control form-control-alternative" id="rank" name="rank"
                                                          placeholder="Điền vào đây ..." value="{{ isset($xet_duyet) ? $xet_duyet->rank : "" }}" autofocus/>
                                                @if ($errors->has('rank'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('rank') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                       for="comment-all">{{ __('Ghi chú hồ sơ') }}</label>
                                                <textarea class="form-control" id="comment-all" rows="3" name="comment"
                                                          placeholder="Điền vào đây ..." autofocus>{{ isset($xet_duyet) ? $xet_duyet->comment : "" }}</textarea>
                                                @if ($errors->has('comment'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('comment') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                       for="comment_special">{{ __('Ghi chú điểm đặc biệt') }}</label>
                                                <textarea class="form-control" id="comment_special" rows="3" name="comment_special"
                                                          placeholder="Điền vào đây ..." autofocus>{{ isset($xet_duyet) ? $xet_duyet->comment_special : "" }}</textarea>
                                                @if ($errors->has('comment_special'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('comment_special') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <input type="hidden" name="id_users" value="{{ $user->id }}"/>
                                            <input type="hidden" name="id_danhhieu_doituong" value="{{$id_danhhieu_doituong}}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
        </div>
    </div>
</div>
<script type="text/javascript">
    var uploadForm = () => {
        @role('truong')
            const listForm = {{ json_encode($allNoiDung->pluck('id')) }};
            listForm.map(u => {
                const selector = "#submitForm" + u;
                const form = $(selector);
                const posting = $.post(form.attr('action'), form.serialize());
                posting.done((data) => {
                    console.log(data.success);
                });
            });
            const last_posting = $("#submitForm-1");
            const posting_l = $.post(last_posting.attr('action'), last_posting.serialize());
            posting_l.done((data) => {
                if (data.success) {
                    table.ajax.reload( null, false );
                    toastr.options = optionTask;
                    toastr['success'](data.message);
                } else {
                    toastr.options = optionTask;
                    toastr['warning'](data.message);
                }
            })
        @endrole
    };

    var activeDropzone = () => {
        Dropzone.autoDiscover = false;
        const target = $('[data-toggle="dropzone"]');
        target.map((index, value) => {
            const container = $(value).find(".dz-preview");
            const template = $(value).find('#preview');
            const option = {
                paramName: "file",
                url: "/file-upload",
                previewsContainer: container.get(0),
                previewTemplate: template.html(),
                parallelUploads: 4,
                maxFilesize: 2,
                maxFiles: 10,
                acceptedFiles: ".pdf,.png,.jpg,.doc,.docx,.xls,.xlsx",
                uploadMultiple: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                params: {
                    'noi_dung': $(value).attr('value')
                },
                init: function() {
                    var numMinhChung = 0;
                    @php
                        $minhchungs = $TieuchuanController->getMinhChung($allNoiDung->pluck('id'), $user->id);
                    @endphp
                    @isset($minhchungs)
                        @foreach ($minhchungs as $minhchung)
                            if ($(value).attr('value') == {{ $minhchung->id_noidung }}) {
                                numMinhChung += 1;
                                var mockFile = {
                                    name: "{{$minhchung->original_name}}",
                                    size: {{$minhchung->size}},
                                    dataURL: "{{ asset($minhchung->url) }}"
                                };
                                this.options.addedfile.call(this, mockFile);
                                // var extension = mockFile.name.split('.')[1];
                                // if (extension === "png" || extension === "jpg") {
                                this.options.thumbnail.call(this, mockFile, "{{ asset($minhchung->url) }}");
                                {{--} else if (extension === "doc" || extension === "docx") {--}}
                                {{--    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/word.png") }}");--}}
                                {{--} else if (extension === "xls" || extension === "xlsx") {--}}
                                {{--    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/excel.png") }}");--}}
                                {{--} else {--}}
                                {{--    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/pdf.png") }}");--}}
                                // }
                            }
                        @endforeach
                    @endisset
                    this.options.maxFiles = this.options.maxFiles - numMinhChung;
                }
            };
            $(value).dropzone(option);
        });
        const image = $('.avatar.img.rounded');
        console.log(image);
        image.map((index, value) => {
            let src = value.src;
            let target = $(value);
            if (src != "") {
                let component = target.parent().parent()
                component.map((index, value) => {
                    let text = $(value).find('.custom-download')
                    text.attr("href", src);
                });
            }
        })
    };
</script>
@endcan
