@extends('master')
@section('content')
<!-- start page title -->
     
<!-- end page title -->
      <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Sửa Lĩnh Vực</h4>

                                <form action="{{ route('linh-vuc.update') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="id" value="{{ $linhvuc->id }}" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Lĩnh Vực</label>
                                        <input  
                                                 type="text" 
                                                 value="{{ $linhvuc->ten_linh_vuc }}"
                                                 class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" required="">
                                    </div>
                                     
                                     
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Sửa</button>    
                                    <button type="button" id="close_form_edit" class="btn btn-secondary waves-effect">Huỷ bỏ</button>
                                    
                                    </form>
                                </div>
                        
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>

           
        </form>
    </div> <!-- end col -->

    
</div>
<!-- end row-->
@endsection