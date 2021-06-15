@extends('admin.template.admin_template')

<style>
.inbox_people {
	background: #fff;
	float: left;
	overflow: hidden;
	width: 30%;
	border-right: 1px solid #ddd;
}

.inbox_msg {
	border: 1px solid #ddd;
	clear: both;
	overflow: hidden;
}

.top_spac {
	margin: 20px 0 0;
}

.recent_heading {
	float: left;
	width: 40%;
}

.srch_bar {
	display: inline-block;
	text-align: right;
	width: 60%;
	padding:
}

.headind_srch {
	padding: 10px 29px 10px 20px;
	overflow: hidden;
	border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
	color: #0465ac;
    font-size: 16px;
    margin: auto;
    line-height: 29px;
}

.srch_bar input {
	outline: none;
	border: 1px solid #cdcdcd;
	border-width: 0 0 1px 0;
	width: 80%;
	padding: 2px 0 4px 6px;
	background: none;
}

.srch_bar .input-group-addon button {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border: medium none;
	padding: 0;
	color: #707070;
	font-size: 18px;
}

.srch_bar .input-group-addon {
	margin: 0 0 0 -27px;
}

.chat_ib h5 {
	font-size: 15px;
	color: #464646;
	margin: 0 0 8px 0;
}

.chat_ib h5 span {
	font-size: 13px;
	float: right;
}

