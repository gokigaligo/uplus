<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<?php include("header.php");?>
<?php 
if(isset($_POST['bname'])){
	$bname		=  $_POST['bname'];
	$blocation	=  $_POST['blocation'];
	$bweb     	=  $_POST['bweb'];
	$bmail    	=  $_POST['bmail'];
	$bcontact 	=  $_POST['bcontact'];
	$brep     	=  $_POST['brep'];
	$bbank    	=  $_POST['bbank'];
	$bdaf     	=  $_POST['bdaf'];
	$bimg    	=  $_FILES['bimg']['name'];
	$target_dir = "gallery/branches/";
	$target_file = $target_dir . basename($_FILES["bimg"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["bimg"]["tmp_name"]);
	if($check !== false) {
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		$uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["bimg"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	$sql = $db->query("INSERT INTO branches(name,repId,createdDate,location,web,mail,phone,bank,daf,profile)
	VALUES('$bname', '$brep', now(), '$blocation', '$bweb', '$bmail', '$bcontact', '$bbank', '$bdaf', '$bimg')");
	?>
	<script type="text/javascript">
		document.location.href="branches.php";
	</script>
	<?php
}?>
	<div id="page_content">
        <div id="page_content_inner">
			<h4 class="heading_a uk-margin-bottom">Add Branch</h4>
			<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
				<div class="uk-width-large-4-6">
					<div class="md-card">
						<div class="md-card-content">
							<form action="addBranche.php" method="post" enctype="multipart/form-data">
                                <div class="md-input-wrapper">
									<input type="text" name="bname" class="md-input" placeholder="Branch Name">
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
                                    <input type="text" name="blocation" class="md-input" placeholder="Branch Location"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
                                    <input type="text" name="bweb" class="md-input" placeholder="Branch Website"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
										<input type="text" name="bmail" class="md-input" placeholder="Branch Email"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
										<input type="text" name="bcontact" class="md-input" placeholder="Branch Contact"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
                                    <select name="brep" data-md-selectize>
                                        <option value="">Representative</option>
                                        <?php
                                        	$selectrep = $db -> query("SELECT * FROM members WHERE type = 'FULL' ORDER BY name ASC");
                                        	while ($repinfo = mysqli_fetch_array($selectrep)) {
                                        		echo '
                                        			<option value="'.$repinfo['id'].'">'.$repinfo['name'].'</option>
                                        		';
                                        	}
                                        ?>
                                    </select>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
										<input type="text" name="bbank" class="md-input" placeholder="Branch Bank Account"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
										<input type="text" name="bdaf" class="md-input" placeholder="Branch DAF Name"/>
                                    <span class="md-input-bar "></span>
                                </div>
                                <div class="md-input-wrapper">
										<input type="file" name="bimg"/><br/>
                                    <span class="md-input-bar "></span>
                                </div>
								<input type="submit" class="md-btn md-btn-success" value="ADD">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="bower_components/chartist/dist/chartist.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="bower_components/handlebars/handlebars.min.js"></script>
        <script src="assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="bower_components/clndr/clndr.min.js"></script>

        <!--  dashbord functions -->
        <script src="assets/js/pages/dashboard.min.js"></script>
    
    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "bower_components/dense/src/dense.js", function() {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

</body>
</html>
<!-- Localized -->