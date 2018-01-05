<!DOCTYPE html>
<html>
<head>
<title>Post</title>
<style>
.nav {
  overflow: hidden;
  background-color: #333;
}
.nav a {
	float: left;
	display: block;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
}
.nav a:hover {
  background-color: #ddd;
  color: black;
}
#header {
	padding-left: 3vw;
	font-size: 3vh;
}
.form {
	padding-left: 3vw;
	padding-right: 3vw;
	padding-top: 1vh;
}
#post {
	width: 50vw;
}
</style>
</head>
<body>
	<div class="nav">
		<?php $username = $this->session->userdata('username');?>
		<?php if(isset($username)) { ?>
			<a href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/user/view/<?php echo $username = $this->session->userdata('username'); ?>"><?php echo $username ?>'s feed (Home)</a>
			<a style="float:right" href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/user/logout">logout</a>
		<?php } else { ?>
			<a href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/user/login">You are not logged in</a>
			<a style="float:right" href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/user/login">login</a>
		<?php } ?>
		<a href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/search">Search</a>
		<a href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/message">Message</a>
	</div>	
	<br>
	
	<div id="header">
		<h2>Message</h2>
	</div>
	
	<div class="form">
		<form action="message/doPost" method="post">
		<input type="text" name="Message" id="post" maxlength="256" placeholder="Type your post here...">
		<input type="submit" class="submitBtn" value="Post">
		</form>
	</div>
</body>	
</html>