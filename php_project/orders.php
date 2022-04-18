<?php
include("configdb.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking Website</title>
</head>
<body>
<?php
include("header1.php");
                    
?>

<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h3>Orders</h3>
             <br> <br>
           
            <div class=" row cart-list-divider">
              <?php
                $current_logged_user_id=$_SESSION['id'];
                
                $select="select * from book where user_id = $current_logged_user_id ";
                 $result=mysqli_query($connect,$select);
                 $row = mysqli_fetch_array($result);
                
                 if($row['movie_id']==null)
                 {
                   
                  header("Location: noorders.php");
                   }

                $movie_id=$row['movie_id'];
                   
                $select1="select * from movies where id=$movie_id";
               $result1=mysqli_query($connect,$select1);
                 
              while($rows = mysqli_fetch_assoc($result1))
               {
                
                 ?>
             <div class='col-sm-3'>
                
             <img src=" <?php echo  $rows["name"];?>"  alt="Image not found" height="250px" width="300px">
             </div>
             <div class="col-sm-5">
             <div class="">
                      <h2><?php echo $row["name"];?></h2>
                      <h5>Theatre name :<?php echo $row["theatre_name"];?></h5>
                      <h5>Date :<?php echo $row["date"];?></h5>
                      <h5>Time :<?php echo $row["time"];?></h5>
                      <h5>No Of Seats :<?php echo $row["tickects"];?></h5>
                    </div>
             </div>
             
             <div class="col-sm-3">
               <?php
               if($_SERVER['REQUEST_METHOD'] == "POST")
               {
                $delete_id=$row['id'];
                $delete="delete  from book where id=$delete_id";
                $result=mysqli_query($connect,$delete);
                
                 
               }
              
               ?>
               <form method="POST">
                 
                <p><input type="submit" value="cancel now" ></P>
               </form>
             </div>
             
             <?php 
             }
               ?>
            </div>
            
          </div>
          

     </div>
</div>   
</body>
</html>




