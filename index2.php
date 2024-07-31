<?php

required_once('vendor/autoload.php');
use Dompdf\Dompdf;

$con = mysqli_connect("localhost", "root" , "" , "vms");
$select = "SELECT * FROM `childinfo`";
$run - mysqli_query($con , $select);

$fetch = mysqli_fetch_array($run);

$html = '<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
h2{
    text-align: center;
}
</style>
</head>
<body>

<h2>COMPANY MEMBER</h2>


<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>'. $fetch['gender'] . '<tr>
    <td>WORLD OF TECH</td>
    <td>mesum</td>
    <td>Germany</td>
  </tr>

</table>

</body>
</html>' .

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','potrait');
$dompdf-> render();
$dompdf-> stream('Report.pdf');



?>






