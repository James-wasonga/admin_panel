<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AgroCare Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="./styles/style.css">
 
</head>
<body>
<div class="contents log">
<div class="top">
<p class="name">AgroCare</p>
<p>nutrients intelligent</p>
</div>
<?php
$con = mysqli_connect("localhost","root","");
if(!$con){
	echo "Connection to the database failed";
}
mysqli_select_db($con,"agrocare");
if(isset($_POST['username'])){
	$user = $_POST['username'];
	$passwd = $_POST['passwd'];
	$users = mysqli_query($con,"SELECT * from admin where email = '$user'");
	if(mysqli_num_rows($users) > 0){
		$row = mysqli_fetch_array($users);
		if($passwd == $row["password"]){
			echo "login successful";
			$_SESSION['mail'] = $row['email'];
			$_SESSION['name'] = $row['uName'];
			header("location: index.php");
		}else{
			echo "<script> alert('Incorrect password')</script>";
		}
	}else{
		echo "<script> alert('The user does not exist')</script>";
	}

}

?>
<p class="details"><b>Sign in To AgroCare Portal</b><br/><?php ?></p>
<form class="form" method="POST" action="login.php">
<input type="text" name="username" placeholder="Email or Username"><br/>
<input type="password" name="passwd" placeholder="Password">
<p class="p"><a class="forgot" href="forgotPassword.php">Forget Password</a></p>
<button id="sbmt" type="submit">Login</button>
</form>
<?php
mysqli_close($con);

?>



<hr/>
</div>
</body>
</html>
