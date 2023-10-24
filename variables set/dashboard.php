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
	
	$name = $_SESSION['user_first_name'];
	$last = $_SESSION['user_last_name'];
	$email = $_SESSION['user_email_address'];
	
	if($email != ''){
		$max = 'SELECT MAX(Profile_ID) FROM project.email_profile';
		   try{
  $whole = $db->query($max);
  $tot = 0;
  foreach ($whole as $cool):
	  $tot = $cool['MAX(Profile_ID)'];
	endforeach;
  } catch(Exception $e) {
  echo "Error: " . $max . "<br>" . $db->error;
}
		$sql = "INSERT INTO project.email_profile (Email, Profile_ID, Phone, First_Name, Last_Name) VALUES ('$email', '$tot' + 1, '777-777-7777', '$name', '$last')";
		$db->query($sql);
	}
	$db->close();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Parts!!!</title>
</head>
<style>
    body {
        background-color: grey
    }
</style>
 
<body>
    <h1>Find Your Parts</h1>
    <form>
        <button type="submit" formaction="gpuList.php">GPU</button>
        <button type="submit" formaction="coolantList.php">Coolant</button>
        <button type="submit" formaction="case_typeList.php">Case</button>
        <button type="submit" formaction="cpuList.php">CPU</button>
        <button type="submit" formaction="motherboardList.php">Motherboard</button>
        <button type="submit" formaction="monitorList.php">Monitor</button>
		<button type="submit" formaction="psuList.php">PSU</button>
		<button type="submit" formaction="ramList.php">RAM</button>
		<br>
		<button type="submit" formaction="userTrans.php">Transaction List</button>
		
		<?php
		echo $_SESSION['user_first_name'];
		?>
    </form>
</body>
</html>