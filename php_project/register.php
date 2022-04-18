<?php
session_start();
include("configdb.php");


         if($_SERVER['REQUEST_METHOD'] == "POST")
         {
             //something was posted
             $name = $_POST['name'];
             $email=$_POST['email'];
             $password = $_POST['password'];
     
             if(!empty($name) && !empty($password) && !is_numeric($name))
             {
                $inser="INSERT INTO user(name,email,password)VALUES('$name','$email','$password')";//inserting data
                $sq=mysqli_query($connect,$inser);
                header("Location: login.php");
						
                
             }
             else
             {
                 echo "wrong username or password!";
             }
         }

         ?>
<!DOCTYPE html>
<html lang="en">

<head>
     
     <link rel="stylesheet" href="style.css">
     <title>Ticket Booking Website</title>
    <style>
      p{
			padding-left:50px;
		}
		</style>
</head>


<body >
     <?php
     include("header.php")
     ?>   

         <div class="container">
        <h1 class="log">Register</h1>
        <form name="myform"  method="POST"   >
        <label for="name">Name</label><br>
            <input type="text" name="name" id="name" placeholder="Enter Username" required><br>    
        <label for="Email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Enter email id" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
        <button class="btnn" >Submit</button><br>
       <p>Already have an account? <a href="login.php">Login</a></p>
         </div>
         
         
</body>

</html>