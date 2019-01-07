<?php
$conn=mysqli_connect("localhost", "root", "111111", "bumsu");
$filtered = array(
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description']),
  'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
);
$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
      '{$filtered['title']}',
      '{$filtered['description']}',
      NOW(),
      {$filtered['author_id']}
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
