<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// First we should load the error and load modules.
// This will allow us to check the system and request string.
require 'error.php';
require 'load.php';

	// Before any text is loaded to the screen, load the i18n file.
	Load::get('i18n', $config['general']['i18n']);

	// We should check to see if it's alright for us to pass further.
	Error::check_config($config['general']);
	
	// We should include the template routes file, it's needed by base.php.
	Load::get('template', 'template.php');
	
	// Now that we are cleared to run we should pick what action we're going to be doing.
	// However, that will be done in base.php because we've "booted" the app & system now.
	require 'base.php';