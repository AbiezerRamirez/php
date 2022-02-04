<?php
require_once('Controller/PlatosAPI.php');
// header('Access-Control-Allow-Credentials: true');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// header("Access-Control-Allow-Methods: GET, POST,PUT,DELETE,OPTIONS");
// header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$api = new PlatosAPI();
$api->API();


// HTACCESS .php

// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_FILENAME}\.php -f
// RewriteRule ^(.*)$ $1.php


// HTACCESS .php

// RewriteRule ^([a-zA-Z]*) index.php