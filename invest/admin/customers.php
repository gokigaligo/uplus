<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<?php
	include("userheader.php");
	include_once("functions.php");
	//including group class
	include("../../scripts/class.group.php");
?>

	<div id="page_content">
		<div id="page_content_inner">

			<h4 class="heading_a uk-margin-bottom"><?php if($account_type == 'bank') echo "Bank account";else echo "CSD"; ?> REQUESTS &amp; Clients</h4>
			<?php
				if($account_type == 'bank'){
				   $sqlClients = $investDb->query("SELECT * FROM clients WHERE service = 'bank'"); 
				}else{
					$sqlClients = $investDb->query("SELECT * FROM clients WHERE service != 'bank'") or trigger_error($investDb->error);
				} 

				$n="";
				while($row = mysqli_fetch_array($sqlClients))
				{
					$diff = textDiffDates(date(DATE_ATOM), $row['statusOn']);
				}
			?>
		   
			<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
				<div class="uk-width-large-4-4">
					<div class="md-card uk-margin-medium-bottom">
						<div class="md-card-content">
							<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Names</th>
										<th>Type</th>
										<th>Date</th>                                        
										<th>Phone</th>
										<th>Email</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>

								<tfoot>
									<tr>
										<th>#</th>                                        
										<th>Names</th>
										<th>Type</th>                                        
										<th>Date</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
										if($account_type == 'bank'){
										   $sqlClients = $investDb->query("SELECT * FROM clients WHERE service = 'bank'"); 
										}else{
											$sqlClients = $investDb->query("SELECT * FROM clients WHERE service != 'bank'") or trigger_error($investDb->error);
										} 

										$n="";
										while($row = mysqli_fetch_array($sqlClients))
										{
											$diff = diffDates(date(DATE_ATOM), $row['statusOn']);
											$client = $row;
											$clientType = $client['clientType'];
											if($clientType == 'group'){
												$groupId = $client['groupCode'];
												//loading group data
												$groupData = $Group->details($groupId);
												$name = $groupData['groupName'];
												
											}else{
												$userData = $User->details($row['userCode']);
												// var_dump($userData);
												$name = $userData['name'];
												$country = $row['country'];
											}
											$country = $client['country'];
											$n++;
											echo '
												<tr>
													<td>'.$n.'</td>
													<td>'.$name.'</td>
													<td>'.ucfirst($row['clientType']).'</td>
													<td>'.date("d-M-Y", strtotime($row['statusOn'])).'</td>
													<td>'. $userData['phone'].'</td>
													<td>'. $userData['email'].'</td>
													<td>'.$row['status'].'</td>
													<td><a href="view.php?viewid='.$row['id'].'">View</a></td>
												</tr>';
										}
									?>
								</tbody>
							</table>
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
	<!-- datatables -->
	<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<!-- datatables buttons-->
	<script src="bower_components/datatables-buttons/js/dataTables.buttons.js"></script>
	<script src="assets/js/custom/datatables/buttons.uikit.js"></script>
	<script src="bower_components/jszip/dist/jszip.min.js"></script>
	<script src="bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="bower_components/pdfmake/build/vfs_fonts.js"></script>
	<script src="bower_components/datatables-buttons/js/buttons.colVis.js"></script>
	<script src="bower_components/datatables-buttons/js/buttons.html5.js"></script>
	<script src="bower_components/datatables-buttons/js/buttons.print.js"></script>
	
	<!-- datatables custom integration -->
	<script src="assets/js/custom/datatables/datatables.uikit.min.js"></script>

	<!--  datatables functions -->
	<script src="assets/js/pages/plugins_datatables.min.js"></script>
	
	 <!-- page specific plugins -->
	<!-- d3 -->
	<script src="bower_components/d3/d3.min.js"></script>
	<!-- c3.js (charts) -->
	<script src="bower_components/c3js-chart/c3.min.js"></script>
	
	<!--  charts functions -->
	<!-- <script src="assets/js/pages/plugins_charts.min.js"></script> -->
	
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

</body>
</html>
<!-- Localized -->