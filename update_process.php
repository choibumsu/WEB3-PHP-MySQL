<?php
$conn=mysqli_connect("localhost", "root", "111111", "bumsu");

settype($_POST['id'], 'integer');
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE id = {$filtered['id']}
  ";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo 'error';
  error_log(mysqli_error($conn));
}
else {
  $sql = "SELECT * FROM topic WHERE id={$filtered['id']}";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($res);
  header('Location: /index.php?id='.$row['id']);
}
?>
