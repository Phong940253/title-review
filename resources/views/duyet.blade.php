<div class="container-fluid">

    <div class="accordion" id="accordionScroll">
        <div class="row">
            @can('duyệt - xem đề cử')
                @php
                    $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                @endphp
                <div class="col-xl-12 mb-3">
                    <div class="card card-profile shadow">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a id="uploaded_image">
                                            <img alt="Avatar" id="Avatar" class="rounded-circle" width="180" height="180" src="{{ asset(isset($user->url_image) ? $user->url_image : 'argon/img/theme/default.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div class="text-center">
                                            <h3>
                                                {{ $user->name }}<span class="font-weight-light"></span>
                                            </h3>
                                            <div>
                                                <i class="ni education_hat mr-2"></i>{!! $unit !!}
                                            </div>
                                            <input type="hidden" name="id_users" value="{{$user->id}}">
                                            <input type="hidden" name="id_danhhieu_doituong" value="{{$id_danhhieu_doituong}}">
                                            <div class="mt-2">
                                                Xét duyệt:
                                                <label class="custom-toggle mb--1">
                                                    <input name="confirmed" class="pl-2" type="checkbox" {{ $xet_duyet->confirmed ? ' checked' : "" }}>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mb-3">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0"  id="heading0" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                            <div class="row align-items-center">
                                <h3 class="mb-0 ml-3">{{ __('Thông tin chung') }}</h3>
                            </div>
                        </div>
                        <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordionScroll">
                            <div class="card-body">

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
                                        <input type="text" id="input-ms"
                                               class="form-control form-control-alternative{{ $errors->has('ms') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Mã cán bộ / Sinh viên / Học sinh') }}"
                                               value="{{ old('ms', $user->ms) }}" autofocus readonly>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Họ và tên') }}</label>
                                        <input type="text" id="input-name"
                                               class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Name') }}"
                                               value="{{ old('name', $user->name) }}" autofocus readonly>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               value="{{ old('email', $user->email) }}" readonly>
                                    </div>
                                    <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input-sdt">{{ __('Điện thoại liên hệ') }}</label>
                                        <input type="number" id="input-sdt"
                                               class="form-control form-control-alternative{{ $errors->has('sdt') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Số điện thoại') }}" value="{{ old('telephone', $user->telephone) }}" autofocus readonly>
                                    </div>
                                    <div class="form-group{{ $errors->has('birthDay') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-birthDay">{{ __('Ngày sinh') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input-birthDay" data-date-format="yyyy-mm-dd"
                                                   class="form-control form-control-alternative datepicker{{ $errors->has('birthDay') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('birthDay', $user->birthDay) }}" autofocus readonly>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
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

                                    <div class="form-group{{ $errors->has('nation') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}</label>
                                        <select class="form-control form-control-alternative m-b" id="input_dan_toc"
                                                placeholder="{{ __('Chọn')}}" readonly>
                                            @isset($nation)
                                                {!! $nation !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_religion') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input_religion">{{ __('Tôn giáo') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_religion" readonly>
                                            @isset($religion)
                                                {!! $religion !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_province') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input_province">{{ __('Địa chỉ thường trú') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_province" readonly>
                                            @isset($city)
                                                {!! $city !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_district') ? ' has-danger' : '' }}">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_district" readonly>
                                            @isset($district)
                                                {!! $district !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_ward') ? ' has-danger' : '' }}">
                                        <select class="form-control form-control-alternative m-b" id="input_ward" readonly>
                                            @isset($ward)
                                                {!! $ward !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                        <input type="text" id="input-street"
                                               class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Nhập số nhà, tên đường') }}" value="{{ old('street', $user->street) }}"
                                               autofocus readonly>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_current_province') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input_current_province">{{ __('Địa chỉ hiện tại') }}</label>
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_province" readonly>
                                            @isset($current_city)
                                                {!! $current_city !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_current_district') ? ' has-danger' : '' }}">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_district" readonly>
                                            @isset($current_district)
                                                {!! $current_district !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_current_ward') ? ' has-danger' : '' }}">
                                        <select class="form-control form-control-alternative m-b"
                                                id="input_current_ward" readonly>
                                            @isset($current_ward)
                                                {!! $current_ward !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('current_street') ? ' has-danger' : '' }}">
                                        <input type="text" id="input-current-street"
                                               class="form-control form-control-alternative{{ $errors->has('current_street') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Nhập số nhà, tên đường') }}"
                                               value="{{ old('current_street', $user->current_street) }}" autofocus readonly>
                                    </div>

                                    <div class="form-group{{ $errors->has('date_admission_doan') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_doan">{{ __('Ngày kết nạp Đoàn') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input_ngay_vao_doan" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker{{ $errors->has('date_admission_doan') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_doan', $user->date_admission_doan) }}" autofocus readonly>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('date_admission_dang_reserve') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_dang_du_bi">{{ __('Ngày kết nạp Đảng (dự bị)') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text" id="input_ngay_vao_dang_du_bi" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker{{ $errors->has('date_admission_dang_reserve') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_reserve', $user->date_admission_dang_reserve) }}" autofocus readonly>
                                        </div>
                                    </div>

                                    <div
                                        class="form-group{{ $errors->has('date_admission_dang_official') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input_ngay_vao_dang_chinh_thuc">{{ __('Ngày kết nạp Đảng (chính thức)') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input type="text"
                                                   id="input_ngay_vao_dang_chinh_thuc" data-date-format="yyyy-mm-dd"
                                                   class="form-control datepicker{{ $errors->has('date_admission_dang_official') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Chọn ngày') }}" value="{{ old('date_admission_dang_official', $user->date_admission_dang_official) }}" autofocus readonly>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('current_position') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input-chuc_vu_hien_tai">{{ __('Chức vụ Đoàn – Hội hiện tại') }}</label>
                                        <input type="text" id="input-chuc_vu_hien_tai"
                                               class="form-control form-control-alternative{{ $errors->has('current_position') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Ghi rõ chức vụ hiện tại') }}" value="{{ old('current_position', $user->current_position) }}" autofocus readonly>
                                    </div>

                                    <div class="form-group{{ $errors->has('highest_position') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                               for="input-chuc_vu_cao_nhat">{{ __('Chúc vụ Đoàn – Hội cao nhất đã từng đảm nhiệm') }}</label>
                                        <input type="text" id="input-chuc_vu_cao_nhat"
                                               class="form-control form-control-alternative{{ $errors->has('highest_position') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('Ghi rõ chức vụ') }}" value="{{ old('highest_position', $user->highest_position) }}" autofocus readonly>
                                    </div>

                                    <div class="form-group{{ $errors->has('id_unit') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="unitSelected">{{ __('Khoa') }}</label>
                                        <select class="form-control form-control-alternative m-b" id="unitSelected" readonly>
                                            @isset($unit)
                                                {!! $unit !!}
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
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
                    $allNoiDung = collect([]);
                @endphp
                @isset($tieuchis)
                    @foreach($tieuchis as $tieuchi)
                        @if (count($tieuchi->tieuchuans) <= 0)
                            <div class="col-xl-12 mb-3">
                                <div class="card bg-white shadow">
                                    <div class="card-header bg-white border-0"  id="heading{{$tieuchi->id}}" data-toggle="collapse" data-target="#collapse{{$tieuchi->id}}" aria-expanded="false" aria-controls="collapse{{$tieuchi->id}}">
                                        <div class="row align-items-center">
                                            <h3 class="mb-0 ml-3">{{ $tieuchi->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($tieuchi->tieuchuans as $tieuchuan)
                            <div class="col-xl-12 mb-3">
                                <div class="card bg-white shadow">
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
                                                        <div class="form-group">
                                                            <label for="FormControlTextarea{{$noidung->id}}">{!! $noidung->content !!}</label>
                                                            <textarea class="form-control" id="FormControlTextarea{{$noidung->id}}" rows="7"
                                                                      placeholder="Điền vào đây ..." readonly>{{ is_null($reply = $replies->firstWhere('id_noidung', '=', $noidung->id)) ? "" : $reply->reply}}</textarea>
                                                        </div>
                                                        <label>Minh chứng</label>
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
                                                                                <h4 class="mb-1" data-dz-name="">Ảnh chụp màn
                                                                                    hình (6).png</h4>
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
                                                        <hr class="mt-3 mb-4"/>
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
            @endcan
        </div>
    </div>
</div>
@can('duyệt - xem đề cử')
<script type="text/javascript">
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
                                var extension = mockFile.name.split('.')[1];
                                if (extension === "png" || extension === "jpg") {
                                    this.options.thumbnail.call(this, mockFile, "{{ asset($minhchung->url) }}");
                                } else if (extension === "doc" || extension === "docx") {
                                    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/word.png") }}");
                                } else if (extension === "xls" || extension === "xlsx") {
                                    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/excel.png") }}");
                                } else {
                                    this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/pdf.png") }}");
                                }
                            }
                        @endforeach
                    @endisset

                    this.options.maxFiles = this.options.maxFiles - numMinhChung;
                }
            };
            $(value).dropzone(option);
        });
    };
</script>
@endcan
