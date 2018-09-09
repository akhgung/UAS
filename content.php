<?php
  include_once 'koneksi.php';
  include_once 'head.php';
  //include('login_session.php');
  $title = 'kategori';
  $sql = 'SELECT * FROM barang';
  $result = mysqli_query($conn, $sql);
 ?>
<?php
$sql_count = "SELECT COUNT(*) FROM barang";
if (isset($sql_where)) {
  $sql .= $sql_where;
  $sql_count .= $sql_where;
}
$result_count = mysqli_query($conn, $sql_count);
$count = 0;
if ($result_count){
  $r_data = mysqli_fetch_row($result_count);
  $count = $r_data[0];
}
$per_page = 6;
$num_page = ceil($count / $per_page);
$limit = $per_page;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $offset = ($page - 1) * $per_page;
}else{
  $offset = 0;
  $page = 1;
}
$sql .= " LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);
?>
<div class="container">
    
          <div class="row">
            <?php while($row = mysqli_fetch_array($result)): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo "{$row['gambar']}" ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="view.php?id=<?php echo $row['id_barang'];?>" class="btn btn-default">View detail</a>
                  </h4>
                  <h5>Harga : <?php echo number_format($row['harga_jual'], 2, ',', '.');?></h5>
                </div>
              </div>       
            </div>
           <?php endwhile; ?>
               
  </div>


 <ul class="pagination">
       <li><a href="index.php?page=<?php echo $page-1;?>">&laquo;</a></li>
       <?php for ($i=1; $i <=$num_page; $i++) {
         $link = "?page={$i}";
         if (!empty($q)) $link .= "&q={$q}";
         $class = ($page == $i ? 'active' : '');
         echo "<li><a class=\"{$class}\" href=\"{$link}\">{$i}</a></li>";
                } ?>
                </li>
                <li><a href="index.php?page=<?php echo $page+1;?>">&raquo;</a></li>
              </ul>
                <!-- LINK NUMBER -->
            
            