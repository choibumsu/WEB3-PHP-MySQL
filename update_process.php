<?php
require_once ('lib/sql.php');
require_once ('lib/error.php');

$conn=connection();
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
if($result === false)
  write_error_log();
else {
  $sql = "SELECT * FROM topic WHERE id={$filtered['id']}";
  $row = excute_sql($sql);
  header('Location: /index.php?id='.$row['id']);
}
?>
