<?php
include("configdb.php");

session_start();

	include("configdb.php");
	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email= $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$inser = "select * from user where email = '$email' limit 1";
            $result=mysqli_query($connect,$inser);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					$_SESSION["id"]=$user_data["id"];
					if($user_data['password'] === $password)
					{

						#$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: home.php");
						die;
					}
				}
			}
			
		
		}else
		{
			echo "wrong username or password!";
		}
	}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     
     <link rel="stylesheet" href="style.css">
	 
     <title>Ticket Booking Website</title>

	<style>

		p{
			padding-left:0px;
		}
		</style>
</head>


<body >
     <?php
     include("header.php")
     ?>   

         <div class="container">
        <h1 class="log">Login</h1>
        <form name="myform" method="POST" >
            <label for="username">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Enter Username" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
            <button class="btnn">login</button>
			<br>
			<br>
			<p>New? <a href="register.php">Create an account.</a></p>

    </div>
	
</body>

</html>