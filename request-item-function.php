<?php
    session_start();
    

    $userId = $_SESSION['id'];
    $itemName = $_POST['item'] ; 
    

    

    include 'connectDB.php' ;
     
    $query = "INSERT INTO `REQUESTED_ITEM`(`ITEM`, `USER_ID`) VALUES ( '$itemName' , $userId )"; // path is where the image will be saved 

    
    if(mysqli_query($con,$query)){
        mysqli_close($con);
        // header("location : profile.php"); // so the page will refresh
    }
   
    else{
        echo("Error description: " . mysqli_error($con));
        mysqli_close($con);
        // header("location: add-item.php?error=Try Again"); // so the page will refresh
    }

    
?>


<script>
        window.location = 'profile.php?message=Item is requested ';
</script>


