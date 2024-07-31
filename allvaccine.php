<?php
session_start();
include('connection.php');
$h_id = $_SESSION['hospital_id'];
$squery= "SELECT * FROM `addvaccine` WHERE H_id = '$h_id'";
$q_run = mysqli_query($conn , $squery);

if (isset($_SESSION['hospital_name']) || isset($_SESSION['parent_id'])) {

} else {
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>VACCINE AVAILABLE</title>

</head>

<body>

    <?php include('h_sidebar.php') ?>



    <div class="container">
        <table class="table table-bordered ">

            <tr class = "border border-dark">

                <th>vaccination Name</th>
                <th>vaccination Type</th>
                <th>Quantity Avaible</th>






            </tr>


            <?php  
        while ($row = mysqli_fetch_array($q_run )) { ?>

            <tr>

                <td> <?php echo $row['Vname'] ?> </td>
                <td> <?php echo $row['Vtype'] ?> </td>
                <td> <?php echo $row['Vqty'] ?> </td>
                
            </tr>
            <?php }?>








        </table>
    </div>



</body>

</html>