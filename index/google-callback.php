<?php
// Include the Google Client library
require_once 'vendor/autoload.php';

// Start session to store user data
session_start();

$client = new Google_Client();
$client->setClientId('961601241492-mjqcikqhp5rv8vrrolvs53lqsc4t93in.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/fc/index/google-callback.php');
$client->addScope('email');
$client->addScope('profile');

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the authorization code is present
if (isset($_GET['code'])) {
    try {
        // Exchange the authorization code for an access token
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        // Check for errors in the token response
        if (isset($token['error'])) {
            throw new Exception('Error fetching access token: ' . $token['error_description']);
        }

        // Set the access token
        $client->setAccessToken($token['access_token']);

        // Get user profile data from Google
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Extract user data
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        // Store user data in session
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        // Redirect to dashboard page
        header('Location: ../dashboard/dashboard.php');
        exit();
    } catch (Exception $e) {
        // Log the error and display a user-friendly message
        error_log('Google OAuth Error: ' . $e->getMessage());
        echo 'Authentication failed: ' . htmlspecialchars($e->getMessage());
        echo '<br><a href="index.php">Go back to login</a>';
        exit();
    }
} else {
    // No authorization code; possible user cancellation or error
    echo 'No authorization code received. Please <a href="index.php">try signing in again</a>.';
    exit();
}
