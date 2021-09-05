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
                        <form role="form" method="POST" action="{{ route('select-title') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('id_title') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"
                                               for="titleSelected">{{ __('Danh hiệu') }}</label>
                                    </div>
                                    <select class="custom-select form-control form-control-alternative" id="titleSelected" name="id_title" required>
                                        <option value="">{{ __('Chọn danh hiệu') }}</option>
                                        @isset($titles)
                                            @foreach ($titles as $title)
                                                <option value="{{$title->id}}">{{$title->name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                @if ($errors->has('id_title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('id_object') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"
                                               for="objectSelected">{{ __('Đối tượng') }}</label>
                                    </div>
                                    <select class="custom-select form-control form-control-alternative" id="objectSelected" name="id_object" required>
                                        <option selected>{{ __('Chọn đối tượng') }}</option>
                                    </select>
                                </div>
                                @if ($errors->has('id_object'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('id_object') }}</strong>
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
        $("#titleSelected").change(function () {
            $.ajax({
                url: "{{ route('user.object.get_by_title') }}?id_title=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#objectSelected').html(data.html);
                }
            });
        });
    </script>
@endsection
