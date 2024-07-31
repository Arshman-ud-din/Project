<?php
session_start();



use Dompdf\Dompdf;


require_once('./vendor/autoload.php');


 require('connection.php');

 
 


$P_id =$_SESSION['parent_id'];

 $select_query = "SELECT * FROM book_appointment
 INNER JOIN childinfo
 ON  book_appointment.child_name =  childinfo.id   
 
 INNER JOIN parent_register
 ON   book_appointment.Pname = parent_register.id 

 INNER JOIN hospital_register
 ON   book_appointment.Hname = hospital_register.id
 
 INNER JOIN addvaccine
 ON   book_appointment.Vname = addvaccine.id  WHERE book_appointment.Pname = $P_id" ;
 $run = mysqli_query($conn ,$select_query);
 
 
$fetchall = mysqli_fetch_array($run);

$html = 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Report</title>
    <style>
    body{
        border: 3px solid black;


    }


#customers {
  border-collapse: collapse;
  width: 100%;
  margin-top: 60px;
}

#customers td, #customers th {
    
  border: 1px solid black;
  padding: 10px;
  text-align:center;
}


#customers th {
  padding-top: 0px;
  padding-bottom: 12px;
  
  background-color: lightblue;
  color: black;
  margin-top: 30px;
}
.container {
    text-align: center;

}
.footer{
text-alighn:center;

}
thead{
    margin-top:50px;

}
</style>
</head>
<body>

    <div class="container text-center"><<img src="" alt="">
    <h2>
    <b>'.$fetchall['Hname'].' </b></h2>
    </hr>
    




    <table id = "customers" class="table ">
  <thead>
    <tr>
      <th scope="col">Child Name</th>
      <th scope="col">Parent Name</th>
      

    </tr>
  </thead>
  <tbody>

  <tr>
  <td>'. $fetchall['child_name'] .'</td>
  <td>'. $fetchall['Pname'] .'</td>
  

</tr>


</tbody>

<thead>
<tr>
  <th scope="col">Child Age</th>
  <th scope="col">Gender</th>
  

</tr>
</thead>
<tbody>

<tr>
<td>'. $fetchall['child_age'] .'</td>
<td>'. $fetchall['gender'] .'</td>


</tr>


</tbody>

<thead>
<tr>
 
  <th scope="col">Vaccine</th>
  <th scope="col">Vaccination Date</th>

</tr>
</thead>
<tbody>

<tr>

<td>'. $fetchall['Vname'] .'</td>
<td>'. $fetchall['appointment_date'] .'</td>

</tr>

</tbody>
</table>




<h3>Vaccinated</h3>
<p>Hospital Adress :'. $fetchall['Haddress'] .'</p>
<p>Hospital Email :'. $fetchall['Hemail'] .'</p>
<p>Hospital Number :'. $fetchall['Hnumber'] .'</p>


</div>



</body>
</html>';




$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','potrait');
$dompdf->render();
$dompdf->stream('Report.pdf', ['Attachment'=>0]);


?>  


