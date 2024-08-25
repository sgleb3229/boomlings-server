<?php 
error_reporting(E_ERROR | E_PARSE);
include "db.php";
include "checker.php";
$newref = 0;
$allref = 0;
$refer = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE udid='$udid';"));
$refID = $refer['refID'];
$checknew = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM `referral` WHERE refID='$refID' AND seen=0;"));
$checkall = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM `referral` WHERE refID='$refID';"));
echo "{$checknew['count(*)']};{$checkall['count(*)']}";
if($checknew['count(*)'] >= 1){
mysqli_fetch_array(mysqli_query($conn, "UPDATE referral SET seen=1 WHERE refID='$refID'"));
}