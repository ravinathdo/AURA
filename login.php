<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AURA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="Wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstrap-css -->
        <!--gallery pop-up-css file -->
        <link rel="stylesheet" href="css/chocolat.css" type="text/css">
        <!-- // gallery pop-up-css file -->

        <!-- css -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <!--// css -->
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script> 
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        include './DB.php';
        if (isset($_POST['btnLogin'])) {

            $sql = "select * from aura_user where email = '" . $_POST['email'] . "' and pword = password('" . $_POST['pword'] . "')";
            //echo $sql;
            $result = getData($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['ssn_user'] = $row;
                    }
                    header("Location:home.php");
                }
            } else {
                echo '<p class="bg-danger"><b>Invalid Username or Password</b></p>';
            }
        }
        ?>
        <!-- banner -->
        <div class="bannerx" id="home">
            <div class="w3-header-bottom">
                <div class="w3layouts-logo">
                    <h1>
                        <a href="index.php">AURA </a>
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                    </h1>
                </div>
                <div class="top-nav">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
<?php include '_menu_common.php'; ?>
                            </ul>	
                            <div class="clearfix"> </div>
                        </div>	
                    </nav>		
                </div>
                <div class="agileinfo-social-grids">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>




            </div>

        </div>
        <!-- //banner -->



        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <br>
                    <br>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email"  name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pword" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"></label>
                            <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">.col-md-4</div>
            </div>
        </div>




        <!-- modal -->
        <div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                        <h4 class="modal-title">Wear fashions</h4>
                    </div> 
                    <div class="modal-body">
                        <div class="agileits-w3layouts-info">
                            <img src="images/pop1.jpg" alt="" />
                            <p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. Suspendisse ultrices hendrerit massa. Nam id metus id tellus ultrices ullamcorper.  Cras tempor massa luctus, varius lacus sit amet, blandit lorem. Duis auctor in tortor sed tristique. Proin sed finibus sem</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //modal -->








        <!-- //contact -->	

        <!-- //main -->

        <!-- footer -->

<?php include './_footer.php'; ?>
        <!-- //footer -->

        <script src="js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 400,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });

            });
        </script>
        <!-- gallery-pop-up-script -->
        <script src="js/jquery.chocolat.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.view-seventh a').Chocolat();
            });
        </script>
        <!-- //gallery-pop-up-script -->


        <script defer src="js/jquery.flexslider.js"></script>
        <!--Start-slider-script-->
        <script type="text/javascript">

            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>

        <script src="js/SmoothScroll.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- //here ends scrolling icon -->
    </body>	
</html>