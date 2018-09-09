<?php
error_reporting(E_ALL);
include('koneksi.php');

include('head.php');
include('login_session.php');
$title = 'Data Barang';
if (isset($_POST['submit'])) {
$id= $_POST['id'];
$nama= $_POST['nama_barang'];
$kategori= $_POST['kategori'];
$harga_jual= $_POST['harga_jual'];
$harga_beli= $_POST['harga_beli'];
$stok= $_POST['stok'];
$deskripsi= $_POST['deskripsi'];
$file_gambar= $_FILES['file_gambar'];
$gambar = null;

if($file_gambar['error'] ==0){
$file_name= str_replace('','_',$file_gambar['name']);
$destination= dirname(__FILE__).'/gambar/'.$file_name;
if(move_uploaded_file($file_name['tmp_name'], $destination))
{
$gambar='gambar/'.$file_name;
}
}
$sql= 'UPDATE barang SET ';
$sql .= "nama_barang ='{$nama}', id_kategori ='{$kategori}', deskripsi='{$deskripsi}', ";
$sql .= "harga_jual='{$harga_jual}', harga_beli='{$harga_beli}', stok='{$stok}' ";
if (!empty($gambar))
$sql .= ", gambar='{$gambar}' ";
$sql .= "WHERE id_barang ='{$id}' ";
$result = mysqli_query($conn, $sql);
if (!$result)die(mysqli_error($conn));
header ('location: data_barang.php');
}
$id=$_GET['id'];
$sql =" SELECT * From barang WHERE id_barang = '{$id}' ";
$result = mysqli_query($conn, $sql);
if (!$result)die('Error:Data Tidak Tersedia');
$data = mysqli_fetch_array($result);
function is_select($var, $val) {
if($var == $val ) return 'selected="selected"';
return false;
}
include('nav.php');
include ('sidebar.php');
?>
<div class="content_a">
<div class="daftar">
<div class="main">
<h2> Edit Barang</h2>
<form class="" action="edit_barang.php" method="post"
enctype="multipart/form-data" />
<div class="input">
<label>Nama Barang</label>
<input type="text" name="nama_barang" value="<?php
echo $data['nama_barang']; ?>" />
</div>
<div class="input">
<label>Kategori</label>
<select name="kategori">
<?php
include_once('koneksi.php');
$sql =' SELECT * From kategori';
$result = mysqli_query($conn, $sql);
?>
<?php while ($row=mysqli_fetch_array($result)): ?>
<option value="<?php echo
$row['id_kategori'];?>"> <?php echo $row['nama_kategori'];?></option>
<?php endwhile; ?>
</select>
</div>
<div class="input">
<label>Harga Jual</label>
<input type="text" name="harga_jual"
value="<?php echo $data['harga_jual'];?>" />
</div>
<div class="input">
<label>Harga Beli</label>
<input type="text" name="harga_beli"
value="<?php echo $data['harga_beli'];?>" />
</div>
<div class="input">
<label>Deskripsi</label>
<textarea type="text" name="deskripsi" > <?php
echo $data['deskripsi']; ?> </textarea>
</div>
<div class="input">
<label>Stok</label>
<input type="text" name="stok" value="<?php
echo $data['stok'];?> " />
</div>
<div class="input">
<label>File Gambar</label>
<input type="file" name="file_gambar" />
</div>
<div class="submit">
<input type="hidden" name="id" value="<?php
echo $data['id_barang']; ?> " />
<input type="submit" name="submit" class="btn
btn-large" value="Edit" />
</div>
</form>
</div>
</div>
</div>