<?php
$article = $_GET['article'];
if (!isset($article)){ exit(1); }

$fd = fopen("likes.json", "r");
$likes = fread($fd,4096);
fclose($fd);

$likes = json_decode($likes);

if (in_array($_SERVER["REMOTE_ADDR"], $likes->$article)){
	echo "in array";
    exit(1);
}

var_dump($likes);
if (!isset($likes->$article)) { $likes->$article = []; }


array_push($likes->$article, $_SERVER["REMOTE_ADDR"]);

$fd = fopen("likes.json", "w");
fwrite($fd, json_encode($likes));
fclose($fd);
?>