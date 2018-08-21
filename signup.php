<?php
    session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="css/shop-homepage.css" rel="stylesheet">-->
    <link href="css/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/login.js"></script>
</head>
<body>
    
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">-->
    <!--  <div class="container">-->
    <!--    <a class="navbar-brand" href="#">Start Bootstrap</a>-->
    <!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">-->
    <!--      <span class="navbar-toggler-icon"></span>-->
    <!--    </button>-->
    <!--    <div class="collapse navbar-collapse" id="navbarResponsive">-->
    <!--      <ul class="navbar-nav ml-auto">-->
    <!--        <li class="nav-item active">-->
    <!--          <a class="nav-link" href="#">Home-->
    <!--            <span class="sr-only">(current)</span>-->
    <!--          </a>-->
    <!--        </li>-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#">Sign In</a>-->
    <!--        </li>-->

    <!--      </ul>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</nav>-->
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img class="main-logo" height=40 src="/imgs/logoonly.png" alt=""/>
        <a class="navbar-brand" href="/index.php">SHOP HERE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
         
              
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="/signin.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/signup.php">Sign Up</a>
            </li>            

          </ul>
        </div>
      </div>
    </nav>
        
    
    <div class="container">
        

    
    <div  class="row" style="padding-top:100px">
        <div class="col-lg-3"></div>
        <div class=" col-lg-6 ">
            <div class="account-box">
                <div class="logo ">
                    <img height=70 src="/imgs/logo.png" alt="" style="    margin: auto; display: block; margin-bottom: 20px;" />
                </div>
                <form class="form-signin" action="registerNewUser.php" method="get">
                    
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                </div>
                
                <div class="form-group">
                    <input type="emai" class="form-control" placeholder="Email" name="email" required autofocus />
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Re-enter Password" name="password2" required />
                </div>
                                
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Phone Number" name="phone-number" required />
                </div>
                
                <!--<label class="checkbox">-->
                <!--    <input type="checkbox" value="remember-me" />-->
                <!--    Keep me signed in-->
                <!--</label>-->
                <button class="btn btn-lg btn-block yellow-bg" type="submit">
                    Sign Up</button>
                </form>
                
            </div>
            
            

                
            <?php
                include 'functions.php' ;
                message();
            ?>
            
        </div>
    </div>
</div>

    
    
</body>
</html>