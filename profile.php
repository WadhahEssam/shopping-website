<?php
    session_start();
    
    include 'connectDB.php' ; // this will import the code in connectDB.php so we can connect every time using only this line

    if ( isset( $_SESSION['email'])  ) { 
    $email = $_SESSION['email'];
    
    $query = "SELECT * FROM USER WHERE EMAIL = '$email' ";
    
    $res = mysqli_query($con,$query);
    
    $row= mysqli_fetch_array($res);
  
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

    <title>Shop Homepage - Start Bootstrap Template</title>
    
    
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <!--for css icons-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    

    
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
                 <img height=20  src='/imgs/notification.png' style='margin-left:7px' alt=''>
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
                  <div class="jumbotron jumbotron-billboard" style="margin-bottom: 0px;">
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
          
    
                <div class="jumbotron jumbotron-billboard" style="margin-bottom: 0px;;padding-top:30px;padding-bottom: 30px;">
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

      <div class="row"> 
      
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
                  <div class="col-lg-4"></div>
          <?php
            include 'functions.php' ;
            message();
          ?>
        </div>
        <div class="col-lg-4"></div>

        </div>
      
      <div class="row">
        
        <!--offsit-->

        <div class="col-lg-4">
          <div class="card mt-4" style="border-radius:30px;margin-bottom:20px">
            <div class="card-body">
              
              
              
              <?php 
              
              
              include 'connectDB.php' ; 
              
              if ( !isset($_GET['id']) ) {
                $query = "SELECT * FROM `USER` WHERE EMAIL = '$email' " ; 
                if ( isset($_SESSION['id']) )
                    $profileUserId = $_SESSION['id'] ;
                
                
              } else {
                $profileUserId = $_GET['id'] ; 
                $query = "SELECT * FROM `USER` WHERE ID = '$profileUserId' " ; 

              }
              
            

                          
              $res= mysqli_query($con,$query);
                
              $row = mysqli_fetch_array($res) ; 
              
              $profileUserName = $row[1] ; 
              $profileUserEmail = $row[2] ; 
              $profileUserPhone = $row[4] ; 
              $profileUserPicture = $row[5] ;
              
              
              echo "
              
                            <div class=' text-center img-responsive center-block' ><img height=200  src='$profileUserPicture' style='border-radius:50%;margin-bottom:6px'></img></div>

              " ; 
              
              
              if (    isset( $_SESSION['email']) && $profileUserEmail == $_SESSION['email'] )  {
                echo ' 
                
                
                    <div>
                      <form enctype="multipart/form-data" action="changeProfilePicture.php" method="POST" >
                          <div class="form-group" style="margin-top:10px">
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="material-icons" style="position:relative;font-size:15px;">&#xe8a7;</i></span>
                                <input type="file" value="file" name="image" id="uploadProfileImage" accept="image/*" class="form-control input-lg"  placeholder="Change Profile Image"  onchange="javascript:this.form.submit();" >                                </span>
                            </div>
                          </div>  
                      </form>
                  </div>
                
                
                ';
              }
              
                  // <button class="browse btn btn-primary input-lg" type="button"><i class="material-icons" style="position:relative;font-size:15px;top:2px">&#xe89d;</i> Browse</button>
                
              echo " 
                            <a href='profile.php?id=$profileUserId' style='color:black'><h3 class='card-title text-center'>$profileUserName</h3></a>
              
                            <div class='col-lg-12' style='argin-bottom:10px'>
                              <div class='card lg-12' style='border-radius:30px'>
                                <div class='card-header' style='border-radius:30px 30px 0px 0px'>
                                  Contact
                                </div>
                                <div class='card-body '>
                    "; 
                    
                  if ( isset($_SESSION['email']) ) {
                    
                    echo " 
                                  <h6 class='card-title text-center'>$profileUserEmail</h4>
                                  <h6 class='card-title text-center'>$profileUserPhone</h4>
                          " ; 
                          
                  } else { 
                    
                    echo " 
                                  <div class='alert alert-danger'>
                                    <strong>Sorry! </strong>You can't see the contact unless you are signed in
                                  </div>
                          "; 
                          
                  }
                  
                  echo "              </div>
                                
                              </div>
                            </div>
                            
              
              
              ";
              
               
              
              mysqli_close($con) ;
              
              
              ?>
              
                  

              
              
            </div>
          </div>
        </div>
        
        <div class="col-lg-8">
            
          <div class="row" style="margin-top:20px">


            <?php 
              
              include 'connectDB.php' ; 
              
              
              
                            
              if ( !isset($_GET['id']) ) {
                $query = "SELECT * FROM `ITEM` WHERE USER_ID in ( SELECT ID FROM USER WHERE EMAIL = '$email' ) " ; 

                
              } else {
                $profileUserId = $_GET['id'] ; 
                $query = " SELECT * FROM `ITEM` WHERE USER_ID = $profileUserId " ; 
              }
              
              
              
              
              
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
                          <div class='card-body'>
                              <h4 class='card-title'>
                              <a href='item.php?id=$itemId'>$itemName</a>
                              <h5>$dollar $itemPrice</h5>
                              <p class='card-text'>$itemDescription</p>
                              </h4>
                          </div>
                          <div class='card-footer'>


                              
                        ";
                    if ( $profileUserEmail == $_SESSION['email']  ){
                     echo "         <a href='deleteItem.php?id=$itemId' type='button' class='btn btn-primary btn-md btn btn-danger'> Delete </a> ";
                    }        
                                  // <a href='' type='button' class='btn btn-primary btn-md btn btn-success'> Edit </a> 
                  echo "          
                            
                          </div>
                        </div>
                      </div>
                  
                  
                  
                  " ;
                  
                  
                }
              }
              
              
              mysqli_close($con);

            
            ?>

            
            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--  <div class="card h-100">-->
            <!--    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>-->
            <!--    <div class="card-body">-->
            <!--      <h4 class="card-title">-->
            <!--        <a href="#">Item One</a>-->
            <!--      </h4>-->
            <!--      <h5>$24.99</h5>-->
            <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>-->

            <!--    </div>-->
            <!--    <div class="card-footer " >-->
            <!--      <small class="text-muted ">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->


          </div>
          <!-- /.row -->            
        </div> 
        
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
