@extends('master')
@section('content')
<!-- start page title -->
     
<!-- end page title -->
      <div class="row">
        <div class="col-lg-2">
         </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Thêm mới câu hỏi</h4>

                                <form action="{{ route('cau-hoi.update') }}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id" value="{{ $cauhoi->id }}" >
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội Dung</label>
                                        <input type="text"
                                        value="{{ $cauhoi->noi_dung }}"
                                         class="form-control" id="noi_dung" name="noi_dung">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lĩnh Vực</label>
                                         <select id="linh_vuc_id" name="linh_vuc_id" class="form-control">
                                            <option>Lĩnh Vực</option>
                                            @foreach( $dsLinhVuc as $linhVuc)
                                             <option value="{{ $linhVuc->id }}">{{ $linhVuc->ten_linh_vuc }} <option/>
                                            @endforeach
                                               
                    
                                            </select>
                                    </div>

                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án A</label>
                                        <input type="text" 
                                         value="{{ $cauhoi->phuong_an_A }}"
                                        class="form-control" id="phuong_an_A" name="phuong_an_A">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án B</label>
                                        <input type="text"
                                        value="{{ $cauhoi->phuong_an_B }}" 
                                        class="form-control" id="phuong_an_B"  name="phuong_an_B">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án C</label>
                                        <input type="text"
                                        value="{{ $cauhoi->phuong_an_C }}"
                                         class="form-control" id="phuong_an_C"  name="phuong_an_C">
                                    </div>
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án D</label>
                                        <input type="text"
                                        value="{{ $cauhoi->phuong_an_D }}"
                                         class="form-control" id="phuong_an_D"  name="phuong_an_D">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Đáp Án</label>
                                        <input type="text"
                                        value="{{ $cauhoi->dap_an }}"
                                         class="form-control" id="dap_an" name="dap_an">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Sửa</button>    
                                    <button type="button" id="close_form_edit" class="btn btn-secondary waves-effect">Huỷ bỏ</button>
                                   
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
@endsection