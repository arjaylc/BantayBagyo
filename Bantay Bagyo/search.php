<?php
include ("includes/database_master.inc.php");
if($_GET['type'] == 'province'){
		$database_master = new DatabaseMaster();
		$query = "SELECT province FROM provinces where province LIKE '%".strtoupper($_GET['name_startsWith'])."%' LIMIT 6";
    	$data = $database_master->querySearch($query); 
    echo json_encode($data);
}
 
?>