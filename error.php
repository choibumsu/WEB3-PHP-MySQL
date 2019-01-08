<?php
require_once ('lib/sql.php');

function write_error_log(){
  $conn=connection();
  echo 'error';
  error_log(mysqli_error($conn));
}
?>
