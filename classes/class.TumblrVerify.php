<?php
class TB_Tumblr_Verify {
  function GenerateLoginLink() {
    $client = new Tumblr\API\Client('consumer_key', 'consumer_secret');
    $requestHandler = $client->getRequestHandler();
    $requestHandler->setBaseUrl('https://www.tumblr.com/');
    $resp = $requestHandler->request('POST', 'oauth/request_token', array());
    $out = $result = $resp->body;
    
    $data = array();
    parse_str($out, $data);
    $callback = 'http://localhost/instagram-to-tumblr/auth.php';
    $_SESSION['tumblr_temp_token'] = $data['oauth_token'];
    $_SESSION['tumblr_temp_secret'] = $data['oauth_token_secret'];
    
    return 'https://www.tumblr.com/oauth/authorize?oauth_token=' . $data['oauth_token'] . "&oauth_callback=" . $callback;
    
  }
  function HandleResponse() {
    $client = new Tumblr\API\Client('consumer_key', 'consumer_secret');
    $requestHandler = $client->getRequestHandler();
    $requestHandler->setBaseUrl('https://www.tumblr.com/');
    $client->setToken($_SESSION['tumblr_temp_token'],  $_SESSION['tumblr_temp_secret']);
    // exchange the verifier for the keys
    $verifier = $_GET['oauth_verifier'];
// exchange the verifier for the keys
  
    $resp = $requestHandler->request('POST', 'oauth/access_token', array('oauth_verifier' => $verifier));
    $out = $result = $resp->body;
    $data = array();
    parse_str($out, $data);
    print_r($data);
    // and print out our new keys
    $token = $data['oauth_token'];
    $secret = $data['oauth_token_secret'];
    echo 'Token: ' . $token;
    echo 'Secret: ' . $secret;
    //$_SESSION['tumblr_token'] = $token;
    //$_SESSION['tumblr_secret'] = $secret;
    die();
  }
  
}
