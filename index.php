<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '961601241492-mjqcikqhp5rv8vrrolvs53lqsc4t93in.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:1234/fc/dashboard.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // now you can use this profile info to create account in your website and make user logged in.
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Fitness Certificate Portal</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="stylesheet" href="index.css" />
    <!-- <script src="index.js" defer type="module"></script> -->
    <script>
      function handleGoogleSignIn() {
        window.location.href = '<?php echo $client->createAuthUrl(); ?>';
      }
    </script>
  </head>
  <body>
    <div class="login-form">
      <div class="text">Welcome back!</div>
      <img src="login-logo.png" alt="" srcset="" />
      <div class="portal_name">Fitness Certificate Portal</div>
      <hr />
      <button type="submit" id="loginBtn" onclick="handleGoogleSignIn()" >Google Sign In </button>
      <div class="onlybitac">Sign in with your BIT account</div>
      <p id="errorMsg" class="error-msg"></p>
    </div>
  </body>
</html>
