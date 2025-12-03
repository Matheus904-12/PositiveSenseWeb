<?php
/**
 * ========================================
 * CONFIGURAÇÃO DO GOOGLE OAUTH 2.0
 * PositiveSense
 * ========================================
 *
 * IMPORTANTE: Configure os valores abaixo
 * 1. Vá para https://console.cloud.google.com
 * 2. Crie um novo projeto
 * 3. Habilite Google+ API
 * 4. Crie uma credencial OAuth 2.0 (ID do Cliente web)
 * 5. Configure a URL de redirecionamento: http://localhost:8000/tcc/login_google_callback.php
 * 6. Copie Client ID e Client Secret aqui
 */

define('GOOGLE_CLIENT_ID', 'YOUR_CLIENT_ID.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'YOUR_CLIENT_SECRET');
define('GOOGLE_REDIRECT_URI', 'http://localhost:8000/tcc/login_google_callback.php');

// Ou leia de variáveis de ambiente (mais seguro em produção)
// define('GOOGLE_CLIENT_ID', getenv('GOOGLE_CLIENT_ID'));
// define('GOOGLE_CLIENT_SECRET', getenv('GOOGLE_CLIENT_SECRET'));

// Endpoints do Google
define('GOOGLE_AUTH_URL', 'https://accounts.google.com/o/oauth2/v2/auth');
define('GOOGLE_TOKEN_URL', 'https://www.googleapis.com/oauth2/v4/token');
define('GOOGLE_USERINFO_URL', 'https://www.googleapis.com/oauth2/v1/userinfo');
