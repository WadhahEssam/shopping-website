<?php
    session_start();
    

    //preparing the variables 
    $name = $_FILES['image']['name'] ; 
    $temp = $_FILES['image']['tmp_name'];
    $path ='imgs/items/'. md5( rand(0,1000))  .  md5( rand(0,1000))  .'.jpg'; 
    
    $email = $_SESSION['email'];
    
    if (!$_FILES["image"]["size"]) {
        $path = "/imgs/product-example.png" ; 
    }
    
    // echo '   
    
    // '.$name.' <br />
    // '.$temp.' <br />
    // '.$path.' <br />     
    // '.$productName.' <br />
    // '.$price.' <br />     
    // '.$description.' <br />
    // '.$itemType.' <br /> 
    
    // ' ; 

    // uploading files 
    
    move_uploaded_file( $temp , $path ) ; 
    

    include 'connectDB.php' ;
    
    $userId = $_SESSION['id'];
    $query = "UPDATE `USER` set PROFILE_PICTURE = '$path' WHERE EMAIL = '$email' "; // path is where the image will be saved 

    
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
        window.location = 'profile.php?message=profile picture is changed';
</script>


