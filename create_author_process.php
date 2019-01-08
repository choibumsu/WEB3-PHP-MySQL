<?php
require_once ('lib/sql.php');
require_once ('lib/error.php');

$conn=connection();
$filtered = array(
  'name' => mysqli_real_escape_string($conn, $_POST['name']),
  'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
);
$sql = "
  INSERT INTO author
    (name, profile)
    VALUES(
      '{$filtered['name']}',
      '{$filtered['profile']}'
      )
  ";
$result = mysqli_query($conn, $sql);
if($result === false)
  write_error_log();
else
  header('Location: /author.php');
?>
