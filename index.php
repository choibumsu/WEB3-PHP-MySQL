<?php
require_once ('lib/print.php');
require_once ('view/top.php');
?>
  <a href="create.php" title="create">create</a>
  <?php if(isset($_GET['id'])) { ?>
          <a href="update.php?id=<?=$_GET['id']?>" title="update">update</a>
          <form action="delete_process.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <input type="submit" value="delete">
          </form>
  <?php } ?>

  <h2>
    <?php    print_title();    ?>
  </h2>
  <p>
    <?php    print_desc();    ?>
  </p>
<?php
require_once ('view/bottom.php');
?>
