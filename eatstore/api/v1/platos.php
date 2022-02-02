<?php
require_once('Controller/PlatosAPI.php');

$api = new PlatosAPI();
$api->API();


// HTACCESS .php

// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_FILENAME}\.php -f
// RewriteRule ^(.*)$ $1.php


// HTACCESS .php

// RewriteRule ^([a-zA-Z]*) index.php