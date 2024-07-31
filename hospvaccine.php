<?php
session_start();
if (isset($_SESSION['hospital_name']) || isset($_SESSION['parent_id'])) {

} else {
    header('location:login.php');
    exit();
}
include('connection.php');



$p_id = $_SESSION['parent_id'];


$s_querys = "SELECT * FROM `childinfo` WHERE P_id = '$p_id'";
$r_squerys = mysqli_query($conn , $s_querys);
$fetch_array = mysqli_fetch_array($r_squerys);




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

</head>
<style>
    body{
         background-color: lightblue;
    }
</style>


<body class="">

<?php include('navbar.php')  ?>


    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center ">
                            <div class="col-lg-6 border border-dark p-3">

                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <?php $id =$_GET['id'];
$select_query = "SELECT * FROM `hospital_register` WHERE id= '$id'";
$run_query = mysqli_query($conn , $select_query);
$fetch_data =mysqli_fetch_array($run_query);


?>


                                        <h3 class="modal-title">Vaccination Available In : <span class = "fs-1">
                                        <?php echo $fetch_data['Hname'] ?>
                                    </span></h3>
                                    </div>
                                    <div class="modal-body">
                                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Vaccine Name</th>
      <th scope="col">Vaccine Type</th>
      <th scope="col">Booking</th>

    </tr>
  </thead>
  <tbody>
    <?php $select_querys = "SELECT * FROM `addvaccine` WHERE H_id= '$id'";
$run_querys = mysqli_query($conn , $select_querys);
;


    while ($fetch_datas =mysqli_fetch_array($run_querys)
) {     ?>
    <tr>
      <td><h5><?php echo $fetch_datas['Vname']?></h5></td>
      <td><h5><?php echo $fetch_datas['Vtype']?></h5></td>
      
      <?php if (!empty($fetch_array['id'])) { 
        ?>

        <td><a class = "btn btn-success" href="book_slot.php?id=<?php echo $fetch_datas['id']?>">Book Slot</a></td>

      
      <?php } else { ?>

        <td><a class = "btn btn-success" href="childinfo.php">Add Child Info</a></td>
        
        <?php } ?>




    </tr>
<?php } ?>

  </tbody>
</table>


                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </section>



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