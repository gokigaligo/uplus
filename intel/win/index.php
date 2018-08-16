<?php
    ob_start();

    //getting requested pages
    //checking the page
    $reqURI = trim($_SERVER['REQUEST_URI']??"", "/");

    //REMOVING GET_VARIABLES
    if($pos  = strripos($reqURI, "?")){
        //here get are sent
        $reqURI = substr_replace($reqURI, '', $pos);
    }

    $req_parts = explode("/", $reqURI);


    //remove all the parts before admin/
    $projectname = 'win';
    $s = array_search($projectname, $req_parts);
    for ($n=$s; $n >= 0; $n--) {
        unset($req_parts[$n]);
    }

    $req_parts = array_values($req_parts);

    $current_page_action = $base_page = $req_parts[0]??'home'; #base required page

    if($base_page == 'login'){
        include_once 'pages/login.php';
        die();
    }

    include_once '../conn.php';
    include_once '../functions.php';
    require 'auth.php';


    require '../core/location.php';
    require '../core/cooperative.php';
    require '../core/crop.php';
    require '../core/product.php';
    require '../core/purchasingOrder.php';
    require '../core/measurement.php';
    require '../core/message.php';
    require '../core/supplier.php';
    require '../core/warehouse.php';
    $user_name = $user_data['name']??"";
    $current_user_pic = $user_data['profile_picture'];
    $standard_date = "d/m/Y";
    $standard_time = $standard_date." H:i";

    //Check requested route existence
    $pageFile = "pages/$base_page.php";
    if(!file_exists($pageFile)){
        $pageFile = "pages/404.php";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title = "Welcome $user_name";
        include_once "modules/head.php";
    ?>
    <script type="text/javascript">
        const currentUserId = "<?php echo $currentUserId; ?>";
        const apiLink = "/api/index.php";
    </script>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
            include_once "modules/menu.php";
        ?>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include_once "modules/sidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <?php include_once "$pageFile"; ?>


            <!-- ============================================================== -->
            <!-- start right sidebar -->
            <!-- ============================================================== -->

            <?php include_once "modules/rightSidebar.php"; ?>

            <!-- ============================================================== -->
            <!-- end right sidebar -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> <?php echo date("Y") ?> &copy; Intelligent warehouse for MPPD in courtesy of Rwanda Community </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- chartist chart -->
    <script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="../plugins/bower_components/moment/moment.js"></script>
    <script src='../plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
    <script src="../plugins/bower_components/calendar/dist/cal-init.js"></script>

    <script src="../plugins/bower_components/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Custom tab JavaScript -->
    <script src="js/cbpFWTabs.js"></script>

    <!-- Select2 -->
    <script>
        $(function() {
            // For select 2
            $(".select2").select2();
        });
    </script>
    <script src="../plugins/bower_components/custom-select/dist/js/select2.full.min.js" type="text/javascript"></script>


    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <?php
        for($n=0; !empty($js_files) && $n<count($js_files) && is_array($js_files); $n++){
            $pfile = $js_files[$n];
            ?>
                <script type="text/javascript" src="<?php echo $pfile ?>"></script>
            <?php
        }
    ?>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
