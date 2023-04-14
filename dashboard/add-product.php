<?php
    ob_start();
    include('include/header.php');
    include('include/sidebar.php');
    include('include/connection.php');
    $categories = mysqli_query($con,"select * from categories where status = 1");
    $brands = mysqli_query($con,"select * from brands where status = 1");
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = mysqli_query($con,"select * from products where id = '$id'");
        $fetch = mysqli_fetch_array($query);
    }
?>
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
                <div class="row">
                    <div class="col-md-9 center-block">


                        <!-- Form Wizard -->
                        <div class="admin-form theme-primary">

                            <div class="panel">

                                <form method="post" action="#" id="admin-form" enctype='multipart/form-data'>
                                    <div class="panel-body">

                                        <div class="section-divider mb40 mt20"><span> Add Product </span>
                                        </div><!-- .section-divider -->

                                        <div class="section row">
                                            <div class="col-md-6">
                                                <select name="category" class="form-control">
                                                    <option value="" disabled selected>Select Category</option>
                                                    <?php
                                                        while($category = mysqli_fetch_array($categories))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $category['id']?>"> <?php echo $category['name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div><!-- end section -->
                                            <div class="col-md-6">
                                                <select name="brand" class="form-control">
                                                    <option value="" disabled selected>Select Brand</option>
                                                    <?php
                                                        while($brand = mysqli_fetch_array($brands))
                                                        {
                                                    ?>
                                                            <option value="<?php echo $brand['id']?>"> <?php echo $brand['name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div><!-- end section -->
                                        </div><!-- end .section row section -->
                                        <div class="section row">
                                            <div class="col-md-6">
                                                <label for="code" class="field prepend-icon">
                                                    <input type="text" name="code" id="code" class="gui-input"
                                                        placeholder="Enter Code..." value='<?php echo isset($fetch['code']) ? $fetch['code'] : null?>'>
                                                    <label for="code" class="field-icon"><i
                                                            class="fa fa-user"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                            <div class="col-md-6">
                                                <label for="name" class="field prepend-icon">
                                                    <input type="text" name="name" id="name" class="gui-input"
                                                        placeholder="Enter Name..." value='<?php echo isset($fetch['name']) ? $fetch['name'] : null?>'>
                                                    <label for="name" class="field-icon"><i
                                                            class="fa fa-user"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                        </div><!-- end .section row section -->
                                        <div class="section row">
                                            <div class="col-md-4">
                                                <label for="price" class="field prepend-icon">
                                                    <input type="text" name="price" id="price" class="gui-input"
                                                        placeholder="Enter Price..." value='<?php echo isset($fetch['price']) ? $fetch['price'] : null?>'>
                                                    <label for="price" class="field-icon"><i
                                                            class="fa fa-user"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                            <div class="col-md-4">
                                                <label for="stock" class="field prepend-icon">
                                                    <input type="text" name="stock" id="stock" class="gui-input"
                                                        placeholder="Enter Stock..." value='<?php echo isset($fetch['stock']) ? $fetch['stock'] : null?>'>
                                                    <label for="stock" class="field-icon"><i
                                                            class="fa fa-user"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                            <div class="col-md-4">
                                                <label for="sale" class="field prepend-icon">
                                                    <input type="text" name="sale" id="sale" class="gui-input"
                                                        placeholder="Enter Sale..." value='<?php echo isset($fetch['sale']) ? $fetch['sale'] : null?>'>
                                                    <label for="sale" class="field-icon"><i
                                                            class="fa fa-user"></i></label>
                                                </label>
                                            </div><!-- end section -->
                                        </div><!-- end .section row section -->
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="short_description" class="field prepend-icon">
                                                    <input type="short_description" name="short_description" id="short_description" class="gui-input"
                                                        placeholder="Create a Short Description" value='<?php echo isset($fetch['short_description']) ? $fetch['short_description'] : null?>'>
                                                    <label for="short_description" class="field-icon"><i
                                                            class="fa fa-lock"></i></label>
                                                </label>
                                            </div>
                                        </div><!-- end section -->
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <textarea style='width:100%;' name="long_description" id="" cols="100" rows="7" placeholder="Description">
                                                <?php echo isset($fetch['long_description']) ? $fetch['long_description'] : null?>
                                                </textarea>
                                            </div>
                                        </div><!-- end section -->
                                        <?php
                                            if(isset($id))
                                            {
                                                echo '<img src="uploads/'.$fetch["image"].'" height="50px">';
                                            }
                                        ?>
                                        <div class="section">
                                            <label for="file1" class="field file">
                                                <span class="button btn-primary"> Choose File </span>
                                                <input type="file" class="gui-file" name="image" id="file1"
                                                    onChange="document.getElementById('uploader1').value = this.value;">
                                                <input type="text" class="gui-input" id="uploader1"
                                                    placeholder="no file selected" readonly>
                                            </label>
                                        </div><!-- end  section -->
                                        <div class="section row">
                                        <div class="col-md-12">
                                            <select name="status" id="" class="form-control">
                                                <option value="1" <?php if(isset($fetch['status'])) {echo $fetch['status'] == 1 ? 'selected' : null;}?>>Active</option>
                                                <option value="0" <?php if(isset($fetch['status'])) {echo $fetch['status'] == 0 ? 'selected' : null;}?>>InActive</option>
                                            </select>
                                        </div>
                                    </div><!-- end section -->
                                        <div class="section">
                                            <label for="checkbox">
                                                Featured
                                                <input type="checkbox" class="checkbox" value='1' name="featured" <?php if(isset($fetch['is_featured'])) {echo $fetch['is_featured'] == 1 ? 'checked' : null;}?>>
                                            </label>
                                        </div><!-- end  section -->
                                    </div><!-- end .form-body section -->
                                    <div class="panel-footer text-right">
                                        <a href="users.php">
                                            <button type="button" class="button btn-primary"> Go Back </button>
                                        </a>
                                        <button type="submit" name="submit" class="button btn-primary"> Save </button>
                                    </div><!-- end .form-footer section -->
                                </form>
                                <?php
                                    if(isset($_POST['submit']))
                                    {
                                        $name               = $_POST['name'];
                                        $code               = $_POST['code'];
                                        $category           = $_POST['category'];
                                        $brand              = $_POST['brand'];
                                        $price              = $_POST['price'];
                                        $stock              = $_POST['stock'];
                                        $sale               = $_POST['sale'];
                                        $short_description  = $_POST['short_description'];
                                        $long_description   = $_POST['long_description'];
                                        $featured           = $_POST['featured'];
                                        $status             = $_POST['status'];
                                        $image              = $_FILES['image']['name'];
                                        $tmp_dir            = $_FILES['image']['tmp_name'];
                                        $dir                = 'uploads/';
                                        
                                        if(!empty($image))
                                        {
                                            move_uploaded_file($tmp_dir,$dir.$image);
                                        }
                                        else
                                        {
                                            $image = $fetch['image'];
                                        }
                                        if(isset($_GET['id']))
                                        {
                                            $update = "UPDATE `products` SET `category_id`='$category',`brand_id`='$brand',`image`='$image',`name`='$name',`price`='$price',`stock`='$stock',`code`='$code',`sale`='$sale',`short_description`='$short_description',`long_description`='$long_description',`is_featured`='$featured',`status`='$status' WHERE id = ".$_GET['id']."";
                                            $sql_query = mysqli_query($con,$update);
                                        }
                                        else
                                        {
                                            $insert = "INSERT INTO `products`( `category_id`, `brand_id`, `image`, `name`, `price`, `stock`, `code`, `sale`, `short_description`, `long_description`, `is_featured`, `status`) VALUES ('$category','$brand','$image','$name','$price','$stock','$code','$sale','$short_description','$long_description','$featured','$status')";
                                            $sql_query = mysqli_query($con,$insert);
                                        }
                                        if($sql_query)
                                        {
                                            header('location:products.php');
                                        }
                                        else
                                        {
                                            echo "Unvalid Extension!";
                                        }
                                    }
                                ?>
                            </div>

                        </div>
                        <!-- end: .admin-form -->

                    </div>

                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Sparklines CDN -->
    <script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>

    <!-- Chart Plugins -->
    <script type="text/javascript" src="vendor/plugins/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="vendor/plugins/circles/circles.js"></script>
    <script type="text/javascript" src="vendor/plugins/raphael/raphael.js"></script>

    <!-- Holder js  -->
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Admin Panels  -->
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js">
    </script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript" src="assets/js/pages/widgets.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            "use strict";

            // Init Theme Core      
            Core.init({
                sbm: "sb-l-c",
            });

            // Init Widget Demo JS
            // demoHighCharts.init();

            // Because we are using Admin Panels we use the OnFinish 
            // callback to activate the demoWidgets. It's smoother if
            // we let the panels be moved and organized before 
            // filling them with content from various plugins

            // Init plugins used on this page
            // HighCharts, JvectorMap, Admin Panels

            // Init Admin Panels on widgets inside the ".admin-panels" container
            $('.admin-panels').adminpanel({
                grid: '.admin-grid',
                draggable: true,
                preserveGrid: true,
                mobile: false,
                callback: function () {
                    bootbox.confirm('<h3>A Custom Callback!</h3>', function () {});
                },
                onFinish: function () {
                    $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                    // Init the rest of the plugins now that the panels
                    // have had a chance to be moved and organized.
                    // It's less taxing to organize empty panels
                    demoHighCharts.init();
                    runVectorMaps();

                    // We also refresh any "in-view" waypoints to ensure
                    // the correct position is being calculated after the 
                    // Admin Panels plugin moved everything
                    Waypoint.refreshAll();

                },
                onSave: function () {
                    $(window).trigger('resize');
                }
            });

            // Widget VectorMap
            function runVectorMaps() {

                // Jvector Map Plugin
                var runJvectorMap = function () {
                    // Data set
                    var mapData = [900, 700, 350, 500];
                    // Init Jvector Map
                    $('#WidgetMap').vectorMap({
                        map: 'us_lcc_en',
                        //regionsSelectable: true,
                        backgroundColor: 'transparent',
                        series: {
                            markers: [{
                                attribute: 'r',
                                scale: [3, 7],
                                values: mapData
                            }]
                        },
                        regionStyle: {
                            initial: {
                                fill: '#E5E5E5'
                            },
                            hover: {
                                "fill-opacity": 0.3
                            }
                        },
                        markers: [{
                            latLng: [37.78, -122.41],
                            name: 'San Francisco,CA'
                        }, {
                            latLng: [36.73, -103.98],
                            name: 'Texas,TX'
                        }, {
                            latLng: [38.62, -90.19],
                            name: 'St. Louis,MO'
                        }, {
                            latLng: [40.67, -73.94],
                            name: 'New York City,NY'
                        }],
                        markerStyle: {
                            initial: {
                                fill: '#a288d5',
                                stroke: '#b49ae0',
                                "fill-opacity": 1,
                                "stroke-width": 10,
                                "stroke-opacity": 0.3,
                                r: 3
                            },
                            hover: {
                                stroke: 'black',
                                "stroke-width": 2
                            },
                            selected: {
                                fill: 'blue'
                            },
                            selectedHover: {}
                        },
                    });
                    // Manual code to alter the Vector map plugin to 
                    // allow for individual coloring of countries
                    var states = ['US-CA', 'US-TX', 'US-MO',
                        'US-NY'
                    ];
                    var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
                    var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
                    $.each(states, function (i, e) {
                        $("#WidgetMap path[data-code=" + e + "]").css({
                            fill: colors[i]
                        });
                    });
                    $('#WidgetMap').find('.jvectormap-marker')
                        .each(function (i, e) {
                            $(e).css({
                                fill: colors2[i],
                                stroke: colors2[i]
                            });
                        });
                }

                if ($('#WidgetMap').length) {
                    runJvectorMap();
                }
            }

        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>