<!doctype html>
<html class="h-100">
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center h-100">
<div class="card shadow rounded ">
    <div class="card-body" style="width: 350px;">
        @if (count($errors) >0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger"> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (session('status'))
            <ul>
                <li class="text-danger"> {{ session('status') }}</li>
            </ul>
        @endif
            <h6 class="text-muted text-center">Đăng nhập</h6>
        <form action="{{ route('getLogin') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group">
                    <input type="email" name="email" class="form-control " placeholder="Email ..." value="" required="" autofocus="" autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" name="password" class="form-control " placeholder="Mật khẩu ..." class="form-control "  required="" autofocus="">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Ghi nhớ
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
