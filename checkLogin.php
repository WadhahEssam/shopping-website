<?php 
    session_start();
    
    include 'connectDB.php' ;
    
    
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    
    $query = "SELECT * FROM USER WHERE EMAIL = '$email'
    			AND PASSWORD = '".md5($password)."' " ; 
    
    
    
    $result = mysqli_query($con,$query);
    
    
    if(mysqli_num_rows($result)>0){
    		$_SESSION['email'] = $email;
            mysqli_close($con);
    		header("location: index.php"); 
    	}
    else{
        mysqli_close($con);
        header("location: signin.php?error=Wrong Email/Password"); 
    }
?>