<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', serif;
            padding: 0;
            font-size: 12pt;
            height: 100%;
            margin: 0 auto;
            background: rgb(204,204,204);
        }

        td {
            padding-left: 7px;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 210mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

        }

        .sub-page {
            max-width: 21cm;
            margin: 0;
            padding: 2cm 2cm 2cm 3cm;
        }

        @media print {

            @page {
               size: auto;
                /*margin: 0;*/
                margin: 2cm 1.8cm 2cm 3.0cm;
            }

            @page {
                @bottom-left {
                    content: counter(page) ' of ' counter(pages);
                }
            }

            .sub-page {
                max-width: 16cm !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            html, body {
                width: 210mm;
                height: 297mm;
                margin: 0;
                background-color: #fff;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: 21cm;
                height: 29.7cm;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            #print {
                display: none;
            }

            .tieu-chi {
                font-weight: bold;
                important: initial;
            }
        }
    </style>
</head>
<body class="{{ $class ?? '' }} text-dark m-0">
@auth()
    <div class="row">
        <div class="col text-center">
            <button type="button" class="btn btn-primary" onclick="window.print()" id="print">In báo cáo</button>
        </div>
    </div>
    <div class="main-page">
        <div class="sub-page ">
            <div id="header">
                <div class="row">
                    <div class="col-12 text-center">
                    <span>
                        <b>PHIẾU THẨM ĐỊNH “{{ isset($danhhieu_doituong) ? mb_strtoupper($danhhieu_doituong->name) : "" }}”<br></b>
                    </span>
                        <span>
                        <b>Họ tên: {{ $user->name ?? "" }}</b><br>
                        <b>Đơn vị: {{ $name_unit ?? "" }}</b><br>
                        <b>Cán bộ thẩm định: {{ $user_danhhieu_doituong->name ?? "Không có" }}
                        </b>
                    </span>
                    </div>
                </div>
            </div>
            <br>
            <div id="content">
                <table border="1">
                    <tbody>
                    <tr>
                        <td width="3%"><strong>TT</strong></td>
                        <td width="40%"><strong>NỘI DUNG</strong></td>
                        <td width="30%"><strong>ĐÁNH GIÁ</strong></td>
                        <td><strong>NHẬN XÉT</strong></td>
                    </tr>
                    @isset($tieuchis)
                        @for ($i = 0; $i < count($tieuchis); $i++)
                            <tr>
                                <td colspan="5"><strong>{{$i + 1}}. {{ mb_strtoupper($tieuchis[$i]->name) }}</strong></td>
                            </tr>
                            @if (count($tieuchis[$i]->tieuchuans) <= 0)
                                @php
                                    $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                    $noidungs = $TieuchuanController->getNoiDung($tieuchis[$i]->id, NULL);
                                @endphp
                                @if (count($noidungs) > 0)
                                    @for ($l = 0; $l < count($noidungs); $l++)
                                        <tr>
                                            @php
                                                $reply = DB::table('replies')->where('id_noidung', '=', $noidungs[$l]->id)->where('id_users', '=', $user->id)->first();
                                            @endphp
                                            <td>{{$l + 1}}</td>
                                            <td>{{$noidungs[$l]->content}}</td>
                                            <td>{{ $reply->evaluate ?? "" }}</td>
                                            <td>{{ $reply->comment ?? "" }}</td>
                                        </tr>
                                    @endfor
                                @endif
                            @endif
                            @for ($j = 0; $j < count($tieuchis[$i]->tieuchuans); $j++)
                                @php
                                    $alphabet = range('A', 'Z');
                                @endphp
                                <tr>
                                    <td colspan="5"><strong>{{$alphabet[$j]}}. {{ mb_strtoupper($tieuchis[$i]->tieuchuans[$j]->name) }}</strong></td>
                                </tr>
                                @php
                                    $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                    $noidungs = $TieuchuanController->getNoidung($tieuchis[$i]->id, $tieuchis[$i]->tieuchuans[$j]->id);
                                @endphp
                                @if (count($noidungs) > 0)
                                    @for ($k = 0; $k < count($noidungs); $k++)
                                        <tr>
                                            @php
                                                $reply = DB::table('replies')->where('id_noidung', '=', $noidungs[$k]->id)->where('id_users', '=', $user->id)->first();
                                            @endphp
                                            <td>{{$k + 1}}</td>
                                            <td>{{$noidungs[$k]->content}}</td>
                                            <td>{{ $reply->evaluate ?? "" }}</td>
                                            <td>{{ $reply->comment ?? "" }}</td>
                                        </tr>
                                    @endfor
                                @endif
                            @endfor
                        @endfor
                    @endisset
                    <tr>
                        <td></td>
                        <td><strong>Xếp loại</strong></td>
                        <td colspan="2">{{ $user_danhhieu_doituong->rank ?? "" }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><strong>Ghi chú hồ sơ</strong></td>
                        <td colspan="2">{{ $user_danhhieu_doituong->comment ?? "" }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td ><strong>Ghi chú điểm đặc biệt</strong></td>
                        <td colspan="2">{{ $user_danhhieu_doituong->comment_special ?? "" }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endauth

<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
{{--<script src="{{ asset('js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('js/scripts.js') }}"></script>--}}

@stack('js')

<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body>
</html>
