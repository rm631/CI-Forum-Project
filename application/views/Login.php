<!DOCTYPE html>
<html>
<head>
<title>login</title>
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
form {
	padding-left: 3vw;
	padding-right: 3vw;
	padding-top: 1vh;
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
	
	<?php if(isset($error)) {
		echo "Error: Username and/or password were incorrect! Please try again.";
	}?>
	
	<form action="doLogin" method="post">
		<input type="text" name="Username" placeholder="Username"><br>
		<input type="text" name="Password" placeholder="Password"><br>
		<input type="submit" value="Login">
	</form>
</body>	
</html>