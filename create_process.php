<?php
require_once ('lib/sql.php');
require_once ('lib/error.php');

$conn=connection();
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
if($result === false)
  write_error_log();
else {
  $sql = "SELECT * FROM topic ORDER BY id DESC LIMIT 1";
  $row = excute_sql($sql);
  header('Location: /index.php?id='.$row['id']);
}
?>
