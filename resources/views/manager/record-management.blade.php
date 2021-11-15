@extends('layouts.app', ['title' => __('User Profile')])

@section('extend-lib')
    @parent
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }


    </style>
@endsection

@section('content')
    @include('users.partials.header-common', [
        'class' => 'col-lg-7'
    ])
    @can('duyệt - xem đề cử')
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card shadow rounded">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="mb-0">Danh sách tổng hợp cá nhân của đơn vị</h4>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body  pt-0 pt-md-4">
                                    <div class="form-group{{ $errors->has('id_title') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"
                                                       for="titleSelected">{{ __('Danh hiệu') }}</label>
                                            </div>
                                            <select class="custom-select form-control form-control-alternative" id="titleSelected" name="id_title" required>
                                                <option value="" selected disabled>{{ __('Chọn danh hiệu') }}</option>
                                                @isset($titles)
                                                    @foreach ($titles as $title)
                                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('id_object') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"
                                                       for="objectSelected">{{ __('Đối tượng') }}</label>
                                            </div>
                                            <select class="custom-select form-control form-control-alternative" id="objectSelected" name="id_object" required>
                                                <option selected disabled value="">{{ __('Chọn đối tượng') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @role('truong')
                                        <div class="form-group{{ $errors->has('id_unit') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" style="min-width: 6.375rem!important;"
                                                           for="unitSelected">{{ __('Đơn vị') }}</label>
                                                </div>
                                                <select class="custom-select form-control form-control-alternative" id="unitSelected" name="id_unit" required>
                                                    {!! $unit !!}
                                                </select>
                                            </div>
                                        </div>
                                    @endrole
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary">In danh sách</button>
                                    </div>
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush dataTable stripe display compact" id="datatable-basic">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>MSSV/MCB</th>
                                                <th>Họ và tên</th>
                                                <th>Giới tính</th>
                                                <th>Điện thoại</th>
                                                @role('khoa')
                                                <th>Email</th>
                                                @endrole
                                                <th>Xét duyệt</th>
                                                @role('truong')
                                                <th>Người duyệt cấp khoa</th>
                                                <th>Xếp loại</th>
                                                <th>Người duyệt cấp trường</th>
                                                <th>Xem báo cáo</th>
                                                @endrole
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-12 mb-5">
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="{{route('acceptDeCu')}}" method="post" enctype="multipart/form-data" id="submitForm">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thông tin hồ sơ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modal-duyet">
                                </div>
                                <div class="modal-footer">
                                    <button id="close-button" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    @role('khoa')
                                    <a id="in-bao-cao" href="" target="_blank" class="btn btn-neutral btn-documentation btn-icon">
                                        <span class="btn-inner--icon">
                                            <i class="fas fa-print mr-2"></i>
                                        </span>
                                        <span class="nav-link-inner--text">In đề cử</span>
                                    </a>
                                    @endrole
                                    <button id="submit" type="submit" form="submitForm" class="btn btn-primary">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    @endcan
@endsection

@section('scripts')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script>
        const optionTask = {
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

        $("#titleSelected").change(function () {
            $.ajax({
                url: "{{ route('user.object.get_by_title') }}?id_title=" + $(this).val(),
                method: 'GET',
                success: function (data) {
                    $('#objectSelected').html(data.html);
                }
            });
        });

        let table;
        $("#{{ (auth()->user()->hasRole('khoa')) ? 'objectSelected' : 'unitSelected' }}").change(function () {
            if ($.fn.dataTable.isDataTable( '#datatable-basic')) {
                table.destroy();
            }
            table = $('#datatable-basic').DataTable({
                "stateSave": true,
                "pagingType": "full_numbers",
                'search': {
                    return: true
                },
                scrollX: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "info": "Hiển thị trang thứ _PAGE_ trong _PAGES_ trang (_MAX_ cá nhân)",
                    "infoEmpty": "Không có bản ghi",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                    "searchDelay": 2000,
                },
                'processing': true,
                'serverSide': true,
                'ajax': `{!! route('tong-hop-don-vi') !!}?id_title=${$("#titleSelected").val()}&id_object=${$("#objectSelected").val()}&id_unit=${$("#unitSelected").val()}`,
                'columns': [
                    { data: 'ms', name: 'ms' },
                    { data: 'name', name: 'name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'telephone', name: 'telephone' },
                    @role('khoa')
                    { data: 'email', name: 'email' },
                    @endrole
                    { data: 'confirmed', name: 'confirmed'},
                    @role('truong')
                    { data: 'approved_name', name: 'approved_name'},
                    { data: 'xeploai', name: 'xeploai'},
                    { data: 'ranked_name', name: 'ranked_name'},
                    { data: 'bao-cao', name: 'bao-cao' }
                    @endrole
                ],
                // "columnDefs": [
                //     {
                //         "targets": [ 2 ],
                //         "visible": false,
                //         "searchable": false
                //     }
                // ]
            });
        });
        let data;
        $('#datatable-basic').on('click', 'tbody > tr', function () {
            data = table.row(this).data();
            var modal = $("#exampleModalLong");
            modal.modal({backdrop: 'static', keyboard: false});
            $('#in-bao-cao').attr('href', `{{ route('print-info') }}?id_title=${$("#titleSelected").val()}&id_object=${$("#objectSelected").val()}&id_user=${data.id}`)
            modal.modal('show');
            $.get(`{{route('duyet')}}?id_danhhieu_doituong=${data.id_danhhieu_doituong}&id_users=${data.id}`, (response) => {
                $('#modal-duyet').empty().append(response);
                activeDropzone();
            })
        });

        $("#submitForm").on('submit', function (e) {
            e.preventDefault();
            const form = $(this);
            console.log(form.attr('action'));
            uploadForm();
            @role('khoa')
            const posting = $.post(form.attr('action'), form.serialize());
            posting.done(function (data) {
                if (data.success) {
                    table.ajax.reload( null, false );
                    toastr.options = optionTask;
                    toastr['success'](data.message);
                } else {
                    toastr.options = optionTask;
                    toastr['warning'](data.message);
                }
            })
            posting.fail((data) => {
                toastr.options = optionTask;
                toastr['error'](data.message ? data.message : data.responseJSON.message);
            })
            @endrole
            $('#close-button').trigger('click');
        })
    </script>
    <script src="{{asset('assets')}}/vendor/dropzone/dist/min/dropzone.min.js"></script>
@endsection
