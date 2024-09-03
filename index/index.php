<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Certificate Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body >
    <div class="login-form">
        <div class="text">Welcome back!</div>
        <img src="login-logo.png" alt="">
        <div class="portal_name">Fitness Certificate Portal</div>
        <hr>
        <button type="button" id="googleSignInButton">Google Sign In</button>
        <div class="onlybitac">Sign in with your BIT account</div>
    </div>


    <script>
    // Trigger Google OAuth 2.0 flow when the button is clicked
    document.getElementById('googleSignInButton').addEventListener('click', function() {
        const oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';
        const params = {
            'client_id': '961601241492-mjqcikqhp5rv8vrrolvs53lqsc4t93in.apps.googleusercontent.com',
            'redirect_uri': 'http://localhost/fc/index/google-callback.php',
            'response_type': 'code',  // Request authorization code
            'scope': 'openid email profile',
            'access_type': 'offline',
            'prompt': 'consent',
        };

        // Build the full URL
        const urlParams = new URLSearchParams(params).toString();
        const authUrl = `${oauth2Endpoint}?${urlParams}`;

        // Redirect the user to the OAuth 2.0 endpoint
        window.location.href = authUrl;
    });
</script>


</body>

</html>
