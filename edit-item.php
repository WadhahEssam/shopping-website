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
        <a class="navbar-brand" href="#">SHOP HERE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle nav-link btn btn-info navbar-btn" data-toggle="dropdown" href="#" style="font-weight:bold">Notifications
              <img height=20  src="/imgs/notification.png" style="margin-left:7px" alt="">
              <span class="caret"></span></a>

              <ul class="dropdown-menu" style="  background-color: #117a8b;">
                <div class="notification-div">
                  <ul class="notification-points">
                    <li class="notification-point-li"><a href="" class="notification-point">Your requestesd item is now available by mohammed</a></li>
                    <li class="notification-point-li"><a href="" class="notification-point">You have recevied one comment</a></li>
                    <li class="notification-point-li"><a href="" class="notification-point">Your requestesd item is now available by Ali</a></li>
                  </ul>
                </div>
              </ul>
            </li>       
         </ul>
              
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sign Up</a>
            </li>            
            <li class="nav-item">
              <a class="usernamenav nav-link" href="#" style="color:antiquewhite;margin-left:10px">Wadah Esam</a>
            </li
            <li class="nav-item">
            <a href="" class="btn btn-danger" style="border-radius:10%;"><img height=20 src="/imgs/sign-out.png"></img></a>   
            </li>
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
                        <button type="button" class="btn btn-primary btn-lg"><img class="profile-picture" src="/imgs/profile.png"></img><br> <h4>Profile</h1></button>
                        
                      </div>
                    </div>
                  <div class="col-lg-4"></div>
              </div>
              <div class="row">
                    <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-md btn-success  sell-item-button">Sell Item <img class="menu-picture" src="/imgs/add-item.png"></img> </button>
                          <button type="button" class="btn btn-primary btn-md btn btn-warning"> <img class="menu-picture" src="/imgs/my-items.png"> </img>Request Item </button>
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
            <form>
                
              <div class="form-group">
                <label for="email">Edit Product Name :</label>
                <input type="email" class="form-control" id="email" value="Galaxy s7 edge">
              </div>
              
              <div class="form-group">
                <label class="control-label" for="prependedtext">Edit Price :</label>
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input id="prependedtext" name="prependedtext" class="form-control" placeholder="" type="text" required="" value="20">
                 </div>
              </div>
              
              <div class="form-group">
                <label for="comment">Edit Desciption :</label>
                <textarea class="form-control" rows="5" id="comment" >Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                dolor in hendrerit in vulputate velit esse molestie consequat,
                vel illum dolore eu feugiat nulla facilisis at vero eros et
                accumsan et iusto odio dignissim qui blandit praesent luptatum
                zzril delenit augue duis dolore te feugait nulla facilisi.
                Nam liber tempor cum soluta nobis eleifend option congue
                nihil imperdiet doming id quod mazim placerat facer possim
                assum. Typi non habent claritatem insitam; est usus legentis
                in iis qui facit eorum claritatem. Investigationes
                demonstraverunt lectores legere me lius quod ii legunt saepius.
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum. Mirum est notare quam littera gothica,
                quam nunc putamus parum claram, anteposuerit litterarum formas
                humanitatis per seacula quarta decima et quinta decima. Eodem
                modo typi, qui nunc nobis videntur parum clari, fiant sollemnes
                in futurum.</textarea>
              </div>

              <div class="form-group">
                <input type="file" name="img[]" class="file">
                <div class="input-group col-xs-12">
                  <span class="input-group-addon"><i class="material-icons" style="position:relative;font-size:15px;">&#xe8a7;</i></span>
                  <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                  <span class="input-group-btn">
                    <button class="browse btn btn-primary input-lg" type="button"><i class="material-icons" style="position:relative;font-size:15px;top:2px">&#xe89d;</i> Browse</button>
                  </span>
                </div>
              </div>  
              
              <button type="submit" class="btn btn-default">Submit Modification</button>
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
