<?php
    session_start();
    

    
    include 'connectDB.php' ; // this will import the code in connectDB.php so we can connect every time using only this line

    if ( isset( $_SESSION['email'])  ) {

        $email = $_SESSION['email'];

        $query = "SELECT * FROM USER WHERE EMAIL = '$email' ";

        $res = mysqli_query($con, $query);

        $row = mysqli_fetch_array($res);

        mysqli_close($con);

    }
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>
    
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">
    
    <!--google icons-->
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
                  <div class="jumbotron jumbotron-billboard" style="margin-bottom:0px;">
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

        <div class="col-lg-4">
          <div class="card mt-4" style="border-radius:30px">
            <div class="card-header" style="border-radius:30px 30px 0px 0px">
              Seller Info
            </div>
            <div class="card-body ">
              
              <?php 
              
              include 'connectDB.php' ; 
              
              $itemId = $_GET['id'] ; 
              
              
              $query = "SELECT `USER_ID` FROM `ITEM` WHERE ID = $itemId " ; 
                          
              $res= mysqli_query($con,$query);
                
              $row = mysqli_fetch_array($res) ; 
              
              $profileUserId = $row[0] ;
              
              $query   = "SELECT * FROM `USER` WHERE ID = $profileUserId " ; 
                          
              $res= mysqli_query($con,$query);
                
              $row = mysqli_fetch_array($res) ; 
              
              $profileUserName = $row[1] ; 
              $profileUserEmail = $row[2] ; 
              $profileUserPhone = $row[4] ; 
              $profileUserPicture = $row[5] ;
              
              
              echo "
              
                            <div class=' text-center img-responsive center-block' ><img height=200  src='$profileUserPicture' style='border-radius:50%;margin-bottom:6px'></img></div>

              
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
                            
                              <div class=' text-center img-responsive center-block' style='margin-top:10px' ><a href='profile.php?id=$profileUserId' class='btn btn-primary btn-success' > Viem Profile  </a></div>
              
              
              ";
              
               
              
              mysqli_close($con) ;
              
              ?>
              
              

              
              
              
            </div>
          </div>
        </div>
        <!-- /.col-lg-3 -->


        <div class="col-lg-8">
          
          
          
          <?php 
          
          
              
          if (  !isset( $_GET['id'] ) )
              echo "
                <script>
                        window.location = 'index.php?error=Item is not avaiable any more';
                </script>

              " ; 
          else {
            
            
            include 'connectDB.php' ; 
            $itemId = $_GET['id'] ; 
            
            $query = "SELECT * FROM `ITEM` WHERE ID = $itemId " ; 
            
            $res= mysqli_query($con,$query);
            
            
            if ( mysqli_num_rows($res) > 0 ) {
              
              $row = mysqli_fetch_array($res) ; 
              
              $itemName = $row[1] ; 
              $itemPrice = $row[2] ;
              $itemDescription = $row[3]; 
              $itemImage = $row[4]; 
              $dollar = "$" ; 
              
              
              // item information block
              echo "
                        <div class='card mt-4 seller-card' >
                          <img class='card-img-top img-fluid' src='$itemImage' alt=''>
                          <div class='card-body'>
                            <h3 class='card-title '>$itemName</h3 >
                            <h4>$dollar $itemPrice</h4>
                            <p class='card-text'>$itemDescription</p>
                          </div>
                        </div>
              " ;
              
            } else {
              echo "
                <script>
                        window.location = 'index.php?error=Item is not avaiable any more';
                </script>

              " ; 
            }

            
          }
          
          
          
            mysqli_close($con);


          
          
          ?>
          
          

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Comments
            </div>
            <div class="card-body">
              
              <?php 
              
              include 'connectDB.php' ; 
              
              $query = " SELECT * FROM COMMENT WHERE ITEM_ID = $itemId " ; 
              
              $res= mysqli_query($con,$query);

              if ( mysqli_num_rows($res) > 0 ) {
              
                while ( $row = mysqli_fetch_array($res) ) {  
                
                  
                  $commentText = $row[2] ; 
                  $commentorId = $row[4] ;
                  
                  $query2 = "select USERNAME from USER WHERE ID = $commentorId " ;
                  
                  $res2 = mysqli_query($con,$query2) ; 
                  
                  $row2 = mysqli_fetch_array($res2) ; 
                  
                  $userName = $row2[0] ; 
                  
                  
                  echo "
                        <p>$commentText</p>
                        <small class='text-muted'>comment by $userName</small>
                        <hr>
                  " ;
                  
                }
              
            } else {
              echo "
                        <p>There are no comments yet</p>
                        <hr>

              " ; 
            }
              
              
                mysqli_close($con);

                    
                    
              ?>
              
              
              <form action="add-comment.php" method="POST" >
                
                <div class="form-group">
                  <label for="comment">Comment:</label>
               <?php 
            
            
                    echo ' <input type="hidden" value="'.$itemId.'" name="itemId" > ' ;
                
                    
                if ( !isset($_SESSION['email']) ) { 
                  
                    echo '
                            <textarea  disabled name="commentText" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <button type="submit" disabled class="btn btn-success">Leave a Comment</button> 
                
                        '  ;
                } else {
                  
                  
                    echo ' 
                            <textarea   name="commentText" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                              <button type="submit"  class="btn btn-success">Leave a Comment</button>
                        '  ;
                  
                }
                
                
                    
                ?>
                
                
              </form>
              
              
              
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
        <!--<div class="col-lg-1"></div>-->
        
      </div>

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
