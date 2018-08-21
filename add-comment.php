<?php
    session_start();
    

    $userId = $_SESSION['id'] ;
    $itemId = $_POST['itemId'] ; 
    $commentText = $_POST['commentText'] ; 
    
    
    

    include 'connectDB.php' ;
    

    
    
    $query = "INSERT INTO `COMMENT`(`ID`, `ITEM_ID`, `TEXT`, `STARS`, `USER_ID`) VALUES ( 0 , $itemId , '$commentText' , 0 , $userId )"; 

    
    if(mysqli_query($con,$query)){
        mysqli_close($con);
    }
   
    else{
        echo("Error description: " . mysqli_error($con));
        mysqli_close($con);
    }

    
?>

<?php 
echo " <script> window.location = 'item.php?id=$itemId' ; </script> ";
?>