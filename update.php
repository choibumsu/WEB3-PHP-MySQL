<?php
require_once ('lib/print.php');
require_once ('view/top.php');
?>
  <form action="update_process.php" method="post">
    <p><input type="hidden" name="old_title" value=<?=$_GET['id']?>></p>
    <p><input type="text" name="title" value="<?php print_title(); ?>"></p>
    <p><textarea name="description" placeholder="description"><?php print_desc(); ?></textarea></p>
    <p><input type="submit"></p>
  </form>
<?php
require_once ('view/bottom.php');
?>
