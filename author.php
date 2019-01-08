<?php
require_once ('lib/print.php');
require_once ('lib/sql.php');
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
      <td>id</td><td>name</td><td>profile</td><td></td><td></td>
      <?php
      $conn=connection();
      $sql="SELECT * FROM author";
      $res = mysqli_query($conn, $sql);
      while($row=mysqli_fetch_array($res)){
        $filtered = array(
          'id' => htmlspecialchars($row['id']),
          'name' => htmlspecialchars($row['name']),
          'profile' => htmlspecialchars($row['profile'])
        );
        ?>
        <tr>
          <td><?=$filtered['id']?></td>
          <td><?=$filtered['name']?></td>
          <td><?=$filtered['profile']?></td>
          <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
          <td>
            <form action="delete_author_process.php" method="post" onsubmit="if(confirm('sure?')){return flase;}">
              <input type="hidden" name='id' value=<?=$filtered['id']?>>
              <input type="submit" value="delete">
            </form>
          </td>
        </tr>
        <?php
      }
      ?>
    </tr>
  </table>
  <?php
  $lable_submit = 'Create_author';
  $form_action = "create_author_process.php";
  $form_id = '';
  $escaped = array (
    'name' => '',
    'profile' => ''
  );
  if(isset($_GET['id'])) {
    $conn=connection();
    $filtered_id=mysqli_real_escape_string($conn, $_GET['id']);
    settype($filtered_id, 'integer');
    $sql="SELECT * FROM author WHERE id={$filtered_id}";
    $row = excute_sql($sql);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['profile'] = htmlspecialchars($row['profile']);
    $lable_submit = 'Update_author';
    $form_action = "update_author_process.php";
    $form_id = '<p><input type="hidden" name="id" value="'.$filtered_id.'">';
  }
  ?>
  <form action=<?=$form_action?> method="post">
    <?=$form_id?>
    <p><input type="text" name="name" placeholder="name" value=<?=$escaped['name']?>></p>
    <p><textarea name="profile" placeholder="profile"><?=$escaped['profile']?></textarea></p>
    <p><input type="submit" value=<?=$lable_submit?>></p>
  </form>
<?php
require_once ('view/bottom.php');
?>
