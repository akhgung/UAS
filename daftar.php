<?php error_reporting(E_ALL); 
include('koneksi.php'); 
include('login_session.php');
$title = 'Data admin'; 
if (isset($_POST['submit'])) { 
    $user =$_POST['username']; 
    $password =$_POST['password']; 
    $nama =$_POST['nama'];
    $alamat =$_POST['alamat'];

    $sql = 'INSERT INTO users (username,password,nama,alamat)'; 
    $sql .= " value ('{$user}','{$password}','{$nama}','{$alamat}')"; 
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
    <h2>Tambah User</h2> 
    <form class="" action="daftar.php" method="post" enctype="multipart/form-data" /> 
      <div class="input"> 
        <label>Nama</label> 
        <input type="text" name="nama" /> 
      </div> 
      <div class="input"> 
        <label>Alamat</label> 
        <input type="text" name="alamat" /> 
      </div> 

      <div class="input"> 
        <label>Username</label> 
        <input type="text" name="username" /> 
      </div> 

          <div class="input"> 
            <label>Password</label> 
            <input type="password" name="password" placeholder="************">
          </div> 
          <div class="submit"> 
            <input type="submit" class="btn btn-large" name="submit" value="simpan" />
          </div>
        </form>
    </div>
  </div>
</div>