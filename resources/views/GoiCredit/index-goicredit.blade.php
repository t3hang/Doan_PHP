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
        $("#goicredit-datatable").DataTable({
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
        $(document).on('click', '.xoa-goi-credit', function(e) {
            e.preventDefault();
            var th = $(this);
            Swal.fire({
                title: "Bạn có chắc muốn xoá?",
                html: "<div class='text-secondary'>Lưu ý: Gói Credit bị xoá có thể khôi phục lại</div>",
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
    @include('ThongBao.success')
    @include('ThongBao.errors')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Gói Credit</h4>
                    <table id="goicredit-datatable" class="table activate-select dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                  <th>Tên gói</th>
                                  <th>Credit</th>
                                  <th>Số tiền</th>
                                <td></td>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach($dsGoiCredit as $goiCredit)
                            <tr>
                                <td>{{ $goiCredit->id }}</td>
                                <td>{{ $goiCredit->Ten_goi }}</td>
                                <td>{{ $goiCredit->Credit }}</td>
                                <td>{{ $goiCredit->So_tien }}</td>
                                <td>
                                <form action="{{ route('goi-credit.remove', ['id' => $goiCredit->id ]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                  <a href="{{ route('goi-credit.edit',['id' =>$goiCredit->id]) }}" type="button" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-pencil-plus">Sửa</i></a> 
                                  <button type="submit" class="btn btn-danger waves-effect waves-light xoa-goi-credit"><i class=" mdi mdi-trash-can-outline">Xóa</i></button>
                                </form>
                                </td>
                            </tr>
                             @endforeach
                            
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Thêm gói credit</h4>

                    <form action="{{ route('goi-credit.store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên gói</label>
                            <input type="text" class="form-control" id="Ten_goi" name="Ten_goi">
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Credit</label>
                            <input type="text" class="form-control" id="Credit" name="Credit">
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Tiền</label>
                            <input type="number" class="form-control" id="So_tien"  name="So_tien">
                        </div>
                       
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></button>
                         
                    </form>

                </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
    </div>

@endsection