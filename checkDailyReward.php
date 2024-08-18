<?php
error_reporting(E_ERROR | E_PARSE);
include "db.php";
$now = time();
$lox = $_POST['udid'];
$pendos = $_GET['udid'];
if($lox != ""){
$udid = $_POST['udid'];
}else if($pendos != ""){
$udid = $_GET['udid'];
}else{
echo -1;
exit(-1);
}
$day = 0;
$daycheck = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM rewards WHERE udid='$udid'"));
foreach($daycheck as $no){$day += 1;}
$timecheck = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `rewards` WHERE udid='$udid' ORDER BY id DESC;"));
$lasttime = $timecheck['time'];
$check = $lasttime + 86400;
if($lasttime != ""){if($check >= $now){echo "0_{$day}"; exit();}else{$day += 1;}}else{$day += 1;}
if($day >= 5){echo "0_{$day}"; exit();}
mysqli_query($conn, "INSERT INTO rewards (udid,time) VALUES ('$udid','$now')");
echo "1_{$day}";