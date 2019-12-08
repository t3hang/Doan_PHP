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
                                <h4 class="mb-3 header-title">Thêm mới Lĩnh Vực</h4>

                                <form action="{{ route('linh-vuc.store') }}" method="POST" >
                                         {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Lĩnh Vực</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class=" mdi mdi-content-save-all"> Thêm</i></button>
                                   
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
        <div class="col-lg-2">
         </div>

           
        </form>
    </div> <!-- end col -->

    
</div>
<!-- end row-->
<script>
@endsection