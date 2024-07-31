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
    <title>VMS
        
    </title>
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
body {
    background-color: #E5E4E2;
    overflow: hidden; 


}

</style>
<body class="crm_body_bg">


    <?php
    if (isset($_SESSION['parent_name'])) {
    $p_id = $_SESSION['parent_id'];
    $sq = "SELECT COUNT(*) AS `count` FROM `childinfo` WHERE P_id  = '$p_id' " ;
    $run = mysqli_query($conn , $sq);
    $fetchdata = mysqli_fetch_array($run);

    $sq1 = "SELECT COUNT(*) AS `count` FROM `hospital_register` " ;
    $run1 = mysqli_query($conn , $sq1);
    $fetchdata1 = mysqli_fetch_array($run1);

    $sq2 = "SELECT COUNT(*) AS `count` FROM `addvaccine` " ;
    $run2 = mysqli_query($conn , $sq2);
    $fetchdata2 = mysqli_fetch_array($run2);

    $sq3 = "SELECT COUNT(*) AS `count` FROM `book_appointment` WHERE Pname  = '$p_id' AND request = '1' " ;
    $run3 = mysqli_query($conn , $sq3);
    $fetchdata3 = mysqli_fetch_array($run3);

    include('navbar.php')
    
     ?>
    

<h1 class = "text-center"><b>Dashboard</b></h1>

    <hr>
                <div class="main_content_iner ">
        <div class="container-fluid p-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/childd.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata['count']?></span></h3>
                                                <p>Childs- Registered</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/hosp.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata1['count'] ?> </span> </h3>
                                                <p>Hospital- Available</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/vac.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata2['count'] ?></span> </h3>
                                                <p>Vaccines- Available</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/app.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata3['count'] ?></span> </h3>
                                                <p>Your Appointments</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
    <?php } ?>





    <?php if (isset($_SESSION['hospital_name'])) {
          $h_id = $_SESSION['hospital_id'];
          $sq = "SELECT COUNT(*) AS `count` FROM `book_appointment` WHERE Hname  = '$h_id' AND request = '1' " ;
          $run = mysqli_query($conn , $sq);
          $fetchdata = mysqli_fetch_array($run);
      
          $sq1 = "SELECT COUNT(*) AS `count` FROM `hospital_register` " ;
          $run1 = mysqli_query($conn , $sq1);
          $fetchdata1 = mysqli_fetch_array($run1);
      
          $sq2 = "SELECT COUNT(*) AS `count` FROM `addvaccine` WHERE H_id = '$h_id' " ;
          $run2 = mysqli_query($conn , $sq2);
          $fetchdata2 = mysqli_fetch_array($run2);
      
          $sq3 = "SELECT COUNT(*) AS `count` FROM `book_appointment` WHERE Hname  = '$h_id' AND vaccinated = '1' " ;
          $run3 = mysqli_query($conn , $sq3);
          $fetchdata3 = mysqli_fetch_array($run3);
     



     include('h_sidebar.php') ?>

<h1 class = "text-center"><b>Dashboard</b></h1>

    <hr>
    <div class="main_content_iner ">
        <div class="container-fluid p-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/vac.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata['count']?></span></h3>
                                                <p>Appointment- Pending</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/hosp.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata1['count'] ?> </span> </h3>
                                                <p>All-Hospital- Available</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/vacavail.jpg" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata2['count'] ?></span> </h3>
                                                <p>Vaccines- Available</p>
                                            </div>
                                        </div>
                                        <div class="single_quick_activity d-flex">
                                            <div class="icon">
                                                <img src="img/icon/childd.png" alt="">
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter"><?php echo $fetchdata3['count'] ?></span> </h3>
                                                <p>vaccinated- Patient</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>



    <?php } ?>






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
    <script src="vendors/apex_chart/bar_active_1.js"></script>
    <script src="vendors/apex_chart/apex_chart_list.js"></script>
</body>

</html>