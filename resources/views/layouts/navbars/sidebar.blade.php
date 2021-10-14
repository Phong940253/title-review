<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scroll-wrapper scrollbar-inner scroll-scrollx_visible" style="position: relative;">
        <div class="scrollbar-inner scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 624px;">
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."  width="180px" style="max-height: none">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        @role('user')
                        <li class="nav-item {{(isset($id_tieuchi) || isset($id_tieuchuan)) ? "" : "active"}}">
                            <a class="nav-link {{(isset($id_tieuchi) || isset($id_tieuchuan)) ? "" : "active"}}"
                               href="{{ route('profile.edit') }}">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text"> {{ __('Thông tin cá nhân') }}</span>
                            </a>
                        </li>
                        @isset($tieuchis)
                            @for($i = 0; $i < count($tieuchis); $i++)
                                <li class="nav-item">
                                    @if (count($tieuchis[$i]->tieuchuans) != 0)
                                        <a class="nav-link {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchis[$i]->id ? "active collapsed" : "" ): ""}}"
                                           href="#navbar-{{$tieuchis[$i]->id}}" data-toggle="collapse" role="button"
                                           aria-expanded="{{isset($id_tieuchi) ? ($id_tieuchi == $tieuchis[$i]->id ? "true" : "false") : "false"}}"
                                               aria-controls="navbar-{{$tieuchis[$i]->id}}">
{{--                                            <i class="fa fa-align-left" style="color: #2D46B9;"></i>--}}
                                            <h3 style="color: #2D46B9" class="pr-2 text-center m-0">{{ $i + 1 }}</h3>
                                            <span class="nav-link-text">{{$tieuchis[$i]->name}}</span>
                                        </a>
                                    @else
                                        <a class="nav-link {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchis[$i]->id ? "active" : "" ): ""}}"
                                           href="{{route('tieuchuan')}}?id_tieuchi={{$tieuchis[$i]->id}}">
                                            <h3 style="color: #2D46B9" class="pr-2 text-center m-0">{{ $i + 1 }}</h3>
                                            <span class="nav-link-text">{{$tieuchis[$i]->name}}</span>
                                        </a>
                                    @endif
                                    <div
                                        class="collapse {{isset($id_tieuchi) ? ($id_tieuchi == $tieuchis[$i]->id ? "show" : "") : ""}}"
                                        id="navbar-{{$tieuchis[$i]->id}}">
                                        <ul class="nav nav-sm flex-column">

                                            @foreach ($tieuchis[$i]->tieuchuans as $tieuchuan)
                                                <li class="nav-item  {{isset($id_tieuchuan) ? ($id_tieuchuan == $tieuchuan->id ? "active" : "" ): ""}}">
                                                    <a class="nav-link  {{isset($id_tieuchuan) ? ($id_tieuchuan == $tieuchuan->id ? "active" : "" ): ""}}"
                                                       href="{{ route('tieuchuan') }}?id_tieuchuan={{$tieuchuan->id}}&id_tieuchi={{$tieuchis[$i]->id}}">
                                                        {{$tieuchuan->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endfor
                        @endisset
                        @endrole
                        @role('khoa')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text"> {{ __('Thông tin cá nhân') }}</span>
                            </a>
                        </li>
                        @endrole
                        @role('truong')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text"> {{ __('Thông tin cá nhân') }}</span>
                            </a>
                        </li>
                        @endrole
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">Quy chế</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                    </ul>
                </div>
            </div>
        </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 0px; left: 0px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 501px; top: 0px;"></div></div></div></div>
</nav>
