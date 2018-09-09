<?php
include_once 'koneksi.php';
include 'nav.php';
$title ='kategori';
$sql='SELECT * FROM kategori';
$result = mysqli_query($conn, $sql);

include('sidebar.php');
include('login_session.php');
?>

<div class="content_a">
	<div class="main">
		<?php

		echo '<a href="form_kategori.php" class="btn btn-large"> Tambah kategori</a>';
		?>
		<table>
			<th> Nama Kategori </th>
			<th>Aksi</th>
			<?php while ($row =mysqli_fetch_array($result)):?> 
			<tr>
				<td> <?php echo $row['nama_kategori']; ?></td>
				<td>
					<a class="btn btn-default" href="edit_kategori.php?id=<?php echo $row['id_kategori'];?>">Edit</a>
					<a class="btn btn-alert" onclick="return confirm('Yakin akan Menghapus data?');"
					href="hapus_kategori.php?id=<?php echo $row['id_kategori'];?>">Delete</a>
				</td>
			</tr>
		<?php endwhile; ?>
		</table>
	</div>
</div>
