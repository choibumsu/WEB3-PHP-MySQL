<?php
require_once ('lib/print.php');
require_once ('view/top.php');
?>
  <form action="create_process.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p><?php author_list(); ?><p>
    <p><input type="submit"></p>
  </form>
<?php
require_once ('view/bottom.php');
?>
