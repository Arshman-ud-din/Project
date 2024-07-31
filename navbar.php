<?php
include('connection.php');
$p_id =  $_SESSION['parent_id'];
$s_qury = "SELECT *
FROM book_appointment
WHERE appointment_date >= date_sub(now(), interval 1 week) AND Pname = '$p_id'";
$run_it = mysqli_query($conn , $s_qury);

$fetch_data = mysqli_fetch_array($run_it);

$s_q = "SELECT *
FROM book_appointment
WHERE appointment_date >= date_sub(now(), interval 1 week) AND Pname = '$p_id'";
$run = mysqli_query($conn , $s_q);


?>





<!DOCTYPE html>
<html lang="zxx">

<head>


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hospital</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
    .navv {
        background-color: #E5E4E2;
    }
    
    </style>

</head>

<body class="crm_body_bg">



    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <img src="img/logo3.png" alt="">
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">

            <li class="side_menu_title">
                <a href="index.php" style="text-decoration: none;"><span>Dashboard</span></a>
            </li>

            <a class="has-arrow" href="childinfo.php" style="text-decoration: none;">
                <li class="fs-5 mt-4 "><span style="color: black;">Add-Child-info</span></li>
            </a>

            <a class="has-arrow" href="allhospital.php" style="text-decoration: none;">
                <li class="fs-5 mt-4 "><span style="color: black;">Book-Hospitals</span></li>
            </a>



            <a class="has-arrow" href="Appointment.php" style="text-decoration: none;">
                <li class="fs-5 mt-4 "><span style="color: black;">My-Appointment</span></li>
            </a>



            <a class="has-arrow" href="allchilds.php" style="text-decoration: none;">
                <li class="fs-5 mt-4 "><span style="color: black;">My-Childs</span></li>
            </a>


            <a class="has-arrow" href="vacreport.php" style="text-decoration: none;">
                <li class="mt-4  fs-5"> <span style="color: black;">Report</span></li>
            </a>


            <a class="has-arrow" href="logout.php" style="text-decoration: none;">
                <li class=" mt-4 fs-5"><span style="color: black;">Logout</span></li>
            </a>

        </ul>
    </nav>


    <section class="main_content dashboard_part navv">

        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">

                            </div>
                        </div>


                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class=" header_notification_warp d-flex align-items-center">


                                <div class="profile_info">
                                  
                                    <?php if (isset($fetch_data['appointment_date']) AND $fetch_data['request'] == '1' ) {
                               if (mysqli_num_rows($run_it) > 0) {
                                ?>
                                    <img class="w-50" src="img/icon/alarm.png" alt="#">
                                    <div class="profile_info_iner">
                                        <h5>Your appointment is on</h5> <?php  
                                        while ($rowss = mysqli_fetch_array($run)) {
                                            ?>

                                        <h3 style="color:white;"> <?php 
                                             echo $rowss['appointment_date']; 

                                        }
                                        ?></h3>



                                        <?php }  } ?>

                                        </div>
                                    </div>
                                </div>


                                <div class="profile_info">
                                    <img src="img/pfp.jpg" alt="#">
                                    <div class="profile_info_iner">
                                        <p>Patient</p>
                                        <h5><?php echo $_SESSION['parent_name'] ?></h5>
                                        <div class="profile_info_details">
                                            <a href="logout.php">Log Out <i class="ti-shift-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



            <script>
            $('#ID_search').keyup(function() {
                var search_word = $('#ID_search').val();
                $.ajax({
                    url: 'livesearch.php',
                    type: 'POST',
                    data: {
                        data_search: search_word
                    },
                    success: function(data) {
                        $('#ID_table').html(data);
                    }
                })


            })
            </script>


</body>

</html>