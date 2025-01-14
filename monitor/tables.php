<?php
if (isset($_GET['table'])) 
{
	$_GET['table']();
}
function users()
{
	include "db.php";
	$sql = $db->query("SELECT * FROM users ORDER BY id DESC");
	$n= 0;
	$data = "";
	echo'<div class="table-responsive"><table class="table table-hover table-striped table-bordered table-responsive" style="float: left;">
	<thead>
		<tr>
			<th>#</th>
			<th>Image</th>
			<th>UserName</th>
			<th>Phone</th>
			<th>JoinedDate</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>';
	while($row = mysqli_fetch_array($sql))
	{
		$n++;
		if ($row['active'] == 1) {
			$active = 'YES';
			# code...
		}else{
			$active = 'NO';
		}
		$createdDate 	= strftime("%d, %b%y", strtotime($row["createdDate"]));
		echo'<tr>
			<th>'.$n.'</th>
			<th><div style="
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url('.$row['userImage'].'");
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
	
	"></div></th>
				<th>'.$row['name'].'</th>
				<th>'.$row['phone'].'</th>
				<th>'.$createdDate.'</th>
				<th>'.$active.'</th>
			</tr>';
		}
		echo'
		</tbody>
	</table>
	</div>';
}

function groups()
{
	include "db.php";
	$sql = $db->query("SELECT * FROM groups ORDER BY id DESC");
	$n= 0;
	echo'<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered table-responsive" style="float: left;">
	<thead>
		<tr>
			<th>#</th>
			<th>Image</th>
			<th>GroupName</th>
			<th>AdminName</th>
			<th>Members</th>
			<th>TargetAmount</th>
			<th>CurrentAmount</th>
			<th>CreatedDate</th>
		</tr>
	</thead>
	<tbody>';
	while($row = mysqli_fetch_array($sql))
	{
		$n++;
		$groupId	= $row['id'];
		$sql2 		= $db->query("SELECT count(groupId) gpm FROM members WHERE groupId = '$groupId'");
		$rngm		= mysqli_fetch_array($sql2);
		$members 	= $rngm['gpm'];
		$sqlGroupBalance = $con->query("SELECT IFNULL((SELECT sum(t.amount) FROM rtgs.grouptransactions t WHERE ((t.status = 'Successfull' AND t.operation = 'DEBIT') AND (t.groupId = '$groupId'))),0) AS groupBalance FROM rtgs.groups g");
			$gBalanceRow 	= mysqli_fetch_array($sqlGroupBalance);
		echo'<tr>
			<th>'.$n.'</th>
			<th><div style="
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url('.$row['groupImage'].'");
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
	
	"></div></th>
				<th><a target="blank" href="../f/i'.$row['id'].'">'.$row['groupName'].'</a></th>
				<th>'.$row['adminName'].'</th>
				<th>'.$members.'</th>
				<th>'.number_format($row['targetAmount']).' Rwf</th>
				<th>'.number_format($gBalanceRow['groupBalance']).' Rwf</th>
				<th>'.$row['createdDate'].'</th>
			</tr>';
		}
		echo'
		</tbody>
	</table>
	</div>';
}


function transactions()
{
include 'db.php';
$sql = $con->query("SELECT status,amount,pushnumber,pullnumber,myid,type, transactiontime FROM intouchapi ORDER BY id DESC");
$n= 0;
	
	echo'<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered table-responsive" style="float: left;">
	<thead>
		<tr>
			<th>#</th>
			<th>Amount</th>
			<th>From</th>
			<th>To</th>
			<th>Status</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>';
while ($row = mysqli_fetch_array($sql)) {
	$pullnumber = $row['pullnumber'];
	$pushnumber = $row['pushnumber'];
	$myId = $row['myid'];
	if($row['type'] == "grouptransaction")
	{
		$pullnumber = "group";
		$sqlStatus = $con->query("SELECT status FROM grouptransactions WHERE id = '$myId'");
		$status = mysqli_fetch_array($sqlStatus)['status'];
		$sqlPull = $db->query("SELECT GR.groupName FROM uplus.groups GR INNER JOIN rtgs.grouptransactions GT ON GT.groupId = GR.id WHERE GT.id= '$myId' LIMIT 1");
		$pullName = mysqli_fetch_array($sqlPull)['groupName'];
		$sqlPush = $con->query("SELECT GR.name FROM uplus.users GR INNER JOIN rtgs.grouptransactions GT ON GT.memberId = GR.id WHERE GT.id= '$myId' LIMIT 1");
		$pushName = mysqli_fetch_array($sqlPush)['name'].'<em>('.$pushnumber.')</em>';
	}
	else
	{
		$sqlStatus = $con->query("SELECT status FROM directtransfers WHERE id = '$myId'");
		$status = mysqli_fetch_array($sqlStatus)['status'];
		$sqlPull = $con->query("SELECT actorName FROM directtransfers WHERE id = '$myId'+1");
		$pullName = mysqli_fetch_array($sqlPull)['actorName'].'<em>('.$pullnumber.')</em>';
		$sqlPush = $con->query("SELECT actorName FROM directtransfers WHERE id = '$myId'");
		$pushName = mysqli_fetch_array($sqlPush)['actorName'].'<em>('.$pushnumber.')</em>';
	}
		
	if ($status=='Pending') {
		$hstatus='<th style="background: #fbbc03;">'.$status.'</th>';
	}elseif ($status=='Successfull') {
		$hstatus='<th style="background: #36a753;">'.$status.'</th>';
	}elseif ($status=='Failed') {
		$hstatus='<th style="background: #eb4435;">'.$status.'</th>';
	}else{
		$hstatus='<th style="background: #000; color: #fff";>Low Bal</th>';
	}

	$n++;
	$transactionDate 	= strftime("%d, %b%y", strtotime($row["transactiontime"]));
		echo'<tr>
			<th>'.$n.'</th>
			<th>'.number_format($row['amount']).'</th>
			<th>'.$pushName.'</th>
			<th>'.$pullName.'</th>
			'.$hstatus.'
			<th>'.$transactionDate.'</th>
		</tr>';
}
echo'
	</tbody>
</table>
</div>';
}

function money()
{
	include "db.php";
	$sql = $db->query("SELECT * FROM users ORDER BY id DESC");
	$n= 0;
	$data = "";	
}
?>