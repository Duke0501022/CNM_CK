<?php
session_start();
include_once("vendor1/autoload.php");

// init configuration
$clientID = '261635437098-sgof0tba1b7p40s45lt6ujpgl1pr76ar.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/CNM_Project/index.php?googlelogin';

// create Client Request to access Google API
$google_client = new Google_Client();
$google_client->setClientId($clientID);
$google_client->setClientSecret($clientSecret);
$google_client->setRedirectUri($redirectUri);
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        $_SESSION['first_name'] = $data['given_name'];
        $_SESSION['last_name'] = $data['family_name'];
        $_SESSION['email_address'] = $data['email'];
        $_SESSION['profile_picture'] = $data['picture'];
        echo "<script>window.location.href = 'index.php';</script>";
    }
}

$login_button = '';

if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="asset/sign-in-with-google.png" /></a>';
}

?>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background: url(../kindergarten-website-template/img/login.jpg);
  }
  .login-container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #000000;
  }
  .header-text {
    margin-bottom: 30px;
    color: #333333;
    text-align: center;
  }
  .custom-btn {
    background-color: #f8b400;
    color: white;
    border: none;
  }
  .custom-btn:hover {
    background-color: #e5a300;
  }
  .form-link {
    color: #333333;
    text-align: center;
    display: block;
    margin-top: 15px;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2 class="header-text">Đăng nhập</h2>
  <?php
    if ($login_button == '') {
        echo '<h3>Welcome '.$_SESSION['first_name'].'</h3>';
        echo '<img src="'.$_SESSION['profile_picture'].'" alt="Profile Picture">';
        echo '<p>Email: '.$_SESSION['email_address'].'</p>';
    } else {
        echo $login_button;
    }
  ?>
</div>

</body>
</html>
<?php

//Google Code
require_once ('./google/libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '595616215334-b9s0s5j3j4bj5v4beme6i199neusok7l.apps.googleusercontent.com';
$client_secret = 'ip6PkgZCrbzUH0I_hj4oQlzO';
$redirect_uri = 'https://training.com/lesson-5/login.php';

//incase of logout request, just unset the session var
//if (isset($_GET['logout'])) {
//    unset($_SESSION['access_token']);
//}

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/* * **********************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 * ********************************************** */
$service = new Google_Service_Oauth2($client);

/* * **********************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 */

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit;
}
/* * **********************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 * ********************************************** */
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
}
if ($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
//            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}

if (!isset($authUrl)) {
    $googleUser = $service->userinfo->get(); //get user info 
    if(!empty($googleUser)){
        include './function.php';
        loginFromSocialCallBack($googleUser);
    }
}
//End Google Code
?>
