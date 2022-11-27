<?php
session_start();
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('556668182121-3b70s8itst7s480565v7d2r5gpcmst8h.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://driftias.prabhamedia.com/inc/student_dashboard_index.php');
$google_client->addScope('email');
$google_client->addScope('profile');
$login_button = '';
if(isset($_GET["code"]))
{
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 
 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();
  $_SESSION['user_first_name'] = $data['given_name'];
  $_SESSION['user_last_name'] = $data['family_name'];
  $_SESSION['user_email_address'] = $data['email'];
  $_SESSION['user_gender'] = $data['gender'];
  $_SESSION['user_image'] = $data['picture'];
 
 }
 
}
if(!isset($_SESSION['access_token']))
{
 $login_button = $google_client->createAuthUrl();
}

    
?>