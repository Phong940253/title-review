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
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card shadow rounded">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="mb-0">Thống kê danh sách hồ sơ đề cử cá nhân</h4>
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
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush dataTable stripe display compact" id="datatable-basic">
                                            <thead class="thead-light">
                                            <tr id="column">
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
        </div>
        @include('layouts.footers.auth')
    </div>
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

        let table;
        $("#titleSelected").change(function () {
            if ($.fn.dataTable.isDataTable( '#datatable-basic')) {
                table.destroy();
            }

            $.get(`{{ route('get-unit-by-title') }}?id_title=${$(this).val()}`, data => {
                data = JSON.parse(data);
                // console.log(data);
                const optionColumns = [{data: 'name', name: 'name'}];
                $('#column').append(`<th>Tên đơn vị</th>`)
                data.map((value, index) => {
                    console.log(value);
                    $('#column').append(`<th>${value.name}</th>`)
                    optionColumns.push({data: `${value.id}`, name: `${value.id}`});
                })
                $('#column').append(`<th>Tổng hợp</th>`)
                optionColumns.push({data: 'tonghop', name: 'tonghop'});
                console.log(optionColumns);
                table = $('#datatable-basic').DataTable({
                    "stateSave": true,
                    "ordering": false,
                    "paging": false,
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
                    'ajax': `{!! route('danh-sach-thong-ke-don-vi') !!}?id_title=${$("#titleSelected").val()}`,
                    'columns': optionColumns,
                    'recordsTotal': 100,
                });
            });


        });
    </script>
    <script src="{{asset('assets')}}/vendor/dropzone/dist/min/dropzone.min.js"></script>
@endsection
