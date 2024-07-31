<?php 
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $cname = $_POST['Cname'];
    $cgender = $_POST['gender'];
    $c_age = $_POST['Cage'];
    $any_disease= $_POST['disease'];
    $p_id = $_POST['p_id'];
   

     
    $query = "INSERT INTO `childinfo`( `child_name`, `gender`, `child_age`, `any_disease`, `P_id`) VALUES
     ('$cname','$cgender','$c_age','$any_disease','$p_id')";
    $runq = mysqli_query($conn , $query);

    if ($runq) {
          header('location:allhospital.php');
    }
    
  
}
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
    
    .bod{

        background-color: lightblue;
        border-radius : 20px;
    }
</style>


<body class="">

<?php include('navbar.php')  


?>




    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 bod">
                 
                                <div class="modal-content mt-4 bod p-4 ">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Child Detail</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">

                                            <div class="mt-2">
                                                <input type="text" name="Cname" required class="form-control form-control-lg "
                                                    placeholder="Child Name">
                                            </div>
                                            <div  class= "mt-3">
                                                <select name="gender" class="form-control form-control-lg">
                                                    <option value="Male">Male </option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other" >Other</option>
                                                </select>
                                            </div>  

                                            <input type="hidden"  name= "p_id" value =" <?php  echo $_SESSION['parent_id'] ?>">


                                            <div class="mt-3">
                                                <input type="number" min="1" max="15" name="Cage" class="form-control mt-3 form-control-lg "
                                                    placeholder="Child Age">
                                            </div>
                                            <div class="mt-3">
                                                <input type="text" name="disease" class="form-control mt-3 form-control-lg "
                                                    placeholder="Any Disease">
                                            </div>



                                        
                                            <button class="btn btn-primary form-control mt-4" type="submit"
                                                name="submit" value="submit">Submit</button>

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