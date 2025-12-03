<?php
/**
 * Configurações do Google OAuth 2.0
 * PositiveSense
 */

return [
    'client_id' => 'SUA_GOOGLE_CLIENT_ID_AQUI.apps.googleusercontent.com',
    'client_secret' => 'SUA_GOOGLE_CLIENT_SECRET_AQUI',
    'redirect_uri' => 'http://localhost:8000/processar_login_google.php',
    'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
    'token_uri' => 'https://oauth2.googleapis.com/token',
    'userinfo_uri' => 'https://www.googleapis.com/oauth2/v2/userinfo',
    'scopes' => [
        'https://www.googleapis.com/auth/userinfo.email',
        'https://www.googleapis.com/auth/userinfo.profile'
    ]
];
?>
