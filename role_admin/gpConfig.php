<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '228513160561-vdla7qufebqkbktk7ve165vrp4ftvvk6.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'XmZnPbx1chU_TfpjBW6gBkFs'; //Google client secret
$redirectURL = 'http://msmypaper.com/role_admin/google.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to My Paper');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>