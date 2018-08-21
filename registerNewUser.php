<?php

    session_start(); 

    if(true)
    {         

            $username = $_GET['username'];
            $email =$_GET['email'];
            $password = $_GET['password'];
            $password2 = $_GET['password2'];
            $phoneNumber = $_GET['phone-number'];

            
            if( strcmp( $password , $password2 ) > 0  ||  strcmp( $password , $password2 ) < 0  ) {
                    header("location: signup.php?error=Password Don't Match");
            } else if( strlen ( $password ) < 6 ) { 
                    header("location: signup.php?error=Password should be at least 6 chars");
            } else if( strlen ( $username ) < 4 ) {
                    header("location: signup.php?error=userame should be more than 4 chars");
            } else {

                include 'connectDB.php' ; 

                $query = "SELECT email FROM user WHERE email='".$email."'";
                
                $result = mysqli_query($con,$query);
                
                $numResults = mysqli_num_rows($result);
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
                {
                    mysqli_close();
                   header("location: signup.php?error=Invalid email address");
                }
                
                else if($numResults>=1)
                {
                    mysqli_close($con);
                   header("location: signup.php?error=User Already Exists");
                }
                else
                {
                    $insert = mysqli_query($con, "INSERT INTO `USER`(`ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `PHONE_NUMBER`, `PROFILE_PICTURE`, `NOTIFICATION`) Values ( 0 ,'$username','$email','".md5($password)."','$phoneNumber','imgs/profile-example.png',0 )");
                    if ($insert) {
                        $_SESSION['email'] = $email;
                        mysqli_close($con);
                        header("location: index.php?message=Account has been created successfully");
                    }
                    else {
                        mysqli_close($con);
                        header("location: signup.php?error=arror Please ary again");
                    }
                }
            }
            
        }
    

?>