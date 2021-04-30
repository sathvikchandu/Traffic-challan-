<?php
$insert = false;
if(isset($_POST['challanid'])){

    $server = "localhost";
    $username = "root";
    $password = "forgotpassword";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);
        // Check for connection success
     if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
     }

    //echo "Success connecting to the db";
    $challanid =$_POST['challanid'];
    $vehiclenumber = $_POST['vehiclenumber'];
    $violation = $_POST['violation'];
    $location = $_POST['location'];
    $fineamount = $_POST['fineamount'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $file = $_POST['file'];

    $sql = "INSERT INTO `wt`.`detentry` (`challanid`, `vehiclenumber`, `violation`, `location`, `fineamount`, `date`, `time`, `file`) VALUES ('$challanid', '$vehiclenumber', '$violation', '$location', '$fineamount', '$date', '$time', '$file')"; 
    //echo $sql;
    if($con->query($sql) == true){
        echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}    
?>  








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        

                
      

        .bg-img {
      
            background-image: url("https://pbs.twimg.com/media/EJ3hOs_UcAEZvbC.jpg");
            -webkit-background-size:cover;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            -webkit-filter: blur(2px);
            filter: blur(1px);
           

            
           

            
            
           
        }
        .btn{
            color: white;
            background: #09566d;
            padding: 8px 12px;
            font-size: 20px;
            border: 2px solid white;
            border-radius: 6px;
            cursor: pointer;
}
    </style>    
    
</head>
<body>
<div class="bg-img"></div>
    <div class="container">
    <?php
        if($insert == true){
        //echo "<p class='submitMsg'>Data added successfully</p>";
        header("location: thankyou.php");
        }
    ?>
        <form action="dataentry.php" method="post">
            <input type = "varchar" name="challanid" id ="challanid" placeholder="Enter challan ID">  
            <input type = "varchar" name="vehiclenumber" id ="vehiclenumber" placeholder="Enter vehicle number">
            <input type = "text" name="violation" id ="violation" placeholder="violation">
            <input type = "text" name="location" id ="location" placeholder="location">
            <input type = "integer" name="fineamount" id ="fineamount" placeholder="fine amount">
            <input type = "text" name="date" id ="date" placeholder="date(yyyy-mm-dd)">
            <input type = "text" name="time" id ="time" placeholder="time">
            <input type="file" name="file" id ="file" value="" />
            <button class="btn">Upload</button> 
        </form>
        

    </div>
    
</body>
</html>