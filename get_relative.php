<?php 
error_reporting(E_ERROR | E_PARSE);
$needscore = "true";
$needrefID = "false";
$needcontext = "true";
$needname = "true";
include "db.php";
include "checker.php";
$usercheck = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*),score,context FROM users WHERE udid='$udid'"));
if($usercheck["count(*)"] == 0){
mysqli_query($conn, "INSERT INTO users (udid,score,context,name) VALUES ('$udid',$score,$context,'$name')");
}else{
$dbscore = $usercheck["score"];
$dbcontext = $usercheck["context"];
if($dbscore < $score){
mysqli_query($conn, "UPDATE users SET score=$score, context=$context, name='$name' WHERE udid='$udid'");
}else if($dbcontext < $context){
mysqli_query($conn, "UPDATE users SET context=$context, name='$name' WHERE udid='$udid'");
$score = $dbscore;
}else{
mysqli_query($conn, "UPDATE users SET name='$name' WHERE udid='$udid'");
$score = $dbscore;
$context = $dbcontext;
}
}
$sql = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `users` WHERE score>'$score' AND banan=0 ORDER BY score DESC;"));
$sql1 = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `users` WHERE score<'$score' AND banan=0 ORDER BY score DESC;"));
$rank = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM users WHERE score>'$score' AND score>'1010000000'"));
echo "{$rank['count(*)']}__ ";
#echo "0__ ";
foreach ($sql as $nado) {
echo "{$nado[4]};{$nado[1]};{$nado[2]};{$nado[3]} ";
}
echo "{$name};{$udid};{$score};{$context} ";
foreach ($sql1 as $nado) {
echo "{$nado[4]};{$nado[1]};{$nado[2]};{$nado[3]} ";
}