<?php
session_start();
$db=mysqli_connect("localhost","root","","amul");

if(isset($_POST['submit']))
{
	$id=$_POST['u_id'];
	$firstname=$_POST['u_fname'];
	$lastname=$_POST['u_lname'];
	$gender=$_POST['u_gender'];
	$username=$_POST['u_username'];
	$password=md5($_POST['u_password']);

	$sql="select * from user_reg where u_username='$username'";
	$run=mysqli_query($db,$sql);
	if(mysqli_num_rows($run)>0)
	{	?>
		<script>alert("username exists");</script>
		<?php
	}	
	else
	{
		echo $get_row;	
		$sql="insert into user_reg(u_fname,u_lname,u_gender,u_username,u_password)
		values('$firstname','$lastname','$gender','$username','$password')";
		mysqli_query($db,$sql);
		$_SESSION['u_username']=$username;
		header("location:welcome.php");
		
	}
}
?>


<!doctype html>
<html>
<head>
	<title>Register User</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="header">
	<h1>REGISTER USER</h1></div>
	<form method="post" enctype="multipart/form_data">
	<table>
		<tr>
			<td>First Name: </td>
			<td><input type="text" name="u_fname" class="textInput"required></td>
		</tr>
		<tr>
			<td>Last Name: </td>
			<td><input type="text" name="u_lname" class="textInput" required></td>
		</tr>
		<tr>
			<td>Gender: </td>
			<td><input type="radio" name="u_gender" value="Male" width=25%/>Male</td> 
			<td><input type="radio" name="u_gender" value="Female" width=25%/>Female</td> 
			<td><input type="radio" name="u_gender" value="Others" width=25%/>Others</td> 
		</tr>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="u_username" class="textInput"required></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="text" name="u_password" class="textInput"required></td>
		</tr>
		<tr>	
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Register"></td>
			<td><a href='login.php'>Sign In Instead</a></td>
		</tr>
	</table>
	</form>
</body>
</html>