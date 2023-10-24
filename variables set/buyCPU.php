<!DOCTYPE html>
<html>
<?php
ob_start();
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
	
	
	$email = $_SESSION['user_email_address'];
	$sqlProfId = "SELECT profile_id FROM project.email_profile WHERE Email = '$email'";
    $profRow = $db->query($sqlProfId); 
	foreach ($profRow as $cool):
	  //echo $cool['profile_id']; 	
	  $profId = $cool['profile_id'];
	endforeach;
	//echo"<br>";

   $TransArray = array();
   $sqlTransList = "SELECT * FROM project.transaction_profile WHERE profile_id = '$profId'";
   $TransList = $db->query($sqlTransList);
   foreach ($TransList as $cool): 
   //echo $cool['transaction_id']; 
   array_push($TransArray, $cool['transaction_id']);
   endforeach;
  
	
	$prod_ID = $_POST['prodID'];
	$transList = $_POST['transArray'];
	//echo $prod_ID;
	//echo "<br>";

	//echo "<br>";
   //echo "<br>";
   //echo "<br>";
   
   foreach($TransArray as $id):
	   //echo $id;
	   //echo "<br>";
   endforeach;

    $sqlTransId = "SELECT transaction_id FROM project.transaction_product WHERE product_id = '$prod_ID'";
    $prodTrans = $db->query($sqlTransId); 
	foreach ($prodTrans as $cool):
	  //echo $cool['transaction_id'];
	  //echo "<br>";
	  if (in_array($cool['transaction_id'], $TransArray)) {
		//echo "not in the list";
		switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
		case '/buyCPU.php':                   // URL (without file name) to a default screen
			require 'own.php';
			break; 
   
		default:
			http_response_code(404);
			exit('Not Found');
		}  
		die();
	  }
	  else{
		  //echo "in the list";
	  }
	  //echo $cool['transaction_id']; 	
	  $transId = $cool['transaction_id'];
	endforeach;
	
	$sqlSellerId = "SELECT profile_id FROM project.transaction_profile WHERE transaction_id = '$transId'";
    $sellerIdRow = $db->query($sqlSellerId); 
	foreach ($sellerIdRow as $cool):
	  //echo $cool['transaction_id'];
	  //echo "<br>";
	  //echo $cool['transaction_id']; 	
	  $sellerId = $cool['profile_id'];
	endforeach;

	//echo"<br>";
	
	$sqlInsBuy = "INSERT INTO project.transaction_buy_sell (transaction_id , buyer_id, seller_id) VALUES ('$transId', '$profId' ,'$sellerId')";
	if ($db->query($sqlInsBuy) === TRUE) {
	//echo "deleted prod success";
	} else {
	  echo "Error: " . $sqlInsBuy . "<br>" . $db->error;
	  }
	//echo "<br>";
	
	$sqlDelProd = "DELETE FROM project.cpu WHERE Product_ID = '$prod_ID'";
	if ($db->query($sqlDelProd) === TRUE) {
	//echo "deleted prod success";
	} else {
	  echo "Error: " . $sqlDelProd . "<br>" . $db->error;
	  }
	//echo "<br>";
	
	echo "bought product successfully";
	echo "<br>";
?>
<a href="dashboard.php">Click here to go back to the main page</a>
</html>