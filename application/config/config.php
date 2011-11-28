<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Remember to change this once we put in productions
error_reporting(E_ALL);
 
$config = array(
	
	// Some basic options
	'general' => array(
		
		// Define if api and web uploads are open.
		// Any text other than "enabled" and it will be 
		// disabled.
		'api' => 'enabled',
		'web' => 'enabled',
		
		// normal or maintenance
		'mode' => 'normal',
		
		// The default language to use
		// Remember, you need the file extension
		'i18n' => 'en.php',
		
		// The current template
		// No trailing slash, just the directory from
		// /templates/../
		'template' => 'default',
		
		// Admin email
		'admin_email' => 'adam@decafproductions.com'
	),
	
	// MySQL db
	'database' => array (
		'hostname' => '',
		'username' => '',
		'password' => '',
		'database' => '',
	)
	
);
