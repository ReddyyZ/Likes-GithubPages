<?php
$fd = fopen("likes.json", 'r');
$likes = fread($fd,4096);
fclose($fd);

echo $likes;
?>