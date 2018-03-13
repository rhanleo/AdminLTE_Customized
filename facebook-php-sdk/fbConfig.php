<?php

if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once  '/facebook-php-sdk/autoload.php';


// Include required libraries

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Configuration and setup Facebook SDK
 */
$appId         = '136121816940316'; //Facebook App ID
$appSecret     = '9996c8131564c8e9217626e5e3102494'; //Facebook App Secret
$redirectURL   = 'http://localhost:81/AdminLTE/facebook-php-sdk/'; //Callback URL
$fbPermissions = array('email');  //Optional permissions

$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.9',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}

?>