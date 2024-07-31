<?php
session_start();
session_unset();
$a = session_destroy();  
if($a){
header('location:login.php');
}
?>