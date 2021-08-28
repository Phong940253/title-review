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
                            {{ __('Chọn đề cử') }}
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('id_danhieu') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="titleSelected">{{ __('Danh hiệu') }}</label>
                                    </div>
                                    <select class="custom-select" id="titleSelected" name="id_unit" required>
                                        <option selected>{{ __('Chọn danh hiệu') }}</option>
{{--                                        {{$units = DB::table('unit')->select('name', 'id')->get()}}--}}
{{--                                        @foreach ($units as $unit)--}}
{{--                                            <option value="{{$unit->id}}">{{$unit->name}}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                @if ($errors->has('id_danhhieu'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_danhhieu') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('id_doituong') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="objectSelected">{{ __('Đối tượng') }}</label>
                                    </div>
                                    <select class="custom-select" id="objectSelected" name="id_doituong" required>
                                        <option selected>{{ __('Chọn đối tượng') }}</option>
                                    </select>
                                </div>
                                @if ($errors->has('id_doituong'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_doituong') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('id_donvi') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="unitSelected">{{ __('Đơn vị') }}</label>
                                    </div>
                                    <select class="custom-select" id="unitSelected" name="id_donvi" required>
                                        <option selected>{{ __('Chọn đơn vị') }}</option>
                                    </select>
                                </div>
                                @if ($errors->has('id_donvi'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_donvi') }}</strong>
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
