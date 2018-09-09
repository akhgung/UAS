<?php error_reporting(E_ALL);
include_once 'koneksi.php';
include('login_session.php');
$title = 'data kategori';
if ( isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$sql ='INSERT INTO kategori (nama_kategori)';
	$sql .="VALUE ('{$nama}')";
	$result = mysqli_query($conn, $sql);
		if (!$result) {
			die(mysqli_error($conn));
		}
		header('location: kategori.php');
}

include 'nav.php';
include('sidebar.php');
	?>

<div class="content_a">
<div class="main">
<h2> Tambah kategori</h2>
<form action="form_kategori.php" method="post" enctype="multipart/form-data">
	<div class="input">
		<label for=""> Nama Kategori</label>
		<input type="text" name="nama">

	</div>
		<div class="submit">
		<input type="submit" class="btn btn-large" name="submit" value="simpan" />
	</div>

	</form>
</div>
</div>

