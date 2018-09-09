<?php
$titel="Login";
$error=null;
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
$user = $_POST['username'];
$passwd = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='{$user}' AND password='{$passwd}'";
$result = mysqli_query($conn, $sql);
if ($result && $result->num_rows > 0) {
session_start();
$_SESSION['isLogin']=1;
header('location: home.php');
} else
$error = "Username atau Password Salah.";
}

include_once 'header_login.php';
?>
<div id="login">
	<h2>Login Form</h2>
	<form action="" method="post">
	<label>Username :</label>
	<input id="name" name="username" placeholder="username" type="text">
	<label>Password :</label>
	<input id="password" name="password" placeholder="************" type="password">
	<input name="submit" type="submit" value=" Login ">
	<span><?php echo $error; ?></span>
	</form>
	</div>
	<?php
	include_once 'footer.php';
	?>
