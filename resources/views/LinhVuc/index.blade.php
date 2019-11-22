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
        $("#linhvuc-datatable").DataTable({
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
        $(document).on('click', '.xoa-linh-vuc', function(e) {
            e.preventDefault();
            var th = $(this);
            Swal.fire({
                title: "Bạn có chắc muốn xoá?",
                html: "<div class='text-secondary'>Lưu ý: Lĩnh vực bị xoá có thể khôi phục lại</div>",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Huỷ bỏ"
            }).then(function(t) {
                    if (t.value )
                     { 
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
<div>
    @include('ThongBao.success')
     @include('ThongBao.errors')

</div>
 <div class="row"> 

        <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Danh sách lĩnh vực</h4>

                                <table id="linhvuc-datatable" class="table activate-select dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th width="30%">ID</th>
                                            <th width="50%">Tên Lảnh Vực</th>
                                            <th width="20%"></th>
                                        </tr>
                                    </thead>
                        
                                      <tbody>
                                        @foreach($dsLinhVuc as $linhvuc)
                                        <tr>
              
                                            <td>{{ $linhvuc->id }}</td>
                                            <td>{{ $linhvuc->ten_linh_vuc }}</td>
                                            <td>
                                            <form action="{{ route('linh-vuc.remove', ['id' => $linhvuc->id ]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                              <a href="{{ route('linh-vuc.edit',['id' =>$linhvuc->id]) }}" type="submit" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-pencil-plus">Sửa</i></a>  
                                              <button type="submit" class="btn btn-danger waves-effect waves-light xoa-linh-vuc"><i class=" mdi mdi-trash-can-outline">Xóa</i></button>
                                          </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                </table>
                              <!--   <a href="{{ route('linh-vuc.create') }}" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></a> -->

                            </div>
                        </div> 
                    </div>
                 <div class="col-lg-4">
                       <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Thêm mới Lĩnh Vực</h4>

                                <form action="{{ route('linh-vuc.store') }}" method="POST" >
                                         {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Lĩnh Vực</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" required="">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></button>
                                   
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>

                 </div>

</div>@endsection