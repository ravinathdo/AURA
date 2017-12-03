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
                                <?php
                                if ($_SESSION['ssn_user']['role'] == 'CUSTOMER') {
                                    include './_menu_customer.php';
                                } else if ($_SESSION['ssn_user']['role'] == 'ADMIN') {
                                    include './_menu_admin.php';
                                }
                                ?>
                            </ul>	
                            <div class="clearfix"> </div>
                        </div>	
                    </nav>		
                </div>
                <div class="agileinfo-social-grids">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i><?= $_SESSION['ssn_user']['fname']; ?></a></li>
                        <li><a href="change_password.php"><i class="fa fa-lock"></i></a></li>
                        <li><a href="logout.php"><i class="fa fa-arrow-left"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>




            </div>

        </div>
        <!-- //banner -->



        <div class="container">
            <div class="row">
                <div class="col-md-8" id="PRINT">

                    <?php

                  
                    if (isset($_POST['btnPay'])) {
                        include './DB.php';
                        $sql = " insert into `aura_sales`
            (`userid`,
             `itemid`,
             `qty`,
             `item_price`,
             `total`)
values ('".$_SESSION['ssn_user']['id']."',
        '".$_POST['id']."',
        '".$_POST['qty']."',
        '".$_POST['price']."',
        '".$_POST['total']."'); ";

                        setData($sql, FALSE);
                        //update availabe 
                        $balance = $_POST['available_qty'] - $_POST['qty'];
                        $upQuery = " UPDATE aura_item SET available_qty = '".$balance."' WHERE id = ".$_POST['id'];
                        setUpdate($upQuery, FALSE);
                        
                        ?>

                        <h2>‘AURA’ Textile-Online - Payment</h2>
                        <p><?php printNowTime(); ?></p>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Item Name</td>
                                    <td><?= $_POST['item_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Unit Price</td>
                                    <td><?= $_POST['price'] ?></td>
                                </tr>
                                <tr>
                                    <td>Purchase Qty</td>
                                    <td><?= $_POST['qty'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total </td>
                                    <td><?= $_POST['total'] ?></td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td>Your payment has been successfully completed</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>

                    <input type="button" onclick="printDiv('PRINT')" value="print" />
                </div>
                <div class="col-md-4"></div>
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

        <script type="text/javascript">
            function printDiv(divId) {
                var printContents = document.getElementById(divId).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

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