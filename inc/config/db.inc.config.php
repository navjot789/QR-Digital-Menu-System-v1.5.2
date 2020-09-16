<?php
    // -------------------------------------------------------------------------
    // DB PERAMERTERS
    // -------------------------------------------------------------------------
 
    define('DATABASE_HOST', 'localhost');           // Database host
    define('DATABASE_NAME', 'master_rome');           // Name of the database to be used
    define('DATABASE_USERNAME', 'root');       // User name for access to database
    define('DATABASE_PASSWORD', '');   // Password for access to database
    define('USER_TIME_ZONE', 'Africa/Abidjan');

    define('DB_PREFIX', '');		        // Unique prefix of all tables in the database

	// -------------------------------------------------------------------------
    // PASSWORDS_ENCRYPTION PERAMERTERS
    // -------------------------------------------------------------------------
    define('PASSWORDS_ENCRYPTION_TYPE',  'MD5');  // AES|MD5
    define('PASSWORDS_ENCRYPTION',  'true');              // true|false
    define('PASSWORDS_ENCRYPT_KEY', 'php_easy_installer');

    // -------------------------------------------------------------------------
    // APPLICATION VERSION
    // -------------------------------------------------------------------------

	define('EI_APPLICATION_NAME', 'QR Digital Menu System');
    define('APP_V', 'V1.5.2');

    // -------------------------------------------------------------------------
    // Author contact
    // -------------------------------------------------------------------------

    define('AUTHOR_FOOTER_MAIL', 'web.dev.nav@gmail.com');
    define('AUTHOR_FOOTER_URL', 'https://navbro.online');
