<?php 
error_reporting(E_ERROR | E_PARSE);
include "db.php";
$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE score>1010000000 AND banan=0;");
$sql = mysqli_fetch_all($sql);
foreach ($sql as $nado) {
echo "{$nado[4]};{$nado[1]};{$nado[2]};{$nado[3]} ";
}