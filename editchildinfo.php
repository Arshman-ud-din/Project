<?php 
session_start();
include('connection.php');

if (isset($_SESSION['hospital_name']) || isset($_SESSION['parent_id'])) {

} else {
   echo ' ERROR 404';
    exit();
}
$C_id = $_GET['id'];
$s_query = "SELECT * FROM `childinfo` WHERE id = '$C_id'";
$q_run = mysqli_query($conn , $s_query);

if (isset($_POST['submit'])) {
    $cname = $_POST['Cname'];
    $cgender = $_POST['gender'];
    $c_age = $_POST['Cage'];
    $any_disease= $_POST['disease'];
    $parent_id = $_POST['p_id'];
  

    $query = "UPDATE `childinfo` SET `child_name`=' $cname',`gender`='$cgender',`child_age`='$c_age',`any_disease`='$any_disease',`P_id`='$parent_id ' WHERE id = '$C_id'";
    $runq = mysqli_query($conn , $query);

   if ($runq) {
    header('location:allchilds.php');
   }


}







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
body {
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
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Detail</h3>
                                    </div>
<?php 
$fetch_data = mysqli_fetch_array($q_run); 

 ?>

                                    <div class="modal-body">
                                        <form method="post" >
                                           

                                            <div class="mt-2">
                                                <input type="text" name="Cname" required
                                                    value="<?php echo  $fetch_data['child_name'] ?>"
                                                    class="form-control form-control-lg " placeholder="Child Name">
                                            </div>
                                            <div class="mt-3">
                                                <select name="gender" class="form-select form-control form-control-lg">
                                                    <option value="Male">Male </option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <input type="hidden" name="p_id"
                                                value=" <?php  echo $_SESSION['parent_id'] ?>">


                                            <div class="mt-3">
                                                <input type="text" min="1" max="15" name="Cage"
                                                    class="form-control mt-3 form-control-lg "
                                                    value="<?php echo $fetch_data['child_age']?> ">
                                            </div>
                                            <div class="mt-3">
                                                <input type="text" name="disease"
                                                    class="form-control mt-3 form-control-lg " placeholder="Any Disease"
                                                    value=" <?php echo  $fetch_data['any_disease'] ?>">
                                            </div>




                                            <button class="btn btn-primary form-control mt-4" type="submit"
                                                name="submit" value="submit">Update</button>


                                        </form>


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