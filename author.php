<?php
require_once ('lib/print.php');
?>

<!doctype html>
<html>
<head>
  <title>
    <?php    print_title();    ?>
  </title>
  <meta charset="uft-8">
</head>
<body>
  <h1> <a href="index.php" title="home">Bumsu_Home</a></h1>
  <p><a href="index.php">topic</a></p>
  <table border="1">
    <tr>
      <td>id</td><td>name</td><td>profile</td>
    </tr>
  </table>
<?php
require_once ('view/bottom.php');
?>
