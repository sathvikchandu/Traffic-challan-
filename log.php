<?php
//This script will handle login
session_start();

// check if the user is already logged in


require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM login_page WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;


    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: num.php");

                        }
                    }

                }

    }
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin details</title>
    
    
</head>
<body>
<img class="bg" src="https://www.openaccessgovernment.org/wp-content/uploads/2019/07/dreamstime_m_35528530.jpg" alt="IIT Kharagpur">

<style type="text/css">
        

        body{
            
            background-repeat : no-repeat;
            display:flex;
            justify-content: center;
            align-items: center;
            
            background-size: cover;
            padding-top: 200px;

            
            

        }
        .bg {
      
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.6;

        }
        input, textarea{
    
            border: 2px solid black;
            border-radius: 3px;
            outline: none;
            font-size: 16px;
            width: 40%;
            margin: 11px 0px;
            padding: 0px;
        }
        label{
            font-size :145%;
            
        }
        .btn {
            border-color: #460808e8;
            color: #f9f6f6;
            background-color: #5c656e;
            
            }

        .btn:hover {
            background: #2196F3;
            color: white;
            }
        

        
        
        
    </style>
    <div id = "frm">  
        <h1 >Login</h1>  
        <form name="f1" action = ""  method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type="text" id="username" name="username"  required><br>  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type="password" id="password" name="password" required>  
            </p>  
            <p>     
            <button class="btn" value="new data">Login</button>
        </form>  
    </div>  
    
    
        
        
        
        
        

</body>
</html>