<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
function get_user_id() {

	// Search in the db for a user with that id.
	// Remember, we only want to search if they have a value, 
	// if not then return an impossible value.
	if (isset($_COOKIE['user'])) {
	
		Data::set('sql', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`users` WHERE `cookie_str` = "' . $_COOKIE['user'] . '"' , true);
		
	} else {
	
		return -1;
		
	}
	
	// Grab the results back
	$result = MySQL::search(Data::get('sql'));
	
	return (int) $result[0]['user_id'];
}

function check_user() {
	// This page will assist in checking to see if the user has a cookie 
	// with permission to access an account.
	if (isset($_COOKIE['user']) && $_COOKIE['user'] !== '') {
	
		// Get the user id and check to see if it exists.
		$u_id = get_user_id();
		
		if (isset($u_id)) {
		
			// The connection is that of a user.
			$is_user = true;
			
		} else {
			
			// The connection is that of a guest.
			$is_user = false;
			
		}
		
	} else {
		
		// The user is a guest
		$is_user = false;
		
	}
	
	return $is_user;
}