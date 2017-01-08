$(function(){
	console.log(new Date());
	
	$(".send-button").click(function(){
		var content = $(".msg-val").val();
		if (!content) {
			$(".msg-val").focus();
			return false;
		}
		
		var data = {'content': content, 'room':config.room, 'avatarnum':config.avaratnum};
		$.post(
			config.msgurl, 
			data, 
			function(ret){
				$(".msg-val").val(null);
			}
		);
	});
	
	var socketurl = config.socketurl + '/' + config.room;
	ws = new WebSocket(socketurl);
	ws.onmessage = function(evt){
	    var msg = JSON.parse(evt.data);
	    if ($(".message ul li").length > 3) {
	    		$(".message ul li").eq(0).fadeOut(300, function(){$(this).remove()});
	    } 
	    createMsg(msg);
	};
	
	
	function createMsg(msg) {
		console.log(msg);
		var li = $("<li></li>");
		li.addClass("tip");
		var avatar = $("<p></p>");
		avatar.addClass("avatar");
		
		var img = $("<img/>")
		img.addClass('img-circle');
		img.attr("src", "/images/avatar/"+msg.avatarnum+".jpeg");
		avatar.append(img);
		
		var tip = $("<p></p>");
		tip.addClass('msg-tip');

		var content = $("<p></p>");
		content.addClass("content");
		content.text(msg.content);
		
		li.append(avatar);
		li.append(tip);
		li.append(content);
		
		$(".message ul").append(li);
	}
});