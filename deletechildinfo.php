<?php 
include('connection.php');
$id = $_GET['id'];
$query_delete="DELETE FROM `childinfo` WHERE id = '$id'";
$run =mysqli_query($conn , $query_delete);
if($run){
    header('location:allchilds.php');
}
?>