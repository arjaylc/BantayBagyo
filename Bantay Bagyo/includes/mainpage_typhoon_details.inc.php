<div id = "floating-sidebar-typhoon">
	<div id = "typhoon-details" class = "floating-sidebar-details">
	  <table>
	    <tr>
	      <th class="table-cat" colspan=2>Typhoon Details</th>
	    </tr>
	    <?php
			require_once('includes/database_master.inc.php');
			$database_master = new DatabaseMaster();
	    	$query = "SELECT * FROM typhoon";
	    	$queryResult = $database_master->querySelect($query);
	    	if(empty($queryResult)){
	    		echo 'no database';
	    	} else{?>
	    	<tr>
		      <td class="table-cat">Name:</td>
		      <td><?php echo $queryResult[0]['typhoon_name']?></td>
		    </tr>
		    <tr>
		      <td class="table-cat">Wind Speed:</td>
		      <td><?php echo $queryResult[0]['windspeedmin'].'-'.$queryResult[0]['windspeedmax']."kph"?></td>
		    </tr>	
	    <?php
	    	}

	    ?>
	    
	          
	  </table>
	</div>
		
			<?php
				if(isset($_SESSION['logged'])){?>
			<div class="floating-sidebar-details">
				<table>
					<tr>
						<td class = "table-cat">Your Main Province</td>
					</tr>
				</table>
				<button id = "changeProvinceButton" type =  "button" onmousedown = "toggleMainProvince()">Change Main Province</button>
			<div id="main-province">
			<?php
					showProvinceTable($_SESSION['province']);
			?>
			</div>
			</div>
			<?php
					$query = "SELECT province FROM user_provinces WHERE email_address = '".$_SESSION['email'].
					"' AND NOT province = '".$_SESSION['province']."'";
					$queryResult = $database_master->querySelect($query);
					if(!empty($queryResult)){?>
					<div>
						<table>
							<tr>
								<td class = "table-cat">Your Provinces</td>
							</tr>
						</table>
						<button id = "addProvinceButton" onmousedown = "toggleProvince()">+ Add Province</button>
					<div id = "other-province-details">
			<?php
					foreach($queryResult as $row){
						echo '<div class = "floating-sidebar-details">';
						showProvinceTable($row['province']);
						echo '</div>';
					}?>
				</div>
					</div>
			<?php
				} else{
					echo '<button id = "addProvinceButton" onmousedown = "toggleProvince()">+ Add Province</button>';
				}
			?>
			<?php
				}

			?>
</div>
<?php 

function showProvinceTable($province){
	$database_master = new DatabaseMaster();
?>
<div id = "province">
		<table>
		<tr>
			<th class = "table-cat" colspan=2><?php echo $province?></th>
		</tr>
<?php
			$querySignal = 'SELECT signalnumber FROM provinces WHERE province = "'.$province.'"';
			$querySignalResult = $database_master->querySelect($querySignal);
			$message = "";
			if(isset($querySignalResult[0]['signalnumber'])){
				$signalnumber =$querySignalResult[0]['signalnumber'];
				if($signalnumber ==1){
					$src = "../Assets/sig1.png";
					$message = "The winds may bring light damage to the affected areas.";
				} else if ($signalnumber ==2){
					$src = "../Assets/sig2.png";
					$message = "The winds may bring light to moderate damage to the affected areas.";
				} else if ($signalnumber ==3){
					$src = "../Assets/sig3.png";
					$message = "The winds may bring moderate to heavy damage to the affected areas";
				} else if ($signalnumber== 4){
					$src = "../Assets/sig4.png";
					$message = "The winds may bring very heavy damage to the affected areas";
				}
				$queryDetails = "SELECT mapcolor, windspeedmin, windspeedmax FROM signalnumbers WHERE signalnumber =".$signalnumber;

				$queryDetailsResult = $database_master->querySelect($queryDetails);
				$windspeedmax = $queryDetailsResult[0]['windspeedmax'];
				$windspeedmin = $queryDetailsResult[0]['windspeedmin'];
				
?>
				<tr>
					<td class = "table-cat"><img src="<?php echo $src?>" width = 40></td>
					<td><?php 
						echo $windspeedmin;
						if(isset($windspeedmax)){
							echo '-'.$windspeedmax.'kph';
						} else{
							echo 'kph and above';
						}
					?>
					</td>
				</tr>
<?php
			} else{?>
				<td><img src="../Assets/fine.png" width = 40></td>
				<td>No Typhoon</td>
<?php
			}?>
			</table>
			<span><?php echo $message?></span>
<?php
			$queryFlood = "SELECT flood_area, flood_depth FROM flood_areas WHERE province ='".$province."'";
			$queryResult = $database_master->querySelect($queryFlood);
			if(!empty($queryResult)){?>
			<table>
				<tr>
			      <th class="table-cat" colspan=2>Flood Areas</th>
			    </tr>
		    	<?php
				foreach($queryResult as $row){?>
					<tr>
				      <td><?php echo $row['flood_area']?></td>
				      <td><?php echo $row['flood_depth']?></td>
				    </tr>
				<?php	
				}
			}
			?>
			</table>
</div>
<?php
		}
?>