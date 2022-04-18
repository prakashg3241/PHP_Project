<?php
include("configdb.php");
?>

<head>
  <style>
    .trending-wrapper{
        padding-top:20px;
        margin: 30px;
        
    }
    .trening-item{
        padding-top:40px;
        float: left;
        width: 20%;
    }
    .sizee{
   width:200px;
   height:220px;
    }
    </style>
  
  
</head>


<div class="trending-wrapper">
        <h3>Trending Movies</h3>
        <?php
        $select="select * from movies";
        $result=mysqli_query($connect,$select);
        while($row=mysqli_fetch_array($result))
         {   ?>
        <div class="trening-item">
       <a href="details.php?id=<?php echo $row["id"]; ?>">
        <img src="<?php echo $row["name"];?>" class="sizee">
         </a>
         <div >
            <h3><?php echo $row["description"];?></h3>
          </div>
          
          </div>
        
         <?php
        }
        
?>

</div>


