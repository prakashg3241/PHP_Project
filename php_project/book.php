<?php
include("configdb.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
 <?php
include("header1.php");
?>
  <div class="container1">
   <div class="row">
       <div class="col-sm-6">
           <?php
           $url = $_SERVER['REQUEST_URI'];
           
           $idw=trim(strstr($url,'='),'=');
           
           $select="select * from movies where id=$idw";
          $resul=mysqli_query($connect,$select);
          $row = mysqli_fetch_assoc($resul);
          if($_SESSION['id']==null)
          {
            header("Location: login.php");
          }
          $id1=$_SESSION['id'];
         
          $select1="select * from user where id=$id1";
           $result=mysqli_query($connect,$select1);
           $ro= mysqli_fetch_assoc($result);
           
           
           if(isset($_POST['book_button']))
           {   
            $name=$row['description'];  
           $theatre_name=$_POST['theatre'];
           $dat=$_POST['date1'];
           $time=$_POST['time1'];
           $tickets=$_POST['no_of_tickets'];
           $price=$row['price']*$_POST['no_of_tickets'];
           $user_id=$_SESSION['id'];
           $movie_id=$row['id'];
          
          

           if(!empty($theatre_name) && !empty($dat) )
             {
                $insert="INSERT INTO book(name,theatre_name,date,time,price,tickects,user_id,movie_id)VALUES('$name','$theatre_name','$dat','$time','$price','$tickets','$user_id','$movie_id')";//inserting data
                
                $sq=mysqli_query($connect,$insert);
                
               
                
             }
             else{
                 echo"Theatre name cannot be empty!";
             }
           }

         ?>
       <img  src="<?php echo $row["name"];?>"  alt="Image not found" style="width:570px;height:610px;padding-left:15px">
       </div>
       <div class="col-sm-6">
           <a href="home.php">Go Back</a>
      
      <h2>Book now</h2>
      <br>
      <h3>Name:<?php echo $row["description"];?></h3>
       <h3> Price :<?php echo $row["price"];?></h3>
       <h4>category:<?php echo $row["language"];?></h4> 
       
       <br>
         <h4>Name:<?php echo $ro["name"];?></h4>
       <form  method="POST">
          Theatre name:<input type="text" name="theatre" placeholder="Enter Theatre name" required><br>
          No of Tickects:<input type="number" name="no_of_tickets" required><br>
          Date:<input type="date" name="date1" min="2022-04-10" style="padding-left:90px;margin-left:22px" required><br>
          Time:<input type="time" name="time1"style="padding-left:120px;margin-left:20px" required><br>
          <br>
       <input type="submit" name="book_button" class="btn btn-primary">
       </form>
       <br><br>
       
    </div>
   </div>

</body>
</html>