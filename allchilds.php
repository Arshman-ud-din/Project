<?php
session_start();
include('connection.php');
$p_id = $_SESSION['parent_id'];
$s_query = "SELECT * FROM `childinfo` WHERE P_id= '$p_id'";
$q_run = mysqli_query($conn , $s_query);

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
    <title>MY CHILDS</title>
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
    .b{

        border-radius : 40px;
    }
</style>
<body class="">
<?php include('navbar.php')  ?>


<h1 class= "text-center"><b>Child Registered</b></h1> 
<div class="row row-cols-1 row-cols-md-2 g-4 container p-5">
  <?php while($row = mysqli_fetch_array($q_run)) { ?>
  

  <div class="col ">
    <div class="card border border-dark rounded-3">
        
        <hr>
        <h2 class ="p-3"> <span class = "fs-5">Child Name :</span> <?php echo $row['child_name'] ?></h2>
        <h2 class ="p-3"> <span class = "fs-5">Gender :</span>    <?php echo $row['gender'] ?> </h2>
        <h2 class ="p-3"> <span class = "fs-5">Age :</span>        <?php echo $row['child_age'] ?></h2>
        <h2 class ="p-3"> <span class = "fs-5">Any Disease :</span><?php echo $row['any_disease'] ?></h2>
        <a class="btn btn-success m-2" href="editchildinfo.php?id=<?php echo $row['id'] ?>">Edit info</a>
        <a class="btn btn-danger m-2" href="deletechildinfo.php?id=<?php echo $row['id'] ?>">Delete</a>


        <hr>
    </div>
  </div>
  <?php }?>

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
