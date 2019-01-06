<?php
function print_title() {
  if(isset($_GET['id'])) {
    $conn=mysqli_connect("localhost", "root", "111111", "bumsu");
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    echo $row['title'];
  }
  else
    echo "Bumsu's Home";
}
function print_list() {
  $conn=mysqli_connect("localhost", "root", "111111", "bumsu");
  $sql = "SELECT * FROM topic";
  $res = mysqli_query($conn, $sql);
  $list ='';
  while($row=mysqli_fetch_array($res))
    $list=$list."<li> <a href=\"index.php?id={$row['id']}\" title=\"{$row['title']} page\">{$row['title']}</a> </li>";
  echo $list;
}
function print_desc() {
  if(isset($_GET['id'])) {
    $conn=mysqli_connect("localhost", "root", "111111", "bumsu");
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    echo $row['description'];
  }
  else
    echo "This is a <u>Bumsu's Home</u>";
}
?>
