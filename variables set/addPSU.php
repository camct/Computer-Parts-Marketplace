<!DOCTYPE html>
<html>
<?php
 //Include Google Configuration File
include('config.php');
if($_SESSION['access_token'] == '') {
header("Location: login.php");
}
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
//It will Attempt to exchange a code for an valid authentication token.
$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
if(!isset($token['error']))
{
//Set the access token used for requests
$google_client->setAccessToken($token['access_token']);
//Store "access_token" value in $_SESSION variable for future use.
$_SESSION['access_token'] = $token['access_token'];
//Create Object of Google Service OAuth 2 class
$google_service = new Google_Service_Oauth2($google_client);
//Get user profile data from google
$data = $google_service->userinfo->get();
//Below you can find Get profile data and store into $_SESSION variable
if(!empty($data['given_name']))
{
$_SESSION['user_first_name'] = $data['given_name'];
}
if(!empty($data['family_name']))
{
$_SESSION['user_last_name'] = $data['family_name'];
}
if(!empty($data['email']))
{
$_SESSION['user_email_address'] = $data['email'];
}
if(!empty($data['gender']))
{
$_SESSION['user_gender'] = $data['gender'];
}
if(!empty($data['picture']))
{
$_SESSION['user_image'] = $data['picture'];
}
}
}
  $username = 'root';
 $password = 'password';
 $host = '35.245.107.193';
 $dbname = 'project';  
	$db = new mysqli($host, $username, $password, $dbname);
	
	if($db->connect_error) {
		echo "connect error " . $db->connect_error . "<br>";
	}
	
	$brand = $_POST['brand'];
	$year = $_POST['year'];
	$price = $_POST['price'];
	$volt = $_POST['volt'];
	$curr = $_POST['curr'];
	

   $email = $_SESSION['user_email_address'];
   //echo $email;
   //echo "<br>";
   
   $sqlMaxProd = "SELECT MAX(Product_ID) FROM project.prod_id";
   $whole = $db->query($sqlMaxProd); 
	foreach ($whole as $cool):
	  //echo $cool['MAX(Product_ID)']; 	
	  $maxID = $cool['MAX(Product_ID)'];
	endforeach;
	//echo "<br>";
	
   $sqlMaxTrans = "SELECT MAX(transaction_id) FROM project.transaction_product";
   $maxTrans = $db->query($sqlMaxTrans); 
	foreach ($maxTrans as $cool):
	  //echo $cool['MAX(transaction_id)']; 	
	  $maxTransID = $cool['MAX(transaction_id)'];
	endforeach;
	//echo"<br>";
	
	
	$sqlProfId = "SELECT Profile_ID FROM project.email_profile WHERE Email = '$email'";
    $profRow = $db->query($sqlProfId); 
	foreach ($profRow as $cool):
	  //echo $cool['Profile_ID']; 	
	  $profID = $cool['Profile_ID'];
	endforeach;
	//echo"<br>";
	
	
	$sqlInsProd = "INSERT INTO project.psu (Product_ID, Brand, Year, Price, Voltage, Current_rating) VALUES ($maxID + 1, '$brand', '$year', '$price', '$volt', '$curr')";
	if ($db->query($sqlInsProd) === TRUE) {
	//echo "New record created successfully";
	} else {
	  echo "Error: " . $sqlInsProd . "<br>" . $db->error;
	  }
	//echo "<br>";
	
	
	$sqlUpId = "UPDATE prod_id SET Product_ID = $maxID + 1 WHERE Product_ID = $maxID";
	if ($db->query($sqlUpId) === TRUE) {
	//echo "Incremented prod_id successfully";
	} else {
	  echo "Error: " . $sqlUpId . "<br>" . $db->error;
	  }
	//echo "<br>";
	
	
	$sqlTransProd = "INSERT INTO project.transaction_product (transaction_id, product_id) VALUES ($maxTransID + 1, $maxID + 1)";
	if ($db->query($sqlTransProd) === TRUE) {
	//echo "New TransProd created successfully";
	} else {
	  echo "Error: " . $sqlTransProd . "<br>" . $db->error;
	  }
	//echo "<br>";
	
	
	$sqlTransProf = "INSERT INTO project.transaction_profile (transaction_id, profile_id) VALUES ($maxTransID + 1, $profID)";
	if ($db->query($sqlTransProf) === TRUE) {
	echo "New product created successfully";
	} else {
	  echo "Error: " . $sqlTransProf . "<br>" . $db->error;
	  }
	echo "<br>";
	
	
	 ?> 
<a href="dashboard.php">Click here to go back to the main page</a>
</html>