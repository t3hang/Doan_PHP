@extends('master')
@section('js')
<!-- third party js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script>
    $(document).ready(function() {
        $("#cauhoi-datatable").DataTable({
            language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
        });
        $(document).on('click', '.xoa-cau-hoi', function(e) {
            e.preventDefault();
            var th = $(this);
            Swal.fire({
                title: "Bạn có chắc muốn xoá?",
                html: "<div class='text-secondary'>Lưu ý: Câu hỏi bị xoá có thể khôi phục lại</div>",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Huỷ bỏ"
            }).then(function(t) {
                    if (t.value) {
                        Swal.fire("Đã xóa!", "Tệp của bạn đã xóa.", "success")
                        th.parent().submit();
                    }
            })
        });
    });
</script>

@endsection
@section('css')

<!-- third party css -->
        <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
 @endsection
@section('content')
 <div class="row">
                    <div class="col-12">
                         <div>
                             @include('ThongBao.success')
                             @include('ThongBao.errors')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Danh sách câu hỏi</h4>

                                <table id="cauhoi-datatable" class="table activate-select dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nội Dung</th>
                                            <th>Lỉnh Vực id</th>
                                            <th>Phương Án A</th>
                                            <th>Phương Án B</th>
                                            <th>Phương Án C</th>
                                            <th>Phương Án D</th>
                                            <th>Đáp Án</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                        
                                      <tbody>
                                        @foreach($dscauhoi as $Cauhoi)
                                        <tr>
              
                                            <td>{{ $Cauhoi->id }}</td>
                                            <td>{{ $Cauhoi->noi_dung }}</td>
                                            <td>{{ $Cauhoi->linhVuc->ten_linh_vuc }}</td>
                                            <td>{{ $Cauhoi->phuong_an_A }}</td>
                                            <td>{{ $Cauhoi->phuong_an_B }}</td>
                                            <td>{{ $Cauhoi->phuong_an_C }}</td>
                                            <td>{{ $Cauhoi->phuong_an_D }}</td>
                                            <td>{{ $Cauhoi->dap_an }}</td>

                                            <td>
                                            <form action="{{ route('cau-hoi.remove', ['id' => $Cauhoi->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                             <a href="{{ route('cau-hoi.edit',['id' =>$Cauhoi->id]) }}" type="button" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-pencil-plus">Sửa</i></a> 
                                              <button type="submit" class="btn btn-danger waves-effect waves-light xoa-cau-hoi"><i class=" mdi mdi-trash-can-outline">Xóa</i></button>
                                          </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                </table>
                                <a href="{{ route('cau-hoi.create') }}" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></a>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
</div>@endsection