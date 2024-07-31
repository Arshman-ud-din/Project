<?php 
session_start();
include('connection.php');

if (isset($_SESSION['hospital_name']) || isset($_SESSION['parent_id'])) {

} else {
    header('location:login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ADD CHILD DETAILS</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <link rel="stylesheet" href="css/bootstrap1.min.css" />

    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="vendors/morris/morris.css">

    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="css/metisMenu.css">

    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">

</head>
<style>
.bod {
    background-color: lightblue;
    border-radius: 20px;
}
</style>


<body class="">

    <?php include('navbar.php')  


?>
<div class="text-center"><h2><b>Reports</b> </h2></div>
<hr>


<div class="row  container p-5">



            <?php $P_id =$_SESSION['parent_id'];

$select_query = "SELECT * FROM book_appointment
INNER JOIN childinfo
ON  book_appointment.child_name =  childinfo.id   

INNER JOIN parent_register
ON   book_appointment.Pname = parent_register.id 

INNER JOIN addvaccine
ON   book_appointment.Vname = addvaccine.id  WHERE book_appointment.Pname = $P_id" ;
$run = mysqli_query($conn ,$select_query);







                              while ($fetchal= mysqli_fetch_array($run) ) { 
                                if ($fetchal['request'] == '1' AND  $fetchal['vaccinated'] == '1' ) {
                                ?>
                              
   


            <div class=" bod g-4 ">
                <div class="container mt-2  p-4 ">
                    <div class="text-center">
                        <h3 class=" "><b>Report of
                                <?php echo strtoupper($fetchal['Vname']) ?> </b></h3>
                    </div>
                    <div class="">
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <h5><span style="color:grey;">Child_Name:</span> <b>
                                            <?php echo strtoupper($fetchal['child_name']) ?></b> </h5>
                                </div>
                                <div class="col text-center">
                                    <h5><span style="color:grey;">Parent_Name:</span><b>
                                            <?php echo strtoupper($fetchal['Pname']) ?></b> </h5>
                                </div>
                            </div>

                            <div class="row mt-4 ">
                                <div class="col">
                                    <h5><span style="color:grey;">Appointment:</span> <b>
                                            <?php echo strtoupper($fetchal['appointment_date']) ?></b>
                                    </h5>
                                </div>
                                <div class="col text-center">
                                    <h5><span style="color:grey;">Hospital:</span><b>
                                            <?php echo strtoupper($fetchal['Hname']) ?></b> </h5>
                                </div>
                            </div>
                        </div>
                        <h4 class=" mt-4  text-center"><?php echo($fetchal['child_name']) ?> is VACCINATED </h4>
                        <a href="pdf.php" class = "btn btn-dark d-flex justify-content-center" target="_blank">GENERATE PDF</a>
                        

                    </div>
                </div>
               
            </div>
            <?php }else { ?>
                 <div class=" bod g-4 ">
                 <div class="container mt-2  p-4 ">
                     <div class="text-center">
                         <h3 class=" "><b>Report of 
                                 <?php echo strtoupper($fetchal['Vname']) ?> </b></h3>
                     </div>
                     <div class="text-center">
                         <h3 class=" mt-3 "> Pending !!
                                 </h3>
                     </div>
 
                     </div>
                 </div>
                
           <?php  } }?>

        </div>

        </div>





        <script src="js/jquery1-3.4.1.min.js"></script>

        <script src="js/popper1.min.js"></script>

        <script src="js/bootstrap1.min.js"></script>

        <script src="js/metisMenu.js"></script>

        <script src="vendors/count_up/jquery.waypoints.min.js"></script>

        <script src="vendors/chartlist/Chart.min.js"></script>

        <script src="vendors/count_up/jquery.counterup.min.js"></script>

        <script src="vendors/swiper_slider/js/swiper.min.js"></script>

        <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

        <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

        <script src="vendors/gijgo/gijgo.min.js"></script>

        <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="vendors/datatable/js/jszip.min.js"></script>
        <script src="vendors/datatable/js/pdfmake.min.js"></script>
        <script src="vendors/datatable/js/vfs_fonts.js"></script>
        <script src="vendors/datatable/js/buttons.html5.min.js"></script>
        <script src="vendors/datatable/js/buttons.print.min.js"></script>
        <script src="js/chart.min.js"></script>

        <script src="vendors/progressbar/jquery.barfiller.js"></script>

        <script src="vendors/tagsinput/tagsinput.js"></script>

        <script src="vendors/text_editor/summernote-bs4.js"></script>
        <script src="vendors/apex_chart/apexcharts.js"></script>

        <script src="js/custom.js"></script>
</body>

</html>