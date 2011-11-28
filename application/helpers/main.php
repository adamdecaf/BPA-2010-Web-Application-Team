<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// Grab the user id.
$user_id = get_user_id();

// This page will load the latest updates for a user, or show a login page.
if (check_user()) {
	
	// Grab the latest items for the user.
	Data::set('sql', 'SELECT * FROM `' . Data::get('db') . '`.`updates` WHERE `for` = "' . MySQL::clean($user_id) . '" ORDER BY `timestamp` DESC', true);
	
	// Once we have everything finalized then show the page with the content in it.
	Load::get('html', 'user-main.html');
	
} else {
	
	// Show the guest page with login, short intro...
	Load::get('html', 'guest-main.html');
}