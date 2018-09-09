$per_page = 3;
$num_page = ceil($count / $per_page);
$limit = $per_page;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $offset = ($page - 1) * $per_page;
}else{
  $offset = 0;
  $page = 1;
}