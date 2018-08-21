<?php 

    $con = mysqli_connect("localhost","ksu","112233","shopping_website"); 
    if(mysqli_connect_errno($con)){
	    die("Fail to connect to database :".mysqli_connect_error() ); 
    }

