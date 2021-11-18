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

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 420mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

        }

        .sub-page {
            max-width: 40cm;
            margin: 0;
            padding: 2cm 2cm 2cm 3cm;
        }

        @media print {

            @page {
               size: auto;
                /*margin: 0;*/
                margin: 2cm 2cm 2cm 3cm;
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
                    <div class="col-5 text-center">
                        <span>Đơn vị: <br>{{ DB::table('unit')->find($user->id_unit)->name ?? "" }}</span>
                    </div>
                    <div class="col-7 text-center">
                        <i>TP. Hồ Chí Minh, ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</i>
                    </div>
                </div>
                <div class="row" style="padding-top: 15px">
                    <div class="col-12 text-center" style="margin-top: 15px;">
                        <span style="font-size: 16pt;"><b>BẢNG TỔNG HỢP</b></span><br>
                        <b>ĐỀ CỬ
                            "{{ isset($id_title) ? mb_strtoupper(DB::table('danhhieu')->find($id_title)->name) : "" }}"<br></b>
                        <b><i>(Dành
                                cho {{ isset($id_object) ? DB::table('doituong')->find($id_object)->name : "" }})</i></b>
                        <br>
                        <br>
                        <table border="1" width="100%">
                            <tbody>
                                <tr>
                                    <td width="3%"><strong>TT</strong></td>
                                    <td width="15%"><strong>Thông tin đề cử</strong></td>
                                    @foreach($tieuchis as $tieuchi)
                                        @foreach($tieuchi->tieuchuans as $tieuchuan)
                                            <td width="{{ 77 / $count_tieuchuan }}">{{ $tieuchi->name . " - " . $tieuchuan->name }}</td>
                                        @endforeach
                                        @isset($tieuchi->noidungs)
                                            <td width="{{ 77 / $count_tieuchuan }}"> {{ $tieuchi->name }}</td>
                                        @endisset
                                    @endforeach
                                </tr>
                                @isset($list_user)
                                    @foreach($list_user as $key=>$value)
                                        <tr>
                                            <td width="3%" class="align-top">{{ $key + 1}}</td>
                                            <td width="15%" class="text-left align-top">
                                                <div class="row">
                                                    <div class="col pl-4">
                                                        {{ __(' - Họ và tên: ') }}<b>{{ mb_strtoupper($value->name) ?? "không có"  }}</b>
                                                        <div> - Giới tính: {{ $value->gender ? "Nữ" : "Nam" }}</div>
                                                        <div> - Dân tộc: {{ $value->nation ? Setting("nation" . $value->nation) : "không có"}}</div>
                                                        <div> - Ngày sinh: {{ isset($value->birthDay) ? Illuminate\Support\Carbon::createFromFormat('Y-m-d', $value->birthDay)->format('d/m/Y') : "không có" }}</div>
                                                        <div> - Địa chỉ hiện tại: {{ $value->current_street ?? "" }}, {{ isset($value->id_current_ward) ? DB::table('wards')->find($value->id_current_ward)->name : "" }}, {{ isset($value->id_current_district) ? DB::table('districts')->find($value->id_current_district)->name : '' }}, {{ isset($value->id_current_province) ? DB::table('provinces')->find($value->id_current_province)->name : "" }}</div>
                                                        <div> - Địa chỉ thường trú: {{ $value->street ?? "" }}, {{ isset($value->id_ward) ? DB::table('wards')->find($value->id_ward)->name : "" }}, {{ isset($value->id_district) ? DB::table('districts')->find($value->id_district)->name : "" }}, {{ isset($value->id_province) ? DB::table('provinces')->find($value->id_province)->name : "" }}</div>
                                                        <div> - Điện thoại: {{ $value->telephone }}</div>
                                                        <div> - Email: {{ $value->email }}</div>
                                                        <div> - Chức vụ hiện tại: {{ $value->current_position ?? "không có" }}</div>
                                                        <div>{{__(' - Sinh viên năm: ') . ($value->year ?? "không có")}}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            @foreach($tieuchis as $tieuchi)
                                                @foreach($tieuchi->tieuchuans as $tieuchuan)
                                                    <td width="{{ 77 / $count_tieuchuan }}" class="text-left align-top">
                                                        <div class="row">
                                                            <div class="col pl-3">
                                                                @foreach($tieuchuan->noidungs as $noidung)
                                                                    @php
                                                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidung->id)->where('id_users', '=', $value->id)->first();
                                                                    @endphp
                                                                    <div class="text-left"> - {{$noidung->content}}</div>
                                                                    <div><strong>{{ $reply->reply ?? "không có" }}</strong></div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endforeach
                                                @isset($tieuchi->noidungs)
                                                    <td width="{{ 77 / $count_tieuchuan }}" class="text-left align-top">
                                                        <div class="row">
                                                            <div class="col pl-3">
                                                                @foreach($tieuchi->noidungs as $noidung)
                                                                    @php
                                                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidung->id)->where('id_users', '=', $value->id)->first();
                                                                    @endphp
                                                                    <div class="text-left"> - {{$noidung->content}}</div>
                                                                    <div><strong>{{ $reply->reply ?? "không có" }}</strong></div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endisset
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div id="footer">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-center">
                        <b>XÁC NHẬN CỦA ĐƠN VỊ</b><br><br><br><br><b></b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <b>Ý KIẾN CỦA BAN CHỦ NHIỆM/CẤP ỦY</b><br><br><br><br><br><br><br>
                    </div>
                </div>
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
