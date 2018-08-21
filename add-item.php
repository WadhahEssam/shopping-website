<?php
    session_start();
    
    if ( !isset($_SESSION['email']) )
        header("location: signin.php?error=YOU SHOULD LOG IN FIRST TO ENTER THIS PAGE"); 
        

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
    
    <script>
        $(document).on('click', '.browse', function(){
          var file = $(this).parent().parent().parent().find('.file');
          file.trigger('click');
        });
        $(document).on('change', '.file', function(){
          $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>
    
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
    
    
    
    <!--jumbotron for people who are signed in-->
    <div class="jumbotron jumbotron-billboard" style="margin-bottom: 0px;;padding-top:30px;padding-bottom: 30px;">
          <div class="img"></div>
            <div class="container">
              <div class="row" style="margin-bottom:20px">
                  <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div class="btn-group">
                        <button type="button" onclick="location.href='/profile.php';" class="btn btn-primary btn-lg"><img class="profile-picture" src="/imgs/profile.png"></img><br> <h4>Profile</h1></button>
                        
                      </div>
                    </div>
                  <div class="col-lg-4"></div>
              </div>
              <div class="row">
                    <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-md btn-success  sell-item-button">Sell Item <img class="menu-picture" src="/imgs/add-item.png"></img> </button>
                          <button type="button" onclick="location.href='/requestitem.php';" class="btn btn-primary btn-md btn btn-warning"> <img class="menu-picture" src="/imgs/my-items.png"> </img>Request Item </button>
                        </div>
                      </div>
                    <div class="col-lg-4"></div>
              </div>
            </div>
    </div>


    <!-- Page Content -->
    <div class="container">

      <div class="row">
        
        <!--offsit-->
        <div class="col-lg-3"></div> 

        <div class="col-lg-6" style="margin:30px 0px">
          
           <form  enctype="multipart/form-data" method ="POST" action="add-item-function.php" >
                
              <div class="form-group">
                <label for="email">Product Name :</label>
                <input name="productName" type="text" class="form-control" id="email">
              </div>
              
              <div class="form-group">
                <label class="control-label" for="prependedtext">Type :</label>
                <div class="input-group">
                  <select class="selectpicker" name="itemType" style="padding: 7px 20px;border: 1px solid #c5c5c5;border-radius: 4px;">
                    <option>Car</option>
                    <option>Animal</option>
                    <option>Plant</option>
                    <option>Furniture</option>
                  </select>
                </div>
                 
              </div>
              
              <div class="form-group">
                <label class="control-label" for="prependedtext">Price :</label>
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input id="prependedtext" name="price" class="form-control" placeholder="" type="number" min="0" step="any" value="0.00">
                 </div>
              </div>
              
              <div class="form-group">
                <label for="comment">Desciption :</label>
                <textarea name="description" class="form-control" rows="5" id="comment"></textarea>
              </div>

              <div class="form-group">
                <div class="input-group col-xs-12">
                  <span name="image" class="input-group-addon"><i name="image" class="material-icons" style="position:relative;font-size:15px;">&#xe8a7;</i></span>
                  <input type="file" value="file" name="image" id="uploadfile" accept="image/*" class="form-control input-lg"  placeholder="Upload Image">
                </div>
              </div>  
              
              <button type="submit" class="btn btn-default">Add item</button>
              
            </form>
            
        </div>
        
        <div class="col-lg-3"></div> 
        
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
