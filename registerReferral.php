<?php 
error_reporting(E_ERROR | E_PARSE);
$needrefid = true;
include "db.php";
include "checker.php";
$referal = 0;
$refidexis = 0;
$refcheck = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM referral WHERE reffer_udid='$udid'"));
foreach($refcheck as $no){$refferal += 1;}
if($refferal == 0){
$refidcheck = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*),udid FROM users WHERE refID='$refID'"));
if($refidcheck["count(*)"] != 0){
if($refidcheck["udid"] != $udid){
echo 1; 
mysqli_query($conn, "INSERT INTO referral (refID, reffer_udid) VALUES ('$refID','$udid')");
}else{
echo "kE03";
}
}else{
echo "kE02";
}
}else{echo "kE01";}