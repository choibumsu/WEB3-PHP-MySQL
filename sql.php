<?php
function connection() {
  $conn = mysqli_connect("localhost", "root", "111111", "bumsu");
  return $conn;
}
function excute_sql($sql) {
  $conn = mysqli_connect("localhost", "root", "111111", "bumsu");
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($res);
  return $row;
}
?>
