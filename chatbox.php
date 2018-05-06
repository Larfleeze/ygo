<style>
.shout_box {
background:black; width:260px; overflow:hidden;
position:fixed; bottom:0; right:6.9%; z-index:9;
}
.shout_box .header .close_btn {
background: url(/close_btn.png) no-repeat 0px 0px; 
float:right; width:15px;
height: 15px;
}
.shout_box .header .close_btn:hover {
background: url(/close_btn.png) no-repeat 0px -16px;
}
.shout_box .header .open_btn {
background: url(/close_btn.png) no-repeat 0px -32px;
float:right; width:15px;
height:15px;
}
.shout_box .header .open_btn:hover {
background: url(close_btn.png) no-repeat 0px -48px;
}
.shout_box .header{
padding: 5px 3px 5px 5px;
font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
font-weight: bold; color:#fff;
border: 1px solid rgba(0, 39, 121, .76);
border-bottom:none; cursor:pointer;
}
.shout_box .header:hover{
background-color: black;
}
.shout_box .message_box {
background: #FFFFFF; height: 200px;
overflow:auto; border: 1px solid #CCC;
}
.shout_msg{
margin-bottom: 10px; display: block;
border-bottom: 1px solid #F3F3F3; padding: 0px 5px 5px 5px;
font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif; color:#7C7C7C;
}
.message_box:last-child { border-bottom:none;
}
time{ 
font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
font-weight: normal; float:right; color: #D5D5D5;
}
.shout_msg .username{
margin-bottom: 10px;margin-top: 10px;
}
.user_info input {
width: 98%; height: 25px; border: 1px solid #CCC; border-top: none; padding: 3px 0px 0px 3px;
font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
}
.shout_msg .username{
font-weight: bold; display: block;
}</style>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				
				$.post('shout.php', post_data, function(data) {
					

					$(data).hide().appendTo('.message_box').fadeIn();
	
					
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
		
				alert(err.statusText); 
				});
			}
	});
	

	$(".close_btn").click(function (e) {

		var toggleState = $('.toggle_chat').css('display');
		

		$('.toggle_chat').slideToggle();
		

		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<div class="shout_box">
<div class="header">YGO! Genesis Chat<div class="close_btn">&nbsp;</div></div>
  <div class="toggle_chat">
  <div class="message_box">
    </div>
    <div class="user_info">
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message" maxlength="58" /> 
    </div>
    </div>
</div>
