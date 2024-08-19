<?php 
#error_reporting(E_ERROR | E_PARSE);
error_reporting(2);
if(isset($_POST['udid'])){$udid = $_POST['udid'];}else if(isset($_GET['udid'])){$udid = $_GET['udid'];}else{echo -1; exit(-1);}
if(isset($_POST['name'])){$name = $_POST['name'];}else if(isset($_GET['name'])){$name = $_GET['name'];}else{echo -1; exit(-1);}
if(isset($_POST['score'])){$score = $_POST['score'];}else if(isset($_GET['score'])){$score = $_GET['score'];}else{echo -1; exit(-1);}
if(isset($_POST['context'])){$context = $_POST['context'];}else if(isset($_GET['context'])){$context = $_GET['context'];}else{echo -1; exit(-1);}
include "db.php";
$usercheck = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*),score FROM users WHERE udid='$udid'"));
if($usercheck["count(*)"] == 0){
mysqli_query($conn, "INSERT INTO users (udid,score,context,name) VALUES ('$udid',$score,$context,'$name')");
}else{
$dbscore = $usercheck["score"];
if($dbscore <= $score){
mysqli_query($conn, "UPDATE users SET score=$score, context=$context, name='$name' WHERE udid='$udid'");
}else{
mysqli_query($conn, "UPDATE users SET name='$name' WHERE udid='$udid'");
}
}
$sql = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `users` WHERE score>1010000000 AND banan=0 ORDER BY score DESC;"));
$rank = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM users WHERE score > $score"));
echo "{$rank['count(*)']}__ ";
#echo "0__ ";
foreach ($sql as $nado) {
echo "{$nado[4]};{$nado[1]};{$nado[2]};{$nado[3]} ";
}