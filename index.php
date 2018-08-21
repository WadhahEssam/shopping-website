<?php
    session_start();

    include 'connectDB.php' ;
    
    if ( isset( $_SESSION['email'])  ) { 
    $email = $_SESSION['email'];

    
	
    $query = "SELECT * FROM USER WHERE EMAIL = '$email' ";
    
    $res = mysqli_query($con,$query);
    
    $row= mysqli_fetch_array($res);
    
    $_SESSION['id'] = $row[0] ;
    $_SESSION['username'] = $row[1];
    $_SESSION['email'] = $row[2];
    $_SESSION['profile_pic'] = $row[5];
    $_SESSION['phone_number'] = $row[4];
    $_SESSION['notification'] = $row[6];
    
    } 
    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SHOP HERE</title>
    
    
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <!--for css icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img class="main-logo" height=40 src="/imgs/logoonly.png" alt=""/>
        <a class="navbar-brand" href="/index.php">SHOP HERE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
            <?php
            if ( isset($_SESSION['email']) ) {
            echo(
            ' <ul class="nav navbar-nav">
              <li class="dropdown">
                <a class="dropdown-toggle nav-link btn btn-info navbar-btn" data-toggle="dropdown" href="#" style="font-weight:bold">Notifications
                ');
                
                
                if ( $_SESSION['notification'] == 0 ) {
                echo ('
                <span class="caret"></span></a>
  
                      <ul class="dropdown-menu" style="  background-color: #117a8b;">
                        <div class="notification-div">
                          <ul class="notification-points">
                            <li class="notification-point-li"><a  class="notification-point"> NO NOTIFICATIONS </a></li>
                         </ul>
                      </div>
                    </ul>
                  </li>       
               </ul>  ') ;
           
           
                } else {
                  
                  include 'connectDB.php' ; 
                  $userId = $_SESSION['id'] ; 
                  
                  $query = "SELECT * FROM NOTIFICATION WHERE USER_ID = $userId " ; 
                  
                  $res= mysqli_query($con,$query);
    
                 echo(" 
                  <span class='caret'></span></a>
    
                  <ul class='dropdown-menu' style='  background-color: #117a8b;'>
                    <div class='notification-div'>
                      <ul class='notification-points'> ") ; 
                      
                      
                  if ( mysqli_num_rows($res) > 0 ) { 
                      
                      while ( $row = mysqli_fetch_array($res) ) {
                          
                          $itemId = $row[2] ; 
                          $itemName = $row[3] ; 
                          

                         echo "     <li class='notification-point-li'><a href='item.php?id=$itemId' class='notification-point'>Your requestesd item ( $itemName ) is now available </a></li> ";

                          
                      }
          
                  }
                  
                        echo ("                                     </ul>
                                                  </div>
                                                </ul>
                                              </li>       
                                           </ul>  ") ;
                  
 
                  
                  

           
                }
            }
            ?>

              
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            <?php
            if ( isset($_SESSION['email']) ) {}
            else {
            echo(' 
            <li class="nav-item">
              <a class="nav-link" href="/signin.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/signup.php">Sign Up</a>
            </li>            
            <li class="nav-item"> ');
            }
            ?>
            
            <?php
            if ( isset($_SESSION['email']) )
            echo ('<a class="usernamenav nav-link" href="/profile.php" style="color:antiquewhite;margin-left:10px">'.$_SESSION['username'] .'</a>');
            echo ('
            </li>
            <li class="nav-item">
            <a href="signout.php" class="btn btn-danger" style="border-radius:10%;"><img height=20 src="/imgs/sign-out.png"></img></a>   
            </li>
            ');
            ?>
            
            
            
          </ul>
        </div>
      </div>
    </nav>
    
    <?php 
    
    // jumbotron for people who are not signed in
     if ( !isset($_SESSION['email']) ) {
       echo ( '   
                  <div class="jumbotron jumbotron-billboard" style="margin-bottom: -45px;">
                    <div class="img"></div>
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-12">
                                <h1>To Start Shopping At SHOPHERE.com</h1>
                                <a href="signup.php" class="btn btn-success btn-lg">Create Account</a>
                              </div>
                          </div>
                      </div>
                  </div>    ' ) ; 
     } 
     
     
     else { 
       
       
       
        // jumbotron for people who are signed in
        $c = "'" ; 
       echo ( '   
          
    
                <div class="jumbotron jumbotron-billboard" style="margin-bottom: -45px;;padding-top:30px;padding-bottom: 30px;">
                      <div class="img"></div>
                        <div class="container">
                          <div class="row" style="margin-bottom:20px">
                              <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                  <div class="btn-group">
                                    <button type="button" onclick="location.href='.$c.'profile.php'.$c.';" class="btn btn-primary btn-lg"><img class="profile-picture" src="/imgs/profile.png"></img><br> <h4>Profile</h1></button>
                                    
                                  </div>
                                </div>
                              <div class="col-lg-4"></div>
                          </div>
                          <div class="row">
                                <div class="col-lg-4"></div>
                                  <div class="col-lg-4">
                                    <div class="btn-group">
                                      <button type="button" onclick="location.href='.$c.'/add-item.php'.$c.'" class="btn btn-primary btn-md btn-success  sell-item-button">Sell Item <img class="menu-picture" src="/imgs/add-item.png"></img> </button>
                                      <button type="button" onclick="location.href='.$c.'/requestitem.php'.$c.'" class="btn btn-primary btn-md btn btn-warning"> <img class="menu-picture" src="/imgs/my-items.png"> </img>Request Items </button>
                                    </div>
                                  </div>
                                <div class="col-lg-4"></div>
                          </div>
                        </div>
                </div>' ) ; 
       
     }
    
    ?>

    



    <!-- Page Content -->
    <div class="container">
      
      <div class="row" style="margin-bottom:30px">
        
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          
          <!--search bar-->
          <form action="index.php" method="GET">

              <div id="imaginary_container"> 
                  <div class="input-group stylish-input-group">
                      <input name="search" type="text" class="form-control"  placeholder="Search" >
                      <span class="input-group-addon">
                          <button type="submit" style="margin-top: 3px;">
                              <i class="material-icons md-24" >search</i>
                          </button>  
                      </span>
                  </div>
              </div>
              
              <?php
                include 'functions.php' ;
                message();
              ?>
              
              
          </form>
          
          
        </div>
        <div class="col-lg-4"></div>

      </div>

      <div class="row">
        
        <!--offsit-->
        
        <div class="col-lg-3">
        
        
        <!--type selection -->
        
        <?php 
        
        $active = "active"  ; 
        echo ' <div class="list-group" style="margin-top:0px"> ' ; 

        echo '   <a href="index.php" class="list-group-item '. ( !isset($_GET['type']) ? $active :"" ) .' ">  ALL</a> ' ; 
        echo '   <a href="index.php?type=Car" class="list-group-item '. ( ( isset($_GET['type']) && $_GET['type'] == "Car" ) ? $active : ""  ) .' ">Cars</a> ' ; 
        echo '   <a href="index.php?type=Furniture" class="list-group-item '. (  ( isset($_GET['type']) && ( $_GET['type'] == "Furniture" ) ) ? $active : ""  ) .'">Furniture</a> ' ; 
        echo '   <a href="index.php?type=Animal" class="list-group-item '. (  ( isset($_GET['type']) && ( $_GET['type'] == "Animal" )  ) ? $active : ""  ) .'">Animals</a> ' ;  
        echo '   <a href="index.php?type=Plant" class="list-group-item '. ( ( isset($_GET['type']) &&  ( $_GET['type'] == "Plant" ) ) ? $active : ""  ) .'">Plants</a>' ; 
        
        echo ' </div> ' ; 
        
         
        ?>
        
        </div> 

        <div class="col-lg-8">
          
          <div class="row">
            
            <?php 
              
              include 'connectDB.php' ; 

              if ( isset ($_SESSION['id'] ) )
                 $id = $_SESSION['id'] ;
              
              $show = '1' ; 
              if ( isset( $_GET['type'] ) ) { 
                
                if ( $_GET['type'] == 'Car' )
                  $show = " TYPE = 'Car' " ;                
                else if ( $_GET['type'] == 'Animal' )
                  $show = " TYPE = 'Animal' " ;                
                else if ( $_GET['type'] == 'Furniture' )
                  $show = " TYPE = 'Furniture' " ;                
                else if ( $_GET['type'] == 'Plant' )
                  $show = " TYPE = 'Plant' " ;
              }
              
              
              $search = "" ; 
              if ( isset( $_GET['search'] ) ) {
                $word = $_GET['search']  ; 
                $search = " And NAME LIKE '%$word%' " ; 
              }
              
              
              $query = " SELECT * FROM `ITEM` WHERE $show $search " ; 
              
              $res= mysqli_query($con,$query);
        
              
              if ( mysqli_num_rows($res) > 0 ) { 
                while ( $row = mysqli_fetch_array($res) ) {
                  
                  $itemId = $row[0] ; 
                  $itemName = $row[1] ; 
                  $itemPrice = $row[2] ;
                  $itemDescription = $row[3]; 
                  $itemImage = $row[4]; 
                  $dollar = "$" ; 
                  
                  // if you want to put the ratings
                  // <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  
                
                  echo "
                  
                  
                      <div class='col-lg-4 col-md-6 mb-4'>
                        <div class='card h-100'>
                          <a href='item.php?id=$itemId'><img class='card-img-top' src='$itemImage'></a>

                          <div class='card-footer' style='height:100%'>

                            <h4 class='card-title'>
                              <a href='item.php?id=$itemId'>$itemName</a>
                              <h5>$dollar $itemPrice</h5>
                               <p class='card-text'>$itemDescription</p>
                            </h4>
                            
                          </div>
                        </div>
                      </div>
                  
                  
                  
                  " ;
                  
                  
                }
              }
              
              
              mysqli_close($con);

            
            ?>
            

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
        
        <div class="col-lg-1"></div> 
        
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SHOPHERE 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
