@extends('admin.template.admin_template')



@section('content')
<?php
//dd(\Route::current()->getName());
//dd($controller_name.' --- '.$action_name);
?>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<link rel="stylesheet" href="{{asset("bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}"> 
<link rel="stylesheet" href="{{ asset("bower_components/selecter/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/toaster/custom.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Deal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/update_deal', $edit_deal->id) }}" method="post" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Related</h3>
                        <div class="form-group">
                            <label for="first_name">Meta title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{$edit_deal->meta_title}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Meta Description</label>
                            <input type="text" class="form-control" name="meta_description" value="{{$edit_deal->meta_description}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" value="{{$edit_deal->meta_keywords}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Slugs</label>
                            <input type="text" class="form-control" name="slug" value="{{$edit_deal->slug}}">
                        </div>
                        <div class="form-group">
                           <label for="first_name">Description</label>
                           <textarea id="editor2" name="service_content" rows="10" cols="80">{!!$edit_deal->service_content!!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Deal Name</label>
                        <input type="text" class="form-control" name="deal_name" value="{{$edit_deal->name}}"   required="">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Description</label>
                        <textarea id="editor1" name="description" rows="10" cols="80">
                           {!!$edit_deal->description!!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Start Date</label>
                        <input type="text" class="form-control datepicker" name="start_date" value="{{$edit_deal->start_date}}"  autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="first_name">End Date</label>
                        <input type="text" class="form-control datepicker" name="end_date" value="{{$edit_deal->end_date}}"   autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Cost</label>
                        <input type="text" class="form-control" name="cost" id="heading"  value="{{$edit_deal->cost}}" required="">
                    </div>
                     
                    <div class="form-group">
                        <label for="first_name">Category</label>
                         <select name="category" id="category_id"  class="form-control">
                         if($edit_deal->category === "male"){
                            <option value="male">Male</option>
                        }else{
                            <option value="female">Female</option>
                        }
                           
                            </select>
                    </div>
                   <div class="form-group">
                        <label for="email">Image (1000*1000)</label>
                        <input type="file" name="picture"   id="filetag">
                        <img src="{{asset('img/service/'. $edit_deal->picture)}}"   id="preview">
                    </div> 
                     
                    <div class="form-group">
                        <label for="first_name">Status</label>
                        <select name="status" id="category_id" class="form-control" require>  
                        if($edit_deal->status === "open"){
                            <option value="open">Open</option>
                        }else{
                            <option value="close">Close</option>
                        }
                           
                        </select>
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
    <!-- /.row -->
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
<script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
<!--selectjs-->
<script src="{{ asset("bower_components/selecter/select2.full.min.js") }}"></script>
<script src="{{ asset("bower_components/moment/moment.js") }}"></script>
<!-- page script -->
<script>
$(function () {
    $('#users_list').DataTable();
});
//Date picker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
      autoclose: true
    })
</script>
 
<script>
var fileTag = document.getElementById("filetag"),
    preview = document.getElementById("preview");
    
fileTag.addEventListener("change", function() {
  changeImage(this);
});

function changeImage(input) {
  var reader;

  if (input.files && input.files[0]) {
    reader = new FileReader();

    reader.onload = function(e) {
      preview.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
$(document).ready(function(){

var _URL = window.URL || window.webkitURL;

$('#filetag').change(function () {
 var file = $(this)[0].files[0];

 img = new Image();
 var imgwidth = 0;
 var imgheight = 0;
 var maxwidth = 1000;
 var maxheight = 1000;

 img.src = _URL.createObjectURL(file);
 img.onload = function() {
  imgwidth = this.width;
  imgheight = this.height;

  $("#width").text(imgwidth);
  $("#height").text(imgheight);
  if(imgwidth <= maxwidth && imgheight <= maxheight){
   console.log("ok");
    
 }else{
     alert("Image size must be "+maxwidth+"X"+maxheight);
//   $("#response").text("Image size must be "+maxwidth+"X"+maxheight);
//   $('#preview').css('display','none');
   //location.reload();
 }
};
img.onerror = function() {

 $("#response").text("not a valid file: " + file.type);
}

});
});
</script>
@endsection