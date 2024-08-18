<?php 
error_reporting(E_ERROR | E_PARSE);
include "db.php";
function generateRandomString($length = 10) {$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; $charactersLength = strlen($characters); $randomString = ''; for ($i = 0; $i < $length; $i++) {$randomString .= $characters[random_int(0, $charactersLength - 1)];}return $randomString;}
$refID = generateRandomString(6);
$xzlol = 0;
$lox = $_POST['udid'];
$pendos = $_GET['udid'];
if($lox != ""){$udid = $_POST['udid'];}else if($pendos != ""){$udid = $_GET['udid'];}else{echo -1; exit(-1);}
$user = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `users` WHERE udid='$udid';"));
foreach($user as $no){$xzlol += 1;}
if($xzlol == 0){mysqli_query($conn, "INSERT INTO users (udid,refID) VALUES ('$udid','$refID')");}else{$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE udid='$udid';")); $ref = $user['refID'];
if($ref == ""){mysqli_query($conn, "UPDATE user SET referral_code = '$refID' WHERE udid = '$udid'");}else{$refID = $ref;}}
echo $refID;