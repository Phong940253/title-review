@extends('layouts.app', ['class' => 'bg-default'])

@section('menu')
@endsection

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            {{ __('Nhập đầy đủ thông tin') }}
                        </div>
                        <form role="form" method="POST" action="{{ route('select-title') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('sdt') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                       for="input-sdt">{{ __('Điện thoại liên hệ') }}<font color="red"> *</font></label>
                                <input type="number" name="sdt" id="input-sdt"
                                       class="form-control form-control-alternative{{ $errors->has('sdt') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Số điện thoại') }}" value="" autofocus>

                                @if ($errors->has('sdt'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sdt') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                <label class="form-control-label mr-3"
                                       for="ratio-gender">{{ __('Giới tính') }}<font color="red"> *</font></label>
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
                                <label class="form-control-label" for="input_dan_toc">{{ __('Dân tộc') }}<font
                                        color="red"> *</font></label>
                                <select class="form-control form-control-alternative m-b" name="dan_toc" id="input_dan_toc">
                                    @isset($nation)
                                        {!! $nation !!}
                                    @endisset
                                </select>

                                @if ($errors->has('dan_toc'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dan_toc') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input_religion">{{ __('Tôn giáo') }}<font
                                        color="red"> *</font></label>
                                <select class="form-control form-control-alternative m-b" name="religion" id="input_religion">
                                    @isset($nation)
                                        {!! $nation !!}
                                    @endisset
                                </select>

                                @if ($errors->has('religion'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('religion') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('province') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input_province">{{ __('Địa chỉ thường trú') }}<font
                                        color="red"> *</font></label>
                                <select class="form-control form-control-alternative m-b" name="province" id="input_province">
                                    @isset($city)
                                        {!! $city !!}
                                    @endisset
                                </select>

                                @if ($errors->has('province'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                <select class="form-control form-control-alternative m-b" name="district" id="input_district">
                                    <option value="">{{ __('Chọn huyện, quận, thị xã') }}</option>
                                </select>

                                @if ($errors->has('district'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('district') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('ward') ? ' has-danger' : '' }}">
                                <select class="form-control form-control-alternative m-b" name="ward" id="input_ward">
                                    <option value="">{{ __('Chọn xã, phường, thị trấn') }}</option>
                                </select>

                                @if ($errors->has('ward'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ward') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                <input type="text" name="street" id="input-street"
                                       class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Nhập số nhà, tên đường') }}" value="" autofocus>

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('current_province') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input_current_province">{{ __('Địa chỉ hiện tại') }}<font
                                        color="red"> *</font></label>
                                <select class="form-control form-control-alternative m-b" name="current_province" id="input_current_province">
                                    @isset($city)
                                        {!! $city !!}
                                    @endisset
                                </select>

                                @if ($errors->has('current_province'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_province') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('current_district') ? ' has-danger' : '' }}">
                                <select class="form-control form-control-alternative m-b" name="current_district" id="input_current_district">
                                    <option value="">{{ __('Chọn huyện, quận, thị xã') }}</option>
                                </select>

                                @if ($errors->has('current_district'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_district') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('current_ward') ? ' has-danger' : '' }}">
                                <select class="form-control form-control-alternative m-b" name="current_ward" id="input_current_ward">
                                    <option value="">{{ __('Chọn xã, phường, thị trấn') }}</option>
                                </select>

                                @if ($errors->has('current_ward'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_ward') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('current_street') ? ' has-danger' : '' }}">
                                <input type="text" name="current_street" id="input-current-street"
                                       class="form-control form-control-alternative{{ $errors->has('current_street') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Nhập số nhà, tên đường') }}" value="" autofocus>

                                @if ($errors->has('current_street'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('current_street') }}</strong>
                                        </span>
                                @endif
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Xác nhận') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
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
    </script>
@endsection