.chat_ib p {
    font-size: 12px;
    color: #989898;
    margin: auto;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat_img {
	float: left;
	width: 11%;
}

.chat_img img {
	width: 100%
}

.chat_ib {
	float: left;
	padding: 0 0 0 15px;
	width: 88%;
}

.chat_people {
	overflow: hidden;
	clear: both;
}

.chat_list {
	border-bottom: 1px solid #ddd;
	margin: 0;
	padding: 18px 16px 10px;
}

.inbox_chat {
	height: 550px;
	overflow-y: scroll;
}

.active_chat {
	background: #e8f6ff;
}

.incoming_msg_img {
	display: inline-block;
	width: 6%;
}

.incoming_msg_img img {
	width: 100%;
}

.received_msg {
	display: inline-block;
	padding: 0 0 0 10px;
	vertical-align: top;
	width: 92%;
}

.received_withd_msg p {
	background: #ebebeb none repeat scroll 0 0;
	border-radius: 0 15px 15px 15px;
	color: #646464;
	font-size: 14px;
	margin: 0;
	padding: 5px 10px 5px 12px;
	width: 100%;
}

.time_date {
	color: #747474;
	display: block;
	font-size: 12px;
	margin: 8px 0 0;
}

.received_withd_msg {
	width: 57%;
}

.mesgs{
	float: left;
	padding: 30px 15px 0 25px;
	width:70%;
}

.sent_msg p {
	background:#0465ac;
	border-radius: 12px 15px 15px 0;
	font-size: 14px;
	margin: 0;
	color: #fff;
	padding: 5px 10px 5px 12px;
	width: 100%;
}

.outgoing_msg {
	overflow: hidden;
	margin: 26px 0 26px;
}

.sent_msg {
	float: right;
	width: 46%;
}

.input_msg_write input {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border: medium none;
	color: #4c4c4c;
	font-size: 15px;
	min-height: 48px;
	width: 100%;
	outline:none;
}

.type_msg {
	border-top: 1px solid #c4c4c4;
	position: relative;
}

.msg_send_btn {
	background: #05728f none repeat scroll 0 0;
	border:none;
	border-radius: 50%;
	color: #fff;
	cursor: pointer;
	font-size: 15px;
	height: 33px;
	position: absolute;
	right: 0;
	top: 11px;
	width: 33px;
}

.messaging {
	padding: 0 0 50px 0;
}

.msg_history {
	height: 516px;
	overflow-y: auto;
}
</style>

@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="messaging">
  <div class="inbox_msg">
	<div class="inbox_people">
	  <div class="headind_srch">
		<div class="recent_heading">
		  <h4>Recent</h4>
		</div>
		<div class="srch_bar">
		  <div class="stylish-input-group">
			<input type="text" class="search-bar"  placeholder="Search" >
			</div>
		</div>
	  </div>
	  <div class="inbox_chat scroll">
      @foreach($user_chat as $user_chat)
		<div class="chat_list">
		  <div class="chat_people">
          <a id="tab{{$user_chat->user}}" data-index="{{$user_chat->user}}" name="tab" href="#"><div class="chat_img"> <img src="../img/user-profile.png" alt="sunil"> </div> 
			<div class="chat_ib">
			  <h5>{{$user_chat->name}} <span class="chat_date">{{$user_chat->date}}</span></h5>
			  <p>{{$user_chat->msg}}....</p>
			</div>
            </a>
		  </div>
		</div>
    @endforeach	
	  </div>
	</div>
	<div class="mesgs">
 
	    <div class="msg_history">  
             

	    </div>

	   <!-- <div class="type_msg">
		<div class="input_msg_write"> 
		  <input type="text" class="write_msg" name="msgs" placeholder="Type a message" /> 
		  <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	  </div> -->
	</div>
  </div>
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
<script>
    $(function () {
        $('#users_list').DataTable({
            responsive: true,
            autoWidth: false,
            "scrollX": true,
        });
    });
</script>
<script>
 $("a[name=tab]").on("click", function () {
    var customer_id = $(this).data("index");
    var html=''; 
    $.ajax({
                url: "/admin/get_chat_record/"+customer_id,
                'type': "get", 
                dataType: 'json',
                'success': function (data) {
                    if (data == "empty") {
                        $('.incoming_msg').html("");
                        $('.outgoing_msg').html("");
                    } else {
                         
                        var stringified = JSON.stringify(data);
                        var results = JSON.parse(stringified);
                        
                        console.log(results.length); 
                        if (results.length === undefined || results.length == 0) {

                        }else{
                          $(".incoming_msg").html("");
                          $(".outgoing_msg").html(""); 
                          for (var i = 0; i < results.length; i++) {
                            var counter = results[i];
                             var chat_message = counter.msg;
                             var datetime = counter.date;
                             var name = counter.name;
                             var title = counter.title;
                             var post_id = counter.post_id;
                             var user_id = counter.user_id;
                             var id = counter.id;
                                if($.trim(name) != "admin"){
                                    html+='<div class="incoming_msg">'+
                                    '<div class="incoming_msg_img">'+ 
                                    '<img src="../img/user-profile.png" alt="sunil">'+ 
                                    '</div>'+
                                    '<div class="received_msg">'+'<div class="received_withd_msg">'+
                                    '<p class="text_message">'+chat_message+' '+'('+title+')'+'</p>'+
                                  '<span class="time_date">'+datetime+' '+'<div class="comment-meta">'+'<button type="button" class="creply" href="" onclick="myJavaScriptFunction();">'+'Reply'+'</button>'+'</div>'+'</span>'+ 
                                  '<div style="list-style: none; display: none">'+ 
                                    '<form role="form" method="post">'+
                                       '<input name="_token" type="hidden" value="{{ csrf_token() }}"/>'+
                                        '<div class="type_msg">'+
                                            '<div class="input_msg_write">'+
                                            '<input type="hidden" class="post_id'+id+'" name="post_id" value="'+post_id+'" placeholder="Type a message" />'+
                                            '<input type="hidden" class="user_id'+id+'" name="user_id" value="'+user_id+'" placeholder="Type a message" />'+
                                            '<input type="text" class="msgs'+id+'" name="msgs" placeholder="Type a message" />'+
                                        '</div>'+
                                        '<button class="msg_send_btn" type="button" onclick="formFunction('+id+');">'+'<i class="fa fa-paper-plane" aria-hidden="true">'+'</i>'+'</button>'+
                                        '<br>'+ 
                                    '</form>'+
                                    '</div>'+
                                    '</div>'+
                                  '</div>'+'</div>' 
                                  
                                }
                                else{
                                    html+='<div class="outgoing_msg">'+'<div class="sent_msg">'+'<p class="text_message">'+chat_message+'</p>'+
                                  '<span class="time_date">'+datetime+'</span>'+'</div>'+'</div>' 
                                } 

                            }
                                $(".msg_history").append(html); 
                         
                        }

                    }
                }
            });
});
</script>
 
<script>
function myJavaScriptFunction() {
    $(document).on('click', '.creply', function(){ 
    $(this).closest('.time_date').next().show();  
  });
}
</script>
<script>
function formFunction(id) { 
		var _token = $("input[name='_token']").val();  
		var post_id =$(".post_id"+id).val();
		var user_id =$(".user_id"+id).val();
		var mesgs = $(".msgs"+id).val();
 
		$.ajax({
			url: "/admin/admin_reply",
			type:'POST',
			data: {_token:_token, mesgs:mesgs, post_id:post_id, user_id:user_id},
			success: function(data) {
				if($.isEmptyObject(data.error)){
                    alert("post comment successful");
					$(".msgs"+id).val("");
					// $('#passwd_update').html(""); 
				}else{
					printErrorMsg(data.error);
				}
			}
		});


 


	function printErrorMsg (msg) {
		$(".print-error-msg2").find("ul").html('');
		$(".print-error-msg2").css('display','block'); 
		$(".print-error-msg2").find("ul").append('<li>'+msg+'</li>');
	 
	}
}

</script>

@endsection