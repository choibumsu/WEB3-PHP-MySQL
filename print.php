<?php
function print_title() {
  if(isset($_GET['id'])) {
    $conn=mysqli_connect("localhost", "root", "111111", "bumsu");

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $escaped_title = htmlspecialchars($row['title']);
    echo $escaped_title;
  }
  else
    echo "Bumsu's Home";
}
function print_list() {
  $conn=mysqli_connect("localhost", "root", "111111", "bumsu");
  $sql = "SELECT * FROM topic";
  $res = mysqli_query($conn, $sql);
  $list ='';
  while($row=mysqli_fetch_array($res)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list=$list."<li> <a href=\"index.php?id={$row['id']}\" title=\"{$escaped_title} page\">{$escaped_title}</a> </li>";
  }
  echo $list;
}
function print_desc() {
  if(isset($_GET['id'])) {
    $conn=mysqli_connect("localhost", "root", "111111", "bumsu");

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $escaped_desc = htmlspecialchars($row['description']);
    echo $escaped_desc;
  }
  else
    echo "This is a <u>Bumsu's Home</u>";
}
?>
