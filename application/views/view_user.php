<!DOCTYPE html>
<html>
<head>
<title>View User</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head>
<body>
	<table>
		<tr>
			<th>Field</th>
			<th>Contents</th>
		</tr>
		<?php foreach($results as $row) {?>
		<tr>
			<td>ID</td>
			<td><?php echo $row['id']; ?></td</tr> 
		<tr>
			<td>Name</td>
			<td><?php echo $row['text']; ?></td>
		</tr>
		<?php } ?>		
	<table>
</body>	
</html>