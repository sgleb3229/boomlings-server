<?php
if(isset($_POST['udid'])){
$udid = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 -]/', '', urldecode(html_entity_decode(strip_tags($_POST['udid']))))));
}else if(isset($_GET['udid'])){
$udid = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 -]/', '', urldecode(html_entity_decode(strip_tags($_GET['udid']))))));
}else{
echo -1; exit(-1);}
if($needrefid == "true"){
if(isset($_POST['refID'])){
$refID = trim(preg_replace('/ +/', '', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags(substr($_POST['refID'], 0, 10)))))));
}else if(isset($_GET['refID'])){
$refID = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 -]/', '', urldecode(html_entity_decode(strip_tags(substr($_GET['refID'], 0, 10)))))));
}else{
echo -1; exit(-1);}
}
if($needname == "true"){
if(isset($_POST['name'])){
$name = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 -]/', '', urldecode(html_entity_decode(strip_tags(substr($_POST['name'], 0, 10)))))));
}else if(isset($_GET['name'])){
$name = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 -]/', '', urldecode(html_entity_decode(strip_tags(substr($_GET['name'], 0, 10)))))));
}else{
echo -1; exit(-1);}
}
if($needscore == "true"){
if(isset($_POST['score'])){
$score = trim(preg_replace('/ +/', '', preg_replace('/[^0-9]/', '', urldecode(html_entity_decode(strip_tags($_POST['score']))))));
}else if(isset($_GET['score'])){
$score = trim(preg_replace('/ +/', '', preg_replace('/[^0-9]/', '', urldecode(html_entity_decode(strip_tags($_GET['score']))))));
}else{
echo -1; exit(-1);}
}
if($needcontext == "true"){
if(isset($_POST['context'])){
$context = trim(preg_replace('/ +/', '', preg_replace('/[^0-9]/', '', urldecode(html_entity_decode(strip_tags($_POST['context']))))));
}else if(isset($_GET['context'])){
$context = trim(preg_replace('/ +/', '', preg_replace('/[^0-9]/', '', urldecode(html_entity_decode(strip_tags($_GET['context']))))));
}else{
echo -1; exit(-1);}
}