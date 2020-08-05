@extends('admin.template.admin_template')



@section('content')
<?php
//dd(\Route::current()->getName());
//dd($controller_name.' --- '.$action_name);
?>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Product Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('admin/edit_vendor', $update_vendor_detail->id) }}" >
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                <div class="form-group">
                        <label for="password">Shop Name</label>
                        <input type="text" class="form-control"
                                       name="name" value="{{$update_vendor_detail->name}}" >
                    </div> 
                    <div class="form-group">
                        <label for="password">Phone #</label>
                        <input type="text" class="form-control"
                                       name="phone_no" value="{{$update_vendor_detail->phone_no}}" >
                    </div> 
                    <div class="form-group">
                        <label for="password">Alt Phone #</label>
                        <input type="text" class="form-control"
                                       name="alt_phone_no" value="{{$update_vendor_detail->alt_phone_no}}" >
                    </div> 
                    <div class="form-group">
                        <label for="password">Address</label>
                        <input type="text" class="form-control"
                                       name="address" value="{{$update_vendor_detail->address}}" >
                    </div>
                   
                    <div class="form-group">
                        <label for="first_name">Date</label>
                        <input type="text" type="text" class="form-control datepicker" value="{{$update_vendor_detail->date}}" name="date" autocopmplete="OFF" />
                                
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>
   
</section>
<!-- /.content -->
@endsection

@section('scripts')
<!-- jQuery 3 -->
<!--<script src="/bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!--<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- DataTables -->
<script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<!--<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
<!-- page script -->
<script src="{{ asset("bower_components/datepicker/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("bower_components/datepicker/daterangepicker.js") }}"></script>
<script>
$(function () {
    $('#users_list').DataTable();
});
</script>
<script>
//Date picker

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    })
</script>

@endsection