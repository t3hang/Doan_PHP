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
        $(document).on('click', '.khoi-phuc-xoa', function(e) {
            e.preventDefault();
            var th = $(this);
            Swal.fire({
                title: "Bạn có chắc muốn khôi phục?",
                html: "<div class='text-secondary'>Lưu ý: Gói Credit bị xoá có thể khôi phục lại</div>",
                type: "success",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Huỷ bỏ"
            }).then(function(t) {
                    if (t.value) {
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
                <h4 class="header-title">Danh Sách Xóa Gói Credit</h4>
                <table id="nguoichoi-datatable" class="table activate-select dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                              <th>Tên gói</th>
                              <th>Credit</th>
                              <th>Số tiền</th>
                              <th>Thời gian xóa</th>
                              <th></th>
                              
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach($db as $goiCredit)
                        <tr>
                            <td>{{ $goiCredit->id }}</td>
                            <td>{{ $goiCredit->Ten_goi }}</td>
                            <td>{{ $goiCredit->Credit }}</td>
                            <td>{{ $goiCredit->So_tien }}</td>
                            <td>{{ $goiCredit->deleted_at }}</td>

                             <td>
                                  <form action="{{ route('goi-credit.restore') }}" method="POST">
                              <input type="hidden" name="id" value="{{ $goiCredit->id }}">
                              {{ csrf_field() }}
                              <div class="button-list khoi-phuc-xoa">
                                  <button type="submit" class="btn btn-purple waves-effect waves-light ">
                                      <span class="btn-label"><i class="fas fa-trash-restore"></i></span>Khôi phục
                                  </button>
                              </div>                              
                            </form>
                            </td>
                        </tr>
                         @endforeach
                        
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection