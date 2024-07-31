<?php
include('connection.php');
session_start();


$select_query = "SELECT * FROM book_appointment
INNER JOIN childinfo
ON  book_appointment.child_name =  childinfo.id   

INNER JOIN parent_register
ON   book_appointment.Pname = parent_register.id 

INNER JOIN addvaccine
ON   book_appointment.Vname = addvaccine.id";
$run = mysqli_query($conn ,$select_query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Appointments</title>

</head>
<body>

<?php include('h_sidebar.php') ?>



<div class="container">
<table class ="table table-bordered ">
   
<tr class = "border border-dark">

<th>child name</th>
<th>Parent Name</th>
<th>hospital Name</th>
<th>vaccination Name</th>
<th>Appointment Date</th>
<th>Accept/Reject</th>





</tr>


<?php  
        while ($row = mysqli_fetch_array($run)) { 

            if ($row['request'] == '0' OR  $row['request'] == '' OR $row['vaccinated'] == '1') {
                
                    
               
        ?>
         
      
            
            <?php 
         } else { ?>
            <tr> 
                
            <td> <?php echo $row['child_name'] ?> </td>
            <td> <?php echo $row['Pname'] ?> </td>
            <td> <?php echo $row['Vname'] ?> </td>
            <td> <?php echo $row['Hname'] ?> </td>
            <td> <?php echo $row['appointment_date'] ?> </td>
            <td><a class="btn btn-primary" href="vaccinated.php?id=<?php echo $row['b_id'] ?>">Vaccinated</a>
            <a class="btn btn-danger" href="notvaccinated.php?id=<?php echo $row['b_id'] ?>">Not-Vaccianted</a></td>
        </tr>
      <?php    }}?>

           
                





</table>
</div>


    
</body>
</html>
