@extends('social.template.admin_template')



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
                <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('social/create_product') }}" method="post" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Related</h3>
                        <div class="form-group">
                            <label for="first_name">Meta title</label>
                            <input type="text" class="form-control" name="meta_title" >
                        </div>
                        
                        <div class="form-group">
                            <label for="first_name">Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" >
                        </div>
                        <div class="form-group">
                            <label for="first_name">Slugs</label>
                            <input type="text" class="form-control" name="slug" >
                        </div>
                        <div class="form-group">
                         <label for="first_name">Meta Description</label>
                         <textarea id="editor2" name="meta_description" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="heading"   required="">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Description</label>
                        <textarea id="editor1" name="description" rows="10" cols="80"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Reference #</label>
                        <input type="text" class="form-control" name="reference_number" id="heading"   required="">
                    </div> 
                    <div class="form-group">
                        <label for="first_name">Cost</label>
                        <input type="text" class="form-control" name="cost" id="heading"   required="">
                    </div> 
                    <div class="form-group">
                        <label for="first_name">Major Type</label>
                            <select name="major_type_id" id="major_type_id"   class="form-control"> 
                                <option value="">Select Major Type</option>
                                @foreach($mj_type as $mj_type)
                                <option value="{{$mj_type->id}}">{{$mj_type->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Sub Type</label>
                            <select name="sub_type_id" id="sub_type_id"  class="form-control"> 
                                 
                                 
                            </select>
                    </div>  
                    <div class="form-group">
                         <div id="response" style="color:red"></div>
                        <label for="email">Blog Image (770*461)</label>
                        <input type="file" name="picture" id="filetag" class="filetag">
                        <img src="" id="preview">
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
$(document).on('change', '#major_type_id', function() {
    var value = $(this).val();
    $.ajax({
            url:'{{ route('get_sub_type') }}',
            type:'POST',
            data:{values:value, _token: '{{csrf_token()}}'},
            success:function(response){
                var len = response.length;

                $("#sub_type_id").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        
                        $("#sub_type_id").append("<option value='"+id+"'>"+name+"</option>");

                    }
                },
            error: function(error){
                console.log(error);
                }
           }) 
});
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
 var maxheight = 999;

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