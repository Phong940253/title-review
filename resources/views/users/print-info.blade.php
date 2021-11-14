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
                    <div class="col-7">
                        <i>TP. Hồ Chí Minh, ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</i>
                    </div>
                </div>
                <div class="row" style="padding-top: 15px">
                    <div class="col-12 text-center" style="margin-top: 15px;">
                        <span style="font-size: 16pt;"><b>BẢN GIỚI THIỆU THÀNH TÍCH</b></span><br>
                        <b>DỀ CỬ
                            "{{ is_null(session('id_title')) ? "" : mb_strtoupper(DB::table('danhhieu')->find(session('id_title'))->name) }}"<br></b>
                        <b><i>(Dành
                                cho {{ is_null(session('id_object')) ? "" : DB::table('doituong')->find(session('id_object'))->name }})</i></b>
                    </div>
                </div>
            </div>
            <br>
            <div id="content">
                <div><b>PHẦN A. LÝ LỊCH CÁ NHÂN</b></div>
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset($user->url_image) ?? ""}}" style="margin-top: 10px;" alt="" width="113px" height="155px" class="img-thumbnail">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            1. Họ và tên: {{ mb_strtoupper($user->name) ?? "không có"  }}
                        </div>
                        <div class="row">
                            <div class="col p-0">
                                <div>2. Giới tính: {{ $user->gender ? "Nữ" : "Nam" }}</div>
                                <div>3. Dân tộc: {{ Setting("nation" . $user->nation) }}</div>
                            </div>
                            <div class="col p-0">
                                <div>3. Ngày sinh: {{ $user->birthDay ??  "không có" }}</div>
                                <div>5. Tôn
                                    giáo: {{ DB::table('religion')->find($user->id_religion)->name }}</div>
                            </div>
                        </div>
                        <div class="row p-0">6. Địa chỉ hiện tại: {{ $user->current_street }}, {{ DB::table('wards')->find($user->id_current_ward)->name }}, {{ DB::table('districts')->find($user->id_current_district)->name }}, {{ DB::table('provinces')->find($user->id_current_province)->name }}</div>
                        <div class="row p-0">7. Địa chỉ thường trú: {{ $user->street }}, {{ DB::table('wards')->find($user->id_ward)->name }}, {{ DB::table('districts')->find($user->id_district)->name }}, {{ DB::table('provinces')->find($user->id_province)->name }}</div>
                        <div class="row p-0">8. Email: {{ $user->email }}</div>
                    </div>
                </div>
                <div class="row pt-2" style="padding-left: 15px">9. Ngày kết nạp
                    Đoàn: {{ $date_admission_doan ?? "không có" }}</div>
                <div class="row" style="padding-left: 15px">10. Ngày kết nạp Đảng (nếu có):
                    Dự
                    bị: {{ $date_admission_dang_reserve ?? "Không có;" }}
                    Chính
                    thức: {{ $date_admission_dang_official ?? "không có" }}
                </div>
                <div>11. Chức vụ hiện tại: {{ $user->current_position ?? "không có" }}</div>
                <div>12. Chức vụ cao nhất: {{ $user->highest_position ?? "không có" }}</div>
                <div class="row">
                    <div class="col-7">13. Đơn vị trực thuộc: {{ DB::table('unit')->find($user->id_unit)->name }}</div>
                    <div class="col-5 pl-4">{{__('14. Sinh viên năm:') . $user->year}}</div>
                </div>
                <div style="margin-top: 15px"><b>PHẦN B. THÀNH TÍCH TIÊU BIỂU</b></div>
                @isset($tieuchis)
                    @for ($i = 0; $i < count($tieuchis); $i++)
                        <div class="tieu-chi"><b>{{$i + 1}}. {{ $tieuchis[$i]->name}}</b></div>
                        @if (count($tieuchis[$i]->tieuchuans) <= 0)
                            @php
                                $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                $noidungs = $TieuchuanController->getNoiDung($tieuchis[$i]->id, NULL);
                            @endphp
                            @if (count($noidungs) > 0)
                                @for ($l = 0; $l < count($noidungs); $l++)
                                    <div class="tab" style="text-indent: 40px; text-align: justify;"><b><i>{{$i + 1}}.{{$l + 1}}. {{$noidungs[$l]->content}}</i></b></div>
                                    @php
                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidungs[$l]->id)->where('id_users', '=', $user->id)->first();
                                    @endphp
                                    @if (isset($reply))
                                        <div style="text-indent: 40px;">{{ $reply->reply }}</div>
                                    @else
                                        <div style="text-indent: 40px;">{{__('Không có')}}</div>
                                    @endif
                                @endfor
                            @else
                                <div style="text-indent: 40px;">{{__('Không có')}}</div>
                            @endif
                        @endif
                        @for ($j = 0; $j < count($tieuchis[$i]->tieuchuans); $j++)
                            <div class="tab" style="text-indent: 40px;"><b>{{$i + 1}}.{{$j + 1}}. {{$tieuchis[$i]->tieuchuans[$j]->name}}</b></div>
                            @php
                                $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                $noidungs = $TieuchuanController->getNoidung($tieuchis[$i]->id, $tieuchis[$i]->tieuchuans[$j]->id);
                            @endphp
                            @if (count($noidungs) > 0)
                                @for ($k = 0; $k < count($noidungs); $k++)
                                    <div class="tab" style="text-indent: 40px;text-align: justify;"><b><i>{{$i + 1}}.{{$j + 1}}.{{$k + 1}}. {{$noidungs[$k]->content}}</i></b></div>
                                    @php
                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidungs[$k]->id)->where('id_users', '=', $user->id)->first();
                                    @endphp
                                    @if (isset($reply))
                                        <div style="text-indent: 40px;">{{ $reply->reply }}</div>
                                    @else
                                        <div style="text-indent: 40px;">{{__('Không có')}}</div>
                                    @endif
                                @endfor
                            @else
                                <div style="text-indent: 40px;">{{__('Không có')}}</div>
                            @endif
                        @endfor
                    @endfor
                @endisset
            </div>
            <div id="footer">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-center">
                        <b>Người khai</b><br><br><br><br><b>{{$user->name}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <b>Ý KIẾN CỦA ĐƠN VỊ</b><br><br><br><br><br><br>
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
