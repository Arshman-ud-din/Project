<?php session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $vname = $_POST['Vname'];
    $vtype = $_POST['Vtype'];
    $hname = $_POST['Hname'];
    $vqty= $_POST['Qavaialble'];
    $h_id = $_POST['Hid'];


    $query = "INSERT INTO `addvaccine`(`Vname`, `Vtype`, `Hname`, `Vqty`,`H_id`) VALUES ('$vname','$vtype','$hname','$vqty','$h_id')";
    $runq = mysqli_query($conn , $query);

    if ($runq) {
        echo "<script>alert('vaccine added')</script>";
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
    <title>ADD Vaccine</title>
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

<?php include('h_sidebar.php')  ?>




    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content border border-primary p-5">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Vaccination</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">

                                            <div class="mt-2">
                                                <input type="text" name="Vname" class="form-control form-control-lg "
                                                    placeholder="Vaccine Name">
                                            </div>
                                            <div  class= "mt-3">
                                                <h6>Type of Vaccine:</h6>
                                                <select name="Vtype" class="form-control form-control-lg">
                                                    <option value="Live-attenuated">Live-attenuated vaccines </option>
                                                    <option value="Inactivated " >Inactivated vaccines</option>
                                                    <option value="Subunit" >Subunit vaccine</option>
                                                    <option value="Toxoid" >Toxoid vaccines</option>
                                                    <option value="mRNA" >mRNA vaccines</option>
                                                    <option value="Viral vector" >Viral vector vaccines</option>
                                                </select>
                                            </div>
                                            <input type="hidden"  name= "Hname" value =" <?php  echo $_SESSION['hospital_name'] ?>">
                                            <input type="hidden"  name= "Hid" value =" <?php  echo $_SESSION['hospital_id'] ?>">



                                            <div class="mt-3">
                                                <input type="number" name="Qavaialble" class="form-control mt-3 form-control-lg "
                                                    placeholder="Quantity Available">
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