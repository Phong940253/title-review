@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header-common', [
        'title' => __('Xin chào') . ' '. auth()->user()->name,
        'description' => __('Đây là trang thông tin cơ bản, bạn có thể xem và chỉnh sửa thông tin của mình ở đây.'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">

            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-title bg-white border-0">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-pills-circle flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    @for ($i = 1; $i <= count($noidungs); $i++)
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-2 {{($i == 1) ? 'active' : ''}}"
                                               id="tabs-icons-text-{{$i}}-tab" data-toggle="tab"
                                               href="#tabs-icons-text-{{$i}}" role="tab"
                                               aria-controls="tabs-icons-text-{{$i}}"
                                               aria-selected="{{($i == 1) ? 'true' : 'false'}}">{{$i}}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            @if (count($noidungs) == 0)
                                Không có ràng buộc về mục này!
                            @endif
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @for ($i = 1; $i <= count($noidungs); $i++)
                                <div class="tab-pane fade show {{($i == 1) ? 'active' : ''}}"
                                     id="tabs-icons-text-{{$i}}" role="tabpanel"
                                     aria-labelledby="tabs-icons-text-{{$i}}-tab">
                                    <form action="{{route('home')}}" enctype="multipart/form-data" method="post"
                                          class="d-flex flex-column justify-content-center">
                                        <p class="card-text">{{$noidungs[$i - 1]->content}}</p>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"
                                                      placeholder="Điền vào đây ..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('Minh chứng')}}</label>
                                            <div id="dropzone-multiple-component"
                                                 class="tab-pane tab-example-result fade active show" role="tabpanel"
                                                 aria-labelledby="dropzone-multiple-component-tab">
                                                <div class="dropzone dropzone-multiple dz-clickable"
                                                     data-toggle="dropzone" data-dropzone-multiple id="dropzone">
                                                    <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                    </ul>
                                                    <ul class="dz-preview dz-preview-multiple d-none list-group list-group-lg list-group-flush" id="preview">
                                                        <li class="list-group-item px-0 dz-processing dz-image-preview">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <img class="avatar img rounded" alt="Ảnh" data-dz-thumbnail>
                                                                </div>
                                                                <div class="col ml--3">
                                                                    <h4 class="mb-1" data-dz-name="">Ảnh chụp màn hình (6).png</h4>
                                                                    <p class="small text-muted mb-0" data-dz-size=""><strong>0.5</strong> MB</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fe fe-more-vertical"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="#" class="dropdown-item" data-dz-remove="">
                                                                                Remove
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="dz-default dz-message">
                                                        <span>Kéo thả hoặc chọn file minh chứng để tải lên (Tối đa 10 file, mỗi file tối đa 2MB)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary my-2">Lưu tất cả</button>
                                    </form>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@section("scripts")
    <script src="{{asset('assets')}}/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        // $(document).ready(function () {
        //     $("#dropzone").dropzone({
        //         paramName: "file", // The name that will be used to transfer the file
        //         maxFiles: 10,
        //         maxFilesize: 2, // MB
        //         parallelUploads: 2,
        //         previewTemplate: document.querySelector('#preview').innerHTML,
        //         uploadMultiple: true,
        //         url: "/file/post",
        //         accept: function (file, done) {
        //             if (file.name == "justinbieber.jpg") {
        //                 done("Naha, you don't.");
        //             } else {
        //                 done();
        //             }
        //         }
        //     });
        // })
        $(document).ready(() => {
            const target = $('[data-toggle="dropzone"]');
            target.map((index, value)=> {
                const container = $(value).find(".dz-preview");
                const template = $(value).find('#preview');
                const option = {
                    paramName: "file",
                    url: "/file/post",
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: container.get(0),
                    previewTemplate: template.html(),
                    parallelUploads: 4,
                    maxFiles: 50,
                    maxFilesize: 2,
                    acceptedFiles: ".pdf,.png,.jpg,.doc,.docx,.xls,.xlsx",
                    uploadMultiple: true,
                    init: function() {
                        this.on("addedfile", function(e) {
                            console.log("A file has been added");
                        })
                    },

                    accept: function (file, done) {
                        done();
                    }
                };
                $(value).dropzone(option);
            })
        })
    </script>
@endsection
