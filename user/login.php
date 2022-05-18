<?php
session_start();
$db=mysqli_connect("localhost","root","","amul");

if(isset($_POST['login']))
{

	$username=$_POST['u_username'];
	$password=md5($_POST['u_password']);
	$sql="select * from user_reg where u_username='$username' and u_password='$password'";
	$result=mysqli_query($db,$sql);
	$total=mysqli_num_rows($result);
	if($total==1)
	{
		$_SESSION['u_username']=$username;
		header("location:welcome.php");
	}
	else
	{	?>
		<script>
			alert("username or password is incorrect");
		</script>
		<?php
	}
}
?>

<!doctype html>
<html>
<head>
	<title>Login User</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="header">
	<h1>LOGIN USER</h1></div>
	<form method="post">
	<table>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="u_username" class="textInput"required></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="text" name="u_password" class="textInput"required></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Login"></td>
			<td><a href='user_registration.php'>Don't have an account? Register here!</td>
		</tr>
	</table>
	</form>
</body>
</html>