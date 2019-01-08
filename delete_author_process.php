<?php
require_once ('lib/sql.php');
require_once ('lib/error.php');

$conn=connection();
settype($_POST['id'], 'integer');
$filtered_id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = "
  DELETE FROM topic
  WHERE author_id = {$filtered_id}
";
$result = mysqli_query($conn, $sql);
$sql = "
  DELETE FROM author
    WHERE id = {$filtered_id}
  ";
$result = mysqli_query($conn, $sql);
if($result === false)
  write_error_log();
else
  header('Location: /author.php');
?>
