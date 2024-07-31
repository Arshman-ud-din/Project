<?php
include('connection.php');

$get_id = $_GET['id'];

if (true) {
    $update_query_run = mysqli_query($conn ,"UPDATE `book_appointment` SET `vaccinated`= 0 WHERE b_id = '$get_id'");

    echo "<script> alert('Not Vaccianted')</script>";

    header('location:updatechild.php');

}




