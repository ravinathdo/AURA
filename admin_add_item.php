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
                <div class="col-md-8">
                    <h2>Manage Items</h2>
                    <form class="form-horizontal" action="admin_add_item.php"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="item_name" required="" class="form-control" id="inputEmail3" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" required="" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control">
                                    <option>--select category--</option>
                                    <option value="SHIRT">SHIRT</option>
                                    <option value="T-SHIRT">T-SHIRT</option>
                                    <option value="FROCK">FROCK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">price</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" required="" class="form-control" id="inputEmail3" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" name="available_qty" required=""  class="form-control" id="inputEmail3" placeholder="Item Name">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="fileToUpload" required="" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="btnAdd" class="btn btn-warning">Add Item</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-4">

                    <?php
                    if (isset($_POST['btnAdd'])) {

                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
                        if (isset($_POST["btnAdd"])) {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if ($check !== false) {
                                //echo "File is an image - " . $check["mime"] . ".";
                                echo '<p></p>';
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }
                        }
// Check if file already exists
                        if (file_exists($target_file)) {
                            echo "Sorry, file already exists.";
                            $uploadOk = 0;
                        }
// Check file size
                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                            echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }
// Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }
// Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                echo '<p class="bg-success">The Item has been uploaded.</p>';
                                $fileName = basename($_FILES["fileToUpload"]["name"]);
                                //ready to insert data into database and preview

                                include './DB.php';
                                $sql = " INSERT INTO `aura_item`
            (`item_name`,
             `category`,
             `price`,
             `available_qty`,
             `status`,
             `img_path`)
VALUES ('" . $_POST['item_name'] . "',
        '" . $_POST['category'] . "',
        '" . $_POST['price'] . "',
        '" . $_POST['available_qty'] . "',
        'ACTIVE',
        '" . $fileName . "'); ";

                                setData($sql, FALSE);
                                ?>
                    
                    <img src="uploads/<?= $fileName;?>" style="width: 100%" />

                                <?php
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }//btnAdd
                    ?>

                </div>
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