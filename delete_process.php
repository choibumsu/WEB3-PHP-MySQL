<?php
$conn=mysqli_connect("localhost", "root", "111111", "bumsu");

settype($_POST['id'], 'integer');
$filtered_id = mysqli_real_escape_string($conn, $_POST['id']);

$sql = "
  DELETE FROM topic
    WHERE id = {$filtered_id}
  ";

$result = mysqli_query($conn, $sql);
if($result === false) {
  echo 'error';
  error_log(mysqli_error($conn));
}
else
  header('Location: /index.php');
?>
