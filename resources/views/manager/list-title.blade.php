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
    @role('admin')
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card shadow rounded">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="mb-0">Quản lí danh hiệu</h4>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body  pt-0 pt-md-4">
                                    <div class="form-group">
                                        <button id="add-title" type="button" class="btn btn-primary">Thêm danh hiệu</button>
                                    </div>
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush dataTable stripe display compact" id="datatable-basic">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên danh hiệu</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Ngày tạo</th>
                                                <th>Ngày cập nhật</th>
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
                                <form action="{{route('sua-danh-hieu')}}" method="post" enctype="multipart/form-data" id="submitForm">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Thông tin danh hiệu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modal-duyet">
                                    </div>
                                    <div class="modal-footer">
                                        <button id="close-button" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button id="submit" type="submit" form="submitForm" class="btn btn-primary">Lưu thay đổi</button>
                                        <button id="delete-button" type="button" class="btn btn-danger">Xoá</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')
        </div>
    @endrole
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
        const table = $('#datatable-basic').DataTable({
                "stateSave": true,
                "pagingType": "full_numbers",
                'search': {
                    return: true
                },
                scrollX: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "info": "Hiển thị trang thứ _PAGE_ trong _PAGES_ trang (_MAX_ danh hiệu)",
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
                'ajax': `{!! route('lay-danh-hieu')!!}`,
                'columns': [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'start', name: 'start'},
                    { data: 'finish', name: 'finish' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                ],
            });
        let data;
        $('#datatable-basic').on('click', 'tbody > tr', function () {
            data = table.row(this).data();
            var modal = $("#exampleModalLong");
            modal.modal({backdrop: 'static', keyboard: false});
            modal.modal('show');
            $.get(`{{ route('xem-danh-hieu') }}?id_title=${data.id}`, (response) => {
                $('#modal-duyet').empty().append(response);
            })
        });

        $("#add-title").click(function() {
            var modal = $("#exampleModalLong");
            modal.modal();
            modal.modal('show');
            $.get('{{ route('form-them-danh-hieu') }}', (response) => {
                $('#modal-duyet').empty().append(response);
            })
        })

        $("#submitForm").on('submit', function (e) {
            e.preventDefault();
            const form = $(this);
            console.log(form.attr('action'));
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
            $('#close-button').trigger('click');
        })

        $("#delete-button").click(function() {
            let formData = {
                '_token': '{{ csrf_token() }}',
                'id': $('#input-id').val()
            };
            console.log(formData)
            const posting = $.post('{{ route('xoa-danh-hieu') }}', formData);
            posting.done(function (data)  {
                if (data.success) {
                    table.ajax.reload(null, false);
                    toastr.options =  optionTask;
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
            $('#close-button').trigger('click');
        })
    </script>
    <script src="{{asset('assets')}}/vendor/dropzone/dist/min/dropzone.min.js"></script>
@endsection
