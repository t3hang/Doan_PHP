@extends('master')
@section('content')
<!-- start page title -->
     
<!-- end page title -->
 <div>
@include('ThongBao.success')
@include('ThongBao.errors')
</div>
      <div class="row">
         <div class="col-lg-2">
         </div>
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Thêm gói credit</h4>

                                <form action="{{ route('goi-credit.store') }}" method="POST" >
                                 {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên gói</label>
                                        <input type="text" class="form-control" id="Ten_goi" name="Ten_goi" required="">
                                    </div>
                                
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Credit</label>
                                        <input type="text" class="form-control" id="Credit" name="Credit" required="">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Số Tiền</label>
                                        <input type="number" class="form-control" id="So_tien"  name="So_tien" required="">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></button>
                                </form>

                            </div> <!-- end card-body-->
                        </div>
                    </div>
                    <div class="col-lg-2">
         </div>

                    </div>@endsection