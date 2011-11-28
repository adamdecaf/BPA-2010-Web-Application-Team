<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// This page will assist in loading the data and files needed for the profile.
function get_username($id) {

	Data::set('sql', 'SELECT `username` FROM `' . Data::get('db') . '`.`users` WHERE `user_id` = "' . MySQL::clean($id) . '" LIMIT 1', true);

		$tmp = MySQL::search(Data::get('sql'));
		
	return $tmp[0]['username'];
}

function is_friend($id1, $id2) {
	
	Data::set('sql', 'SELECT * FROM `' . Data::get('db') . '`.`friends` WHERE `user_1` = "' . MySQL::clean($id1) . '" AND `user_2` = "' . MySQL::clean($id2) . '"', true);
	
	$tmp = MySQL::search(Data::get('sql'));
	
	if (empty($tmp[0])) {
		
		return false;
		
	} else {
		
		return true;
		
	}
	
}