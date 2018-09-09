<?php 
error_reporting(E_ALL);
include('koneksi.php');
//include(login_session.php);
$title = 'Data Barang';
$id = $_GET['id'];
$sql = "SELECT * FROM barang WHERE id_barang = '{$id} '";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia'); 
$data = mysqli_fetch_array($result);

function is_select($var, $val){

	if ($var==$val) return 'selected="selected"';
	return false;
}
include('header.php');
//include('nav.php');

 ?>
 <div class="content_b">
 	<div class="main">
 		
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><?php echo $data['nama_barang']; ?></h1>

      <!-- Portfolio Item Row -->
      <div class="row">
        
        <div class="col-md-8">
          <a href="#"><img class="card-img-top" <?php echo "<img src=\"{$data['gambar']}\" />"; ?></a>
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Harga</h3>
          <td class="right"><?php echo number_format($data['harga_jual'],2,',','.'); ?></td>

          <h3 class="my-3">Stok Tersedia</h3>
          <td class="right"><?php echo $data['stok'];?>  Unit</td>


           
          <h3 class="my-3">Deskripsi Product</h3>
          <ul>
            <li><?php echo $data['deskripsi']; ?></li>
          </ul>
        </div>

      </div>
		<div class="daftar">
			<h3>Silakan Order</h3>
			<hr> <br/>
			<p>
				Nama   : Akhmad Agung Nugroho <br>
				No Telp : 081294402865 <br>
				No Rekening (cimb niaga) ; 7021 5465 3900 <br>
				a/n Akhmad Agung Nugroho <br>
			</p>
		</div>
 		
 	</div>
 	</div>
 </div>
 <?php include_once('footer.php') ?>