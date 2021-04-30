<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body >
    <style>
        body {background-color:   #eadeaf;}

         *{
    margin: 80px;
    padding: 8px;
    box-sizing: border-box;
    font-family: Merriweather;
    
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

        
    <?php
        session_start();
        $reg_old= $_POST['vehiclenumber'];
       
        $vehnumber=str_replace(' ', '', $reg_old);
        if($vehnumber!=''){
                
            $server = "localhost";
            $username = "root";
            $password = "forgotpassword";
            
            $con = mysqli_connect($server,$username,$password);
            
            if(!$con){
                die("connection failed " .mysqli_connect_error());
                
            }
        
            $sql= "SELECT * FROM wt.detentry where vehiclenumber='".$vehnumber."';";
            if($con->query($sql)==true){
                
                $data=mysqli_query($con,$sql);
                
                if($data->num_rows>0){
                    ?>
                    
                    <table >
                    <tr>
                    
                    <th>Challan id</th>
                    <th>Vehicle Number</th>
                    <th>Violation</th>
                    <th>location </th>
                    <th> Fine Amount</th>
                    <th>Date</th>
                    <th>time</th>
                    <th>File</th>
                    </tr> 
                <?php
                    
                    
                    while($row = $data-> fetch_assoc()){
                        echo "<tr><td>".$row["challanid"]."</td><td>".$row["vehiclenumber"]." "."</td><td>"
                        .$row["violation"]."</td><td>".$row["location"]
                        ."</td><td>".$row["fineamount"]."</td><td>".$row["date"]
                        ."</td><td>".$row["time"]."</td><td>"."<a href='".$row["file"]."' target='_blank'>Image</a>"."</td></tr>";
                    }
                    
                   

                    ?>

                    
                    </table>
                    
                    
                    <?php
                    
                }
                else{
                    echo "<h3> No pending challans </h3>";
                }
                
            }
            else{
                echo "error: $sql <br> $con->error";
            }
            
            $con->close();
            
        }
        
        ?>
    
    </body>
</html>    
