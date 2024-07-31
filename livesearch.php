<?php
include('connection.php');

if(isset($_POST['data_search'])){
$search_value = $_POST['data_search'];
$selected_data_fetch = "SELECT * FROM `hospital_register` WHERE Hname LIKE '%$search_value%'";
$run = mysqli_query($conn,$selected_data_fetch);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Search</title>

</head>
<body>

<h4 class="text-center mt-3 "><?php if(mysqli_num_rows($run) > 0){
    echo "";
}
else{
   echo  "data not found";
}   ?> </h4>
<div  class="row row-cols-1 row-cols-md-2 g-4 container p-5">
        <?php while($row = mysqli_fetch_array($run)) { ?>

        <div class="col ">
            <div class="card">
                <img src="<?php echo $row['Hlogo'] ?>" class="card-img-top text-center" height="300" alt="...">
                <div class="card-body">
                    <a class="btn btn-success mt-2"
                        href="hospvaccine.php?id=<?php echo $row['id'] ?>"><?php echo $row['Hname'] ?></a>
                    <h5 class="card-text mt-2">Address: <?php echo $row['Haddress'] ?></h5>
                    <h5 class="card-text">Number: <?php echo $row['Hnumber'] ?></h5>


                </div>
            </div>
        </div>
        <?php }?>

    </div>



</div>


    
</body>
</html>
