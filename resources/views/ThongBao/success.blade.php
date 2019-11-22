<!-- @if (Session::has('msg'))
	<div class="alert alert-success alert-nofi-success" role="alert">
     <i class="mdi mdi-check-all mr-2"></i> <strong>{{ Session::get('msg') }}</strong>!
	</div>
@endif  -->
@if (Session::has('msg'))
<!-- <div class="p-3 bg-secondary"> -->
<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-toggle="toast">
    <div class="toast-header">
        <strong class="mr-auto">Chúc mừng</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="toast-body">
        <strong>{{ Session::get('msg') }}</strong>!
    </div>
</div> <!--end toast-->
<!-- </div> -->
@endif 