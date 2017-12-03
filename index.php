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

        <style type="text/css">
            .Itemthub{
                width: 200px;
                height: 300px;
                float: left;

            }
        </style>
    </head>
    <body>
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
                                <?php include './_menu_common.php'; ?>
                            </ul>	
                            <div class="clearfix"> </div>
                        </div>	
                    </nav>		
                </div>
                <div class="agileinfo-social-grids">
                    <ul>
                        <li><a href="registration.php"><i class="fa fa-user"></i></a></li>
                        <li><a href="login.php"><i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>




            </div>

        </div>
        <!-- //banner -->



        <div class="container">
            
            <div class="row">
                <div class="col-md-12"> 
                    <center>
                    <p>Your Fashion Partner, Negombo Road,Chilaw</p>
                    <img src="images/aura.PNG" style="width: 150px" />
                    <p>Email: info@aura.com, TP: +9431 255 5547</p>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                    <?php
                    include './DB.php';
                    $sql = " SELECT * FROM aura_item WHERE status = 'ACTIVE' ";
                    $resultx = getData($sql);
                    if ($resultx != FALSE) {
                        while ($row = mysqli_fetch_assoc($resultx)) {
                            ?>

                            <div class="Itemthub">
                                <form action="purchase_item.php"  method="post" >
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>" />
                                    <b><?= $row['item_name']; ?></b>
                                    <img src="uploads/<?= $row['img_path'] ?>" alt="" class="img-thumbnail">
                                    <table>
                                        <tr>
                                            <td>Rs <?= $row['price'] ?> <span class="btn btn-warning btn-xs" >Available <?= $row['available_qty'] ?>  </span></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                   
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>











        <!-- //contact -->	

        <!-- //main -->

        <!-- footer -->

        <?php // include './_footer.php';  ?>
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