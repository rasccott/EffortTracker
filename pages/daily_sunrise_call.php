
<?php include $_SERVER["DOCUMENT_ROOT"] ."/Dev/ET/db_conn.php"; ?>
<div id="servicePanels" style="margin:0 auto; width: 500px; margin-top: 30px">
	<?php include $_SERVER["DOCUMENT_ROOT"] ."/Dev/ET/ServiceType.php"; ?>
	<?php
		$dbname = 'tt_db';
		$serviceType = 'occ_service_type';
		$service = 'occ_service';
		// $sql = "SHOW TABLES FROM $dbname";
		$ServiceTypeSQL = "SELECT SERVICE_TYPE_NAME FROM $dbname.$serviceType WHERE Parent_SERVICE_ID = 307";
		// $service = 'occ_service';
		// $sql = "SELECT Parent_SERVICE_ID FROM $dbname.$serviceType";

		$ServiceTypeResult = mysql_query($ServiceTypeSQL);
		if (!$ServiceTypeResult) {
    		echo "DB Error, could not list tables\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
		} 
		else
		{
			while ($row = mysql_fetch_row($ServiceTypeResult)){
				$rowname = "{$row[0]}";
				$me = new ServiceType($rowname, 'Activity Name Here');
				echo $me->greet();
			}
			mysql_free_result($ServiceTypeResult);
		}
	?>

</div>
