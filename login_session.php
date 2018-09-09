 <?php
session_start();

if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] === false) {
	header("location:login.php");
	exit();
}
?>