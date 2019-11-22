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
                                <h4 class="mb-3 header-title">Thêm mới câu hỏi</h4>

                                <form action="{{ route('cau-hoi.store') }}" method="POST">
                                 {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội Dung</label>
                                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" required="">
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
                                        <input type="text" class="form-control" id="phuong_an_A" name="phuong_an_A" required="">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án B</label>
                                        <input type="text" class="form-control" id="phuong_an_B"  name="phuong_an_B" required="">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án C</label>
                                        <input type="text" class="form-control" id="phuong_an_C"  name="phuong_an_C" required="">
                                    </div>
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Phương Án D</label>
                                        <input type="text" class="form-control" id="phuong_an_D"  name="phuong_an_D" required="">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail1">Đáp Án</label>
                                        <input type="text" class="form-control" id="dap_an" name="dap_an" required="">
                                        <div class="form-group">
                                        </div> -->
                                      <p for="dap_an">Đáp án<span class="text-danger">*</span></p>
                                      <div class="radio radio-primary form-check-inline">
                                          <input 
                                            type="radio" 
                                            id="dap_an_a" 
                                            value="A" 
                                            name="dap_an" 
                                            {{ isset($cauhoi) && $cauhoi->dap_an === 'A' ? 'checked' : '' }}>
                                          <label for="dap_an_a">A</label>
                                      </div>
                                      <div class="radio radio-primary form-check-inline">
                                          <input 
                                            type="radio" 
                                            id="dap_an_b" 
                                            value="B" 
                                            name="dap_an"
                                            {{ isset($cauhoi) && $cauhoi->dap_an === 'B' ? 'checked' : '' }}>
                                          <label for="dap_an_b">B</label>
                                      </div>
                                      <div class="radio radio-primary form-check-inline">
                                          <input 
                                            type="radio" 
                                            id="dap_an_c" 
                                            value="C" 
                                            name="dap_an"
                                            {{ isset($cauhoi) && $cauhoi->dap_an === 'C' ? 'checked' : '' }}>
                                          <label for="dap_an_c">C</label>
                                      </div>
                                      <div class="radio radio-primary form-check-inline">
                                          <input 
                                            type="radio" 
                                            id="dap_an_d" 
                                            value="D" 
                                            name="dap_an"
                                            {{ isset($cauhoi) && $cauhoi->dap_an === 'D' ? 'checked' : '' }}>
                                          <label for="dap_an_d">D</label>
                                      </div>
                                    </div>
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
@endsection