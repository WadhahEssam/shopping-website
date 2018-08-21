<?php
    session_start();
    

    //preparing the variables 
    $name = $_FILES['image']['name'] ; 
    $temp = $_FILES['image']['tmp_name'];
    $path ='imgs/items/'. md5( rand(0,1000))  .  md5( rand(0,1000))  .'.jpg'; 
    
    $productName = $_POST['productName'] ; 
    $price = $_POST['price'] ; 
    $description = $_POST['description'] ;
    $itemType = $_POST['itemType'] ; 
    
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
    $itemId = generateRandomString () ;
    
    
    $query = "INSERT INTO `ITEM`(`ID`, `NAME` , `PRICE` , `DESCRIPTION`, `IMAGE`, `USER_ID` , `TYPE`) VALUES ( $itemId , '$productName' , $price , '$description' , '$path' , $userId , '$itemType' )"; // path is where the image will be saved 

    
    if(mysqli_query($con,$query)){
        
        $splittedProductName = explode( " " ,  $productName ) ; 
        if ( sizeof($splittedProductName) == 1  )    
            $query = 'SELECT * FROM REQUESTED_ITEM WHERE ITEM LIKE "%'.$splittedProductName[0].'%" ';
        else if ( sizeof($splittedProductName) == 2 )
             $query = 'SELECT * FROM REQUESTED_ITEM WHERE ITEM LIKE "%'.$splittedProductName[0].'%" OR ITEM LIKE "%'.$splittedProductName[1].'%" ';
        else if ( sizeof($splittedProductName) >= 3 )
             $query = 'SELECT * FROM REQUESTED_ITEM WHERE ITEM LIKE "%'.$splittedProductName[0].'%" OR ITEM LIKE "%'.$splittedProductName[1].'%"  OR LIKE "%'.$splittedProductName[2].'%" ';
        
        // echo sizeof($splittedProductName)  ;
        // echo $splittedProductName[0] ; 
        // echo $splittedProductName[1] ;
        $res= mysqli_query($con,$query);
              
        if ( mysqli_num_rows($res) > 0 ) { 
            
            while ( $row = mysqli_fetch_array($res) ) {
                
                $itemName = $row[1] ; 
                $requesterId = $row[2] ; 
                
                $query2 = " INSERT INTO `NOTIFICATION`(`ID`, `USER_ID`, `ITEM_ID`, `ITEM_NAME`) VALUES (0, $requesterId , $itemId , '$itemName' ) " ;
                
                $res2 =  mysqli_query($con, $query2);
                
                
                $query2 = " UPDATE USER SET NOTIFICATION = 1 WHERE ID = $requesterId " ;
                
                $res2 =  mysqli_query($con, $query2);
            }

        }
                
                
                
                
        mysqli_close($con);
        
    }
   
    else{
        echo("Error description: " . mysqli_error($con));
        mysqli_close($con);
        // header("location: add-item.php?error=Try Again"); // so the page will refresh
    }
    
    
    function generateRandomString($length = 4) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    
?>


<script>
        window.location = 'profile.php?message=Item is added';
</script>


