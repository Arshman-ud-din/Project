<?php 
session_start();
include('connection.php');
$p_id = $_SESSION['parent_id'];
$get_id = $_GET['id'];
$s_q_vac = "SELECT * FROM `addvaccine` WHERE id = '$get_id'";
$r_s_q_vac = mysqli_query($conn , $s_q_vac);
$fetch = mysqli_fetch_array($r_s_q_vac);

$s_query = "SELECT * FROM `childinfo` WHERE P_id = '$p_id'";
$r_squery = mysqli_query($conn , $s_query); 





if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $v_id = $_POST['v_id'];
    $h_id= $_POST['h_id'];
    $p_id = $_POST['p_id'];
    $a_date = $_POST['Adate'];


    if (!empty($c_id)) {
        $i_query = "INSERT INTO `book_appointment`( `appointment_date`,  `Pname`, `Hname`, `Vname`, `child_name`) VALUES 
        ('$a_date','$p_id','$h_id','$v_id','$c_id')";
        $r_i_query = mysqli_query($conn , $i_query);
    
        if ($r_i_query) {
            
            echo "<script>alert('wait for approval.')</script>";
    
        }
        


    }else {

        header('location:childinfo.php');

     
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

<?php include('navbar.php')  


?>




    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                 
                                <div class="modal-content  border border-primary p-4">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Book Appointment for  <?php  echo $fetch['Vname']?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">

                                     
                                                <h6>Child Name</h6>
                                                <select name="c_id"  class="form-select form-control form-control-lg  ">
                                               
                                                <?php while($row = mysqli_fetch_array($r_squery)) {  ?>
                                                    
                                                    <option value="<?php echo $row['id']?> "> <?php echo $row['child_name'] ;?></option>
                                                   <?php  } ?>
                                                </select>
                                            

                                            <h6 class="mt-3">Appointment Date</h6>
                                            <div >
                                                <input type="date" required name="Adate" class="form-control  form-control-lg "
                                                    >
                                            </div>
                                                
                                            <input type="hidden"  name= "v_id" value =" <?php  echo $fetch['id']?>">
                                            <input type="hidden"  name= "h_id" value =" <?php  echo $fetch['H_id']?>">

                                            <input type="hidden"  name= "p_id" value =" <?php  echo $p_id ?>">


                                           
                                            

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