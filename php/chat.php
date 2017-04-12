
<!DOCTYPE html>
<html>
<head>
<title>Chat</title>
<link type="text/css" rel="stylesheet" href="/css/chat.css" />
</head>
<?php session_start();

?>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome  <?php echo $_SESSION["username"]; ?>, <b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"><?php
	if(file_exists("log.html") && filesize("log.html") > 0){
    $handle = fopen("log.html", "r");
    $contents = fread($handle, filesize("log.html"));
    fclose($handle);
     
    echo $contents	;
}
?></div>
     
	 
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>

	<form name="online" action="">
	 <div id="chatbox" style="float:right;"> </div>
	 <input  style="float:right;" name="checkusers" type="submit"  id="submitmsg" value="Check Online Users" />
	</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
			
});
 		
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = '/php/logout.php';}		
	});
});
//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		if(clientmsg != "")
		{
		$.post("post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
		}
		else
		{
			return false;
		}
	});
// copy
//If user submits the form
	$("#checkusers").click(function(){	
		var username = $_SESSION["username"];
		if(username != "")
		{
		$.post("post.php", {text: username});				
		return false;
		}
		else
		{
			return false;
		}
	});
	
function loggedusers()
{
	var username = $_SESSION["username"];
	if(username != "")
	{
		$.post("loggedusers.php", {text: username});
		return false;
	}		
	return false;
}
	
//Load the file containing the chat log
function loadLog(){		

	$.ajax({
		url: "log.html",
		cache: false,
		success: function(html){		
			$("#chatbox").html(html); //Insert chat log into the #chatbox div				
	  	},
	});
}
//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 10);	//Reload file every 2500 ms or x ms if you wish to change the second parameter

</script>
</body>
</html>