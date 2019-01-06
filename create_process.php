<?php
$conn=mysqli_connect("localhost", "root", "111111", "bumsu");
$sql = "
  INSERT INTO topic
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
  $sql = "SELECT * FROM topic ORDER BY id DESC LIMIT 1";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($res);
  header('Location: /index.php?id='.$row['id']);
}
?>
