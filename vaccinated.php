<?php
include('connection.php');

$get_id = $_GET['id'];

$s_query = "SELECT * FROM `book_appointment` WHERE b_id = '$get_id'";
$run = mysqli_query($conn , $s_query);

$fetch = mysqli_fetch_array($run);
$id = $fetch['Vname'] ;

$s_query1 = "SELECT * FROM `addvaccine` WHERE id = '$id'";
$runit = mysqli_query($conn , $s_query1);

$fetchdata = mysqli_fetch_array($runit);

$qty =$fetchdata['Vqty'] -1;


if (true) {
    $update_query_run = mysqli_query($conn ,"UPDATE `book_appointment` SET `vaccinated`= 1 WHERE b_id = '$get_id'");
    $update_query = "UPDATE `addvaccine` SET `Vqty`='$qty' WHERE id = $id";

$runaq = mysqli_query($conn , $update_query);


header('location:updatechild.php');
echo "<script> alert('Child is Vaccinated')</script>";


}













