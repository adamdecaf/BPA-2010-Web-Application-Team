<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Define the routes for the application, they are just like a normal
// directory structure diagram.
define('APP', 'application/');

	define('APP_CACHE', APP . 'cache/');
		define('APP_CACHE_USERS', APP_CACHE . 'users/');
		
	define('APP_CONFIG', APP . 'config/');
	
	define('APP_I18N', APP . 'i18n/');
	
	define('APP_HELPERS', APP . 'helpers/');
	
	define('APP_META', APP . 'meta/');
	
	define('APP_PAGES', APP . 'pages/');
		define('APP_FORMS', APP_PAGES . 'forms/');
	
	define('APP_UPLOADS', APP . 'uploads/');
		define('APP_UPLOAD_PICTURES', APP_UPLOADS . 'pictures');
	
// Load the API routes.
define('API_JS', APP_HELPERS . 'jsAPI/');
	
// Load the system routes.
define('SYS', 'system/');
	
	define('SYS_CORE', SYS . 'core/');
	
	define('SYS_ERRORS', SYS . 'errors/');
	
	define('SYS_LIBS', SYS . 'libs/');

define('TEMPLATE', 'templates/');
define('TEMPLATE_ROOT', TEMPLATE . $config['general']['template'] . '/');