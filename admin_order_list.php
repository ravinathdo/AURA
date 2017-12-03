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
                        <?php include './_right.php'; ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>




            </div>

        </div>
        <!-- //banner -->



        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>Customer Orders</h2>

                    <?php
                    include './DB.php';
                    if (isset($_GET['oid'])) {
                        $sql = " UPDATE aura_order SET STATUS = 'APPROVED' WHERE id = " . $_GET['oid'];
                        setUpdate($sql, TRUE);
                    }
                    ?>

                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#OID</th>
                                <th>Item Name</th>
                                <th>Order Qty</th>
                                <th>Status</th>
                                <th>Order By</th>
                                <th>Order Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = " select aura_order.id,aura_order.order_qty,aura_order.ordertime,aura_order.status,aura_item.item_name,aura_user.fname from aura_order
inner join aura_item
on aura_order.itemid = aura_item.id
inner join aura_user
on aura_user.id = aura_order.userid ";
                            $resultx = getData($sql);
                            if ($resultx != FALSE) {
                                while ($row = mysqli_fetch_assoc($resultx)) {
                                    ?>

                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['item_name']; ?></td>
                                        <td><?= $row['order_qty']; ?></td>
                                        <td><?= $row['status']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['ordertime']; ?></td>
                                        <td><?php if ($row['status'] == 'PENDING') {
                                        ?> <a class="btn btn-warning btn-xs" href="admin_order_list.php?status=APPROVE&oid=<?= $row['id']; ?>">Approve now</a> <?php
                                            } else {
                                                ?> <button type="button" class="btn btn-success btn-xs"><?= $row['status']; ?></button> <?php }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>



                </div>
                <div class="col-md-3"></div>
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

        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
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