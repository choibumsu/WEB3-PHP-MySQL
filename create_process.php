<?php
$conn=mysqli_connect("localhost", "root", "111111", "topic");
$sql = "
  INSERT INTO bumsu
    (title, description, created)
    VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW()
      )
  ";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo 'error';
  error_log(mysqli_error($conn));
}
else {
  echo 'success. <a href="index.php">돌아가기</a>';
}
?>
