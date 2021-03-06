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
            <button type="button" class="btn btn-primary" onclick="window.print()" id="print">In b??o c??o</button>
        </div>
    </div>
    <div class="main-page">
        <div class="sub-page ">
            <div id="header">
                <div class="row">
                    <div class="col-5 text-center">
                        <span>????n v???: <br>{{ DB::table('unit')->find($user->id_unit)->name ?? "" }}</span>
                    </div>
                    <div class="col-7">
                        <i>TP. H??? Ch?? Minh, ng??y {{ date('d') }} th??ng {{ date('m') }} n??m {{ date('Y') }}</i>
                    </div>
                </div>
                <div class="row" style="padding-top: 15px">
                    <div class="col-12 text-center" style="margin-top: 15px;">
                        <span style="font-size: 16pt;"><b>B???NG GI???I THI???U TH??NH T??CH</b></span><br>
                        <b>????? C???
                            "{{ isset($id_title) ? mb_strtoupper(DB::table('danhhieu')->find($id_title)->name) : "" }}"<br></b>
                        <b><i>(D??nh
                                cho {{ isset($id_object) ? DB::table('doituong')->find($id_object)->name : "" }})</i></b>
                    </div>
                </div>
            </div>
            <br>
            <div id="content">
                <div><b>PH???N A. L?? L???CH C?? NH??N</b></div>
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset($user->url_image) ?? ""}}" style="margin-top: 10px;" alt="" width="113px" height="155px" class="img-thumbnail">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            {{ __('1. H??? v?? t??n: ') }}<pre class="m-0"> </pre><b>{{ mb_strtoupper($user->name) ?? "kh??ng c??"  }}</b>
                        </div>
                        <div class="row">
                            <div class="col p-0">
                                <div>2. Gi???i t??nh: {{ $user->gender ? "N???" : "Nam" }}</div>
                                <div>3. D??n t???c: {{ Setting("nation" . $user->nation) }}</div>
                            </div>
                            <div class="col p-0">
                                <div>3. Ng??y sinh: {{ $birthDay ??  "kh??ng c??" }}</div>
                                <div>5. T??n
                                    gi??o: {{ isset($user->id_religion) ? DB::table('religion')->find($user->id_religion)->name : "kh??ng c??" }}</div>
                            </div>
                        </div>
                        <div class="row p-0">6. ?????a ch??? hi???n t???i: {{ $user->current_street ?? "" }}, {{ isset($user->id_current_ward) ? DB::table('wards')->find($user->id_current_ward)->name : "" }}, {{ isset($user->id_current_district) ? DB::table('districts')->find($user->id_current_district)->name : '' }}, {{ isset($user->id_current_province) ? DB::table('provinces')->find($user->id_current_province)->name : "" }}</div>
                        <div class="row p-0">7. ?????a ch??? th?????ng tr??: {{ $user->street ?? "" }}, {{ isset($user->id_ward) ? DB::table('wards')->find($user->id_ward)->name : "" }}, {{ isset($user->id_district) ? DB::table('districts')->find($user->id_district)->name : "" }}, {{ isset($user->id_province) ? DB::table('provinces')->find($user->id_province)->name : "" }}</div>
                        <div class="row p-0">8. Email: {{ $user->email }}</div>
                    </div>
                </div>
                <div class="row pt-2" style="padding-left: 15px">9. Ng??y k???t n???p
                    ??o??n: {{ $date_admission_doan ?? "kh??ng c??" }}</div>
                <div class="row" style="padding-left: 15px">10. Ng??y k???t n???p ?????ng (n???u c??):
                    {{ __('D???
                    b???:') }} {{ $date_admission_dang_reserve ?? "Kh??ng c??;" }}
                    {{ __('- Ch??nh th???c:') }} {{ $date_admission_dang_official ?? "kh??ng c??" }}
                </div>
                <div>11. Ch???c v??? hi???n t???i: {{ $user->current_position ?? "kh??ng c??" }}</div>
                <div>12. Ch???c v??? cao nh???t: {{ $user->highest_position ?? "kh??ng c??" }}</div>
                <div>13. ????n v??? tr???c thu???c: {{ DB::table('unit')->find($user->id_unit)->name }}</div>
                <div>{{__('14. Sinh vi??n n??m: ') . ($user->year ?? "kh??ng c??")}}</div>
                <div style="margin-top: 15px"><b>PH???N B. TH??NH T??CH TI??U BI???U</b></div>
                @isset($tieuchis)
                    @foreach($tieuchis as $i=>$tieuchi)
                        <div class="tieu-chi"><b>{{$i + 1}}. {{ $tieuchi->name}}</b></div>
                        @if (count($tieuchi->tieuchuans) <= 0)
                            @php
                                $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                $noidungs = $TieuchuanController->getNoiDung($tieuchi->id, NULL);
                            @endphp
                            @if (count($noidungs) > 0)
                                @foreach($noidungs as $l=>$noidung)
                                    <div class="tab" style="text-indent: 40px; text-align: justify;"><b><i>{{$i + 1}}.{{$l + 1}}. {{$noidung->content}}</i></b></div>
                                    @php
                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidung->id)->where('id_users', '=', $user->id)->first();
                                    @endphp
                                    <div style="text-indent: 40px;">{{ $reply->reply ?? "kh??ng c??" }}</div>
                                @endforeach
                            @else
                                <div style="text-indent: 40px;">{{__('Kh??ng c??')}}</div>
                            @endif
                        @endif
                        @foreach ($tieuchi->tieuchuans as $j=>$tieuchuan)
                            <div class="tab" style="text-indent: 40px;"><b>{{$i + 1}}.{{$j + 1}}. {{$tieuchuan->name}}</b></div>
                            @php
                                $TieuchuanController = new \App\Http\Controllers\TieuchuanController;
                                $noidungs = $TieuchuanController->getNoidung($tieuchi->id, $tieuchuan->id);
                            @endphp
                            @if (count($noidungs) > 0)
                                @foreach ($noidungs as $k=>$noidung)
                                    <div class="tab" style="text-indent: 40px;text-align: justify;"><b><i>{{$i + 1}}.{{$j + 1}}.{{$k + 1}}. {{$noidung->content}}</i></b></div>
                                    @php
                                        $reply = DB::table('replies')->where('id_noidung', '=', $noidung->id)->where('id_users', '=', $user->id)->first();
                                    @endphp
                                    <div style="text-indent: 40px;">{{ $reply->reply ?? "kh??ng c??" }}</div>
                                @endforeach
                            @else
                                <div style="text-indent: 40px;">{{__('Kh??ng c??')}}</div>
                            @endif
                        @endforeach
                    @endforeach
                @endisset
            </div>
            <div id="footer">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-center">
                        <b>Ng?????i khai</b><br><br><br><br><b>{{$user->name}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <b>?? KI???N C???A ????N V???</b><br><br><br><br><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <b>?? KI???N C???A BAN CH??? NHI???M/C???P ???Y</b><br><br><br><br><br><br><br>
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
