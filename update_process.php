<?php
file_put_contents("data/".$_POST['old_title'], $_POST['description']);
rename('data/'.$_POST['old_title'], 'data/'.$_POST['title']);
header('Location: /index.php?id='.$_POST['title']);
?>
