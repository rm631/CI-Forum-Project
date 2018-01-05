<!DOCTYPE html>
<html>
<head>
<title><?php echo $results[0]['user_username'] ?>'s feed</title>
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
.feedTable {
	padding-left: 3vw;
	padding-right: 3vw;
	padding-top: 1vh;
}
.feedColumns td {
	background-color: #000000;
	font: bold;
}
table, th, td {
    border-left: 2px solid #f3f3f3;
	border-right: 2px solid #f2f2f2;
    border-collapse: collapse;
	
	width: 100%;
	
}
table {
	table-layout: fixed;
}
th, td {
    padding: 5px;
}
td {
	word-wrap: break-word;
}
tr:nth-child(even) {
	background-color: #f2f2f2
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
		<h2><?php echo $results[0]['user_username'] ?>'s feed</h2>
	</div>
	
	<div class="feedTable">
		<table>
			<tr>
					<td style="font-weight: bold">Username</td>
					<td style="font-weight: bold">Post</td>
					<td style="font-weight: bold">Posted At</td>
			</tr>
			<?php foreach($results as $row) {?>
			<tr>
				<td><a href="http://raptor.kent.ac.uk/proj/co539c/microblog/rm631/index.php/user/view/<?php echo $row['user_username'] ?>"><?php echo $row['user_username']; ?></a></td>
				<td><?php echo $row['text']; ?></td>
				<td><?php echo $row['posted_at']; ?></td>
			</tr>
			<?php } ?>
	</div>
</body>

</html>