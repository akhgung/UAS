<?php error_reporting(E_ALL); 
include('koneksi.php'); 
include('login_session.php');
$title = 'Data Barang'; 
if (isset($_POST['submit'])) { 
	$nama = $_POST['nama_barang']; 
	$kategori =$_POST['kategori']; 
	$harga_jual=$_POST['harga_jual']; 
	$harga_beli=$_POST['harga_beli']; 
	$deskripsi=$_POST['deskripsi']; 
	$stok=$_POST['stok']; 
	$file_gambar=$_FILES['file_gambar']; 
	$gambar = null; 

	if ($file_gambar['error'] ==0) { 
		$filename = str_replace('','_', $file_gambar['name']); 
		$destination = dirname(__FILE__).'/gambar/'.$filename; 
		if(move_uploaded_file($file_gambar['tmp_name'],$destination))
		{
		$gambar='gambar/'.$filename;
		}
} 

	$sql = 'INSERT INTO barang (nama_barang, id_kategori, harga_jual, harga_beli, deskripsi, stok, gambar)'; 
	$sql .= " value ('{$nama}','{$kategori}','{$harga_jual}','{$harga_beli}','{$deskripsi}','{$stok}','{$gambar}')"; 
	$result =mysqli_query($conn, $sql);

	 //if ($result) {
	 //die(mysqli_error($conn)); 
	//header ('location: barang.php');
	 } 


include 'nav.php';
include('sidebar.php'); 
?> 

<div class="content_a"> 
	<div class="daftar"> 
	<div class="main"> 
		<h2>Tambah Barang</h2> 
		<form class="" action="form_barang.php" method="post" enctype="multipart/form-data" /> 
			<div class="input"> 
				<label>Nama Barang</label> 
				<input type="text" name="nama_barang" /> 
			</div> 
			<div class="input"> 
				<label>Kategori</label> 
				<select name="kategori"> 
					<?php include_once 'koneksi.php'; 
					$sql = 'SELECT * FROM kategori'; 
					$result = mysqli_query($conn, $sql); 
					?> 
					<?php while ($row = mysqli_fetch_array($result)): ?> 
						<option value="<?php echo $row ['id_kategori'];?>"><?php echo $row['nama_kategori'];?> </option> 
						<?php endwhile; ?> 
						</select> 
					</div> 

					<div class="input"> 
						<label>Harga Jual</label> 
						<input type="text" name="harga_jual" /> 
					</div> 
					<div class="input"> 
						<label>Harga Beli</label> 
						<input type="text" name="harga_beli" /> 
					</div>
					<div class="input"> 
						<label>Stok</label> 
						<input type="text" name="stok" /> 
					</div> 
					<div class="input"> 
						<label>Deskripsi</label> 
						<textarea type="text" name="deskripsi" /> </textarea>
					</div> 
					<div class="input"> 
						<label>File Gambar</label> 
						<input type="file" name="file_gambar"> 
					</div> 
					<div class="submit"> 
						<input type="submit" class="btn btn-large" name="submit" value="simpan" />
					</div>
				</form>
		</div>
	</div>
</div>
