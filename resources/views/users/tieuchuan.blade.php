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
                                    <form action="{{route('submit-reply')}}" enctype="multipart/form-data" method="post"
                                          class="d-flex flex-column justify-content-center" id="form{{$noidungs[$i-1]->id}}">
                                        <input type="hidden" name="id_noidung" value="{{$noidungs[$i-1]->id}}">
                                        <p class="card-text">{{$noidungs[$i - 1]->content}}</p>
                                        <div class="form-group">
                                            <textarea name="content" class="form-control" id="FormControlTextarea{{$i}}" rows="8"
                                                      placeholder="Điền vào đây ...">{{ is_null($reply = $replies->firstWhere('id_noidung', '=', $noidungs[$i - 1]->id)) ? "" : $reply->reply}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                            <label>{{__('Minh chứng')}}</label>
                                            <div id="dropzone-multiple-component"
                                                 class="tab-pane tab-example-result fade active show"
                                                 role="tabpanel"
                                                 aria-labelledby="dropzone-multiple-component-tab">
                                                <div class="dropzone dropzone-multiple dz-clickable"
                                                     data-toggle="dropzone" data-dropzone-multiple id="dropzone"
                                                     value="{{$noidungs[$i-1]->id}}">
                                                    <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                    </ul>
                                                    <ul class="dz-preview dz-preview-multiple d-none list-group list-group-lg list-group-flush"
                                                        id="preview">
                                                        <li class="list-group-item px-0 dz-processing dz-image-preview">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <img class="avatar img rounded" alt="Ảnh"
                                                                         data-dz-thumbnail>
                                                                </div>
                                                                <div class="col ml--3">
                                                                    <h4 class="mb-1" data-dz-name="">Ảnh chụp màn
                                                                        hình (6).png</h4>
                                                                    <p class="small text-muted mb-0"
                                                                       data-dz-size=""><strong>0.5</strong> MB</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown">
                                                                        <a href="#"
                                                                           class="dropdown-ellipses dropdown-toggle"
                                                                           role="button" data-toggle="dropdown"
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false">
                                                                            <i class="fe fe-more-vertical"></i>
                                                                        </a>
                                                                        <div
                                                                            class="dropdown-menu dropdown-menu-right">
                                                                            <a href="#" class="dropdown-item"
                                                                               data-dz-remove="">
                                                                                Xóa
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
                                        <button type="submit" class="btn btn-primary my-2">Lưu</button>
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
        $(document).ready(() => {
            const target = $('[data-toggle="dropzone"]');
            target.map((index, value) => {
                const container = $(value).find(".dz-preview");
                const template = $(value).find('#preview');
                const option = {
                    paramName: "file",
                    url: "/file-upload",
                    previewsContainer: container.get(0),
                    previewTemplate: template.html(),
                    parallelUploads: 4,
                    maxFilesize: 2,
                    maxFiles: 10,
                    acceptedFiles: ".pdf,.png,.jpg,.doc,.docx,.xls,.xlsx",
                    uploadMultiple: true,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    params: {
                        'noi_dung': $(value).attr('value')
                    },
                    init: function () {
                        // let myDropzone = this;
                        var numMinhChung = 0;
                        @isset ($minhchungs)
                            @foreach ($minhchungs as $minhchung)
                                if ($(value).attr('value') == {{ $minhchung->id_noidung }}) {
                                    numMinhChung += 1;
                                    var mockFile = {
                                        name: "{{$minhchung->original_name}}",
                                        size: {{$minhchung->size}},
                                        dataURL: "{{ asset($minhchung->url) }}"
                                    };
                                    this.options.addedfile.call(this, mockFile);
                                    var extension = mockFile.name.split('.')[1];
                                    if (extension === "png" || extension === "jpg") {
                                        this.options.thumbnail.call(this, mockFile, "{{ asset($minhchung->url) }}");
                                    } else if (extension === "doc" || extension === "docx") {
                                        this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/word.png") }}");
                                    } else if (extension === "xls" || extension === "xlsx") {
                                        this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/excel.png") }}");
                                    } else {
                                        this.options.thumbnail.call(this, mockFile, "{{ asset("argon/img/icons/common/pdf.png") }}");
                                    }
                                }
                            @endforeach
                        @endisset

                        this.options.maxFiles = this.options.maxFiles - numMinhChung;
                        console.log(this.options.maxFiles);


                        this.on("addedfile", function (file) {
                            // CUSTOM THUMBNAIL FOR FILES OTHER THAN IMAGE TYPE
                            if (file.type === "application/pdf" || file.type === "pdf") {
                                file.previewElement.querySelector("[data-dz-thumbnail]").src = "{{ asset("argon/img/icons/common/pdf.png") }}";
                            // } else if (file.type === "text/plain" || file.type === "txt") {
                            //     file.previewElement.querySelector("[data-dz-thumbnail]").src = "images/txt-icon.png";
                            } else if (file.type === "application/msword" || file.type === "docx" || file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                                file.previewElement.querySelector("[data-dz-thumbnail]").src = "{{ asset("argon/img/icons/common/word.png") }}";
                            } else if (file.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || file.type === "xlsx" || file.type === 'xls') {
                                file.previewElement.querySelector("[data-dz-thumbnail]").src = "{{ asset("argon/img/icons/common/pdf.png") }}";
                            }
                        });

                        this.on("maxfilesexceeded", function (e) {
                            this.removeFile(e);
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            toastr['info']("Đã đến giới hạn file tải lên!");
                        });

                        this.on("removedfile", function (file) {
                            console.log(file);
                            $.post({
                                url: '/file-delete',
                                data: {id: $(value).attr('value'), name: file.name, _token: '{{ csrf_token() }}'},
                                dataType: 'json',
                                success: function (data) {
                                    if (data.success) {
                                        toastr.options = {
                                            "closeButton": false,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": true,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                        };
                                        toastr['success'](data.message);
                                    }
                                    // total_photos_counter--;
                                    // $("#counter").text("# " + total_photos_counter);
                                },
                                error: function (data) {
                                    toastr.options = {
                                        "closeButton": false,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    };
                                    toastr['error']('Có lỗi xảy ra!');
                                }
                            });
                        });
                    },

                    success: function (file, data) {
                        if (data.success) {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr['success'](data.message);
                        } else {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr['error'](data.message);
                        }
                    },

                    accept: function (file, done) {
                        done()
                    },
                };
                $(value).dropzone(option);
            });


            @for ($i = 1; $i <= count($noidungs); $i++)
                $("#form{{$noidungs[$i - 1]->id}}").submit((e) => {
                    e.preventDefault();
                    const form = $("#form{{$noidungs[$i - 1]->id}}");
                    const posting = $.post(form.attr('action'), form.serialize());
                    posting.done((data) => {
                        if (data.success) {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr['success'](data.message);
                        } else {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr['error'](data.message);
                        }
                    })
                });
            @endfor
        });
    </script>
@endsection

