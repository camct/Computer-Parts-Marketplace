<!DOCTYPE html>
<html>
<?php
  $username = 'root';
 $password = 'password';
 $host = '35.245.107.193';
 $dbname = 'project';  
	$db = new mysqli($host, $username, $password, $dbname);
	
	if($db->connect_error) {
		echo "connect error " . $db->connect_error . "<br>";
	}
	
   $email = $_SESSION['user_email_address'];
   $sql = "SELECT * FROM project.transaction_profile WHERE transaction_profile.profile_id = (SELECT Profile_ID FROM project.email_profile WHERE
   email_profile.Email = '$email']')";
   $whole = $db->query($sql);?>
   
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Login using Google Account</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="card">
<div class="card-header">
we have Successfully Logged In With Google
</div>
<div class="card-body">
<h5 class="card-title"><?php echo $_SESSION['user_first_name'].' '.$_SESSION['user_last_name']?></h5>
<p class="card-text">Email:- <?php echo $_SESSION['user_email_address']; ?> </p>
<img class="user-image" src="<?php echo $_SESSION["user_image"]; ?>" alt="Card image cap">
<a href="logout.php" class="btn btn-primary">Logout</a>
</div>
</div>
</div>
</body>
</html>