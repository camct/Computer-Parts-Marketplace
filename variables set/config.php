<?php
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('407213189356-cub6km9nmeuohlb3v28ldfpeuut4p9bv.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://db-project-370016.uk.r.appspot.com/dashboard.php');
 
//
$google_client->addScope('email');
 
$google_client->addScope('profile');
 
//start session on web page
session_start();
 
?>