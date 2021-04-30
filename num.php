<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Traffic Police</title>
    
</head>
</head>

<body>
    <style>
        .heading{
    text-align: center;
    background-color: rgb(27, 86, 134);
    color: beige;
    padding:2% 2% 2% 2%;
    border-radius: 25px 25px 0px 0px;
    font-size: 150%;
}
form{
    text-align: center;
    margin: auto;
    size: 150%;
}
body{
    background: #74ebd5;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #ACB6E5, #74ebd5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #ACB6E5, #74ebd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: rgb(0, 0, 0);
    font-size: 100%;
}
.textbox{
    border:2px solid rgb(0, 111, 148);
}
.btn {
    border-color: #d88888fa;
    background-color: #797986;
    color: #f6e9e9;
}

.btn:hover {
  background: #2196F3;
  color: white;
}
 
.row {
  display: flex;
}

.column {
  flex: 33.33%;
  padding: 5px;
}
</style>
    <div class="heading">
        <h1>State Police Department</h1>
        <h3>Integrated e-challan system</h3>
    </div>
    <hr>
    <br>
    <form action="dis.php" method="post">
            <label for="vehicle_num"><b>Vehicle Number:</b></label>
              
            <input type = "varchar" name="vehiclenumber" id ="vehiclenumber" placeholder="Enter vehicle number"><br><br>
            
            <button class="btn">View</button> 
        </form>
    
    
    <form action="dataentry.php">
        <button class="btn" value="new data">Add Data</button>
    </form>
    

    <br>
    <hr>
    <div class="row">
        <div class="column">
            <img src="https://www.myparkingsign.com/blog/wp-content/uploads/Image-11.gif" alt="Snow" style="width:100%">
        </div>
        <div class="column">
            <img src="https://i.pinimg.com/originals/80/bb/d3/80bbd364762520a6b46bd68100384789.jpg" alt="Forest" style="width:100%">
        </div>
        <div class="column">
            <img src="https://www.mcleishorlando.com/wp-content/uploads/2017/06/Blog-35-helmet-sign.gif" alt="Mountains" style="width:50%">
        </div>
    </div>
    <?php
    error_reporting(0);
       $vehiclenumber = $_POST['vehiclenumber'];
       
     ?>



    

</body>
</html>