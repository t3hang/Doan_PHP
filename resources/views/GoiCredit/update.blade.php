@extends('master')
@section('content')
<!-- start page title -->
     
<!-- end page title -->
      <div class="row">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Sửa gói credit</h4>

                                <form action="{{ route('goi-credit.update') }}" method="POST" >
                                   {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" value="{{ $dsGoiCredit->id }}" >

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên gói</label>
                                        <input type="text" 
                                        value="{{ $dsGoiCredit->Ten_goi }}"
                                        class="form-control" id="Ten_goi" name="Ten_goi" required="">
                                    </div>
                                
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Credit</label>
                                        <input type="text"
                                        value="{{ $dsGoiCredit->Credit }}"
                                         class="form-control" id="Credit" name="Credit" required="">
                                    </div>
                                  
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Số Tiền</label>
                                        <input type="number" 
                                        value="{{ $dsGoiCredit->So_tien }}"
                                        class="form-control" id="So_tien"  name="So_tien" required="">
                                    </div>
                                   
                                  <button type="submit" class="btn btn-primary waves-effect waves-light">Sửa</button>    
                                    <button type="button" id="close_form_edit" class="btn btn-secondary waves-effect">Huỷ bỏ</button>
                            
                                     
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>

          
        </form>
    </div> <!-- end col -->

    
</div>
<!-- end row-->
@endsection