<?php 
error_reporting(E_ERROR | E_PARSE);
include "db.php";
$referal = 0;
$refidexis = 0;
$lox = $_POST['udid'];
$pendos = $_GET['udid'];
$pidoras = $_POST['refID'];
$gandon = $_GET['refID'];
if($lox != ""){$udid = $_POST['udid'];}else if($pendos != ""){$udid = $_GET['udid'];}else{echo -1; exit(-1);}
if($pidoras != ""){$refID = $_POST['refID'];}else if($gandon != ""){$refID = $_GET['refID'];}else{echo -1; exit(-1);}
$refcheck = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM referral WHERE reffer_udid='$udid'"));
foreach($refcheck as $no){$refferal += 1;}
if($refferal == 0){
$refidcheck = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*),udid FROM users WHERE refID='$refID'"));
if($refidcheck["count(*)"] != 0){
if($refidcheck["udid"] != $lox){
echo 1; 
mysqli_query($conn, "INSERT INTO referral (refID, reffer_udid) VALUES ('$refID','$udid')");
}else{
echo "kE03";
}
}else{
echo "kE02";
}
}else{echo "kE01";}
#echo "kE01";
#echo "kE02";
#echo "kE03";