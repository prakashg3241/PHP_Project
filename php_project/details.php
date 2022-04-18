<?php
include("configdb.php");
session_start();
?>

<head>
<title>Ticket Booking Website</title>
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
           $id=trim(strstr($url,'='),'=');
           $inser="select * from movies where id=$id";
          $result=mysqli_query($connect,$inser);
          $row = mysqli_fetch_assoc($result);
          
         ?>
       <img  src="<?php echo $row["name"];?>"  alt="Image not found" style="width:570px;height:610px;padding-left:15px">
       </div>
       <div class="col-sm-6">
           <a href="home.php">Go Back</a>
      
      
      <h3>Name:<?php echo $row["description"];?></h3>
       <h3> Price :<?php echo $row["price"];?></h3>
       <h4>category:<?php echo $row["language"]?></h4> 
       <br/>
       <h4>Details:<?php echo $row["details"] ;?></h4>
      
       <br><br>
      
       <a href="book.php?id=<?php echo $row["id"];?>">
         <button>Book </button>
       </a>
       
    </div>
   </div>
</body>
