<?php
    session_start();
    


    $productId = $_GET['id'] ; 
    

    include 'connectDB.php' ;
    
    $userId = $_SESSION['id'];
    $query = "DELETE FROM `ITEM` WHERE ID = $productId"; // path is where the image will be saved 

    
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
        window.location = 'profile.php?message=Item has been deleted';
</script>


