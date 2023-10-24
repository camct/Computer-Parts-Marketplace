<!DOCTYPE html>
<html>
<?php
  include ('config.php');
 $username = 'root';
 $password = 'password';
 $host = '35.245.107.193';
 $dbname = 'project';  
	$db = new mysqli($host, $username, $password, $dbname);
	
	if($db->connect_error) {
		echo "connect error " . $db->connect_error . "<br>";
	}
	echo $_SESSION['user_email_address'];
	$email = $_SESSION['user_email_address'];
	$sqlProfId = "SELECT profile_id FROM project.email_profile WHERE Email = '$email'";
    $profRow = $db->query($sqlProfId); 
	foreach ($profRow as $cool):
	  //echo $cool['profile_id']; 	
	  $profId = $cool['profile_id'];
	endforeach;
	echo"<br>";
	
   $sql = "SELECT * FROM project.transaction_profile WHERE profile_id = '$profId'";
   $whole = $db->query($sql);
   foreach ($whole as $cool): 
   //echo $cool['transaction_id']; 
   endforeach;
   $db->close();
  ?>
   
<div class="row justify-content-center">  
<table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="30%">Listings
  </tr>
  </thead>
<?php foreach ($whole as $cool): ?>
  <tr>
     <td><?php echo $cool['transaction_id']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
<br>
</div>
<a href="dashboard.php">Click here to go back to the main page</a>
</html>