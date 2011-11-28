<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Create a function to check if the user is a member of the group.
function is_member($user_id, $group_id) {
	
	Data::set('sql', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`group_members` WHERE `user_id` = "' . MySQL::clean($user_id) . '" AND `group_id` = "' . MySQL::clean($group_id) . '"', true);
	
	$result = MySQL::search(Data::get('sql'));
	
	// Now check if there was a result returned.
	if (isset($result[0])) {
		return true;
	} else {
		return false;
	}
	
}
 
// Grab the base data about the group.
function get_group($user_id, $group_id) {

	// Check to see if the user is a member in the group, if not then ask to join.
	if (!is_member($user_id, $group_id)) {
		// We will need better error coverage in later releases
		echo USER_IS_NOT_MEMBER;
		
			// Prepare a join link for the group.
			$str1 = '<a href="?change_group=' . $group_id . ' ">';
			$str2 = '</a>';
			$error = USER_ASK_TO_JOIN_GROUP;
			
		$msg = str_replace('%1', $str1, $error);
		$msg = str_replace('%2', $str2, $msg);
		
		die($msg);
		
	// We don't really need this here, but it will catch any really strange quirks with the script.
	} else {

		// Get the base data
		Data::set('base-data', 'SELECT * FROM `' . Data::get('db') . '`.`groups` WHERE `group_id` = "' . MySQL::clean($group_id) . '" LIMIT 1', true);
		
			$base = MySQL::search(Data::get('base-data'));
		
		// Get a few of the members
		Data::set('members', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`group_members` WHERE `group_id` = "' . MySQL::clean($group_id) . '" LIMIT 10', true);
			
			$members = MySQL::search(Data::get('members'));
		
		// Get a few of the latest conversations
		Data::set('conversations', 'SELECT * FROM `' . Data::get('db') . '`.`group_conversations` WHERE `group_id` = "' . MySQL::clean($group_id) . '" ORDER BY `timestamp` DESC LIMIT 10', true);
		
			$conversations = MySQL::search(Data::get('conversations'));
		
		// Send the data back in an array.
		return array (
			'base' => $base[0],
			'members' => $members,
			'conversations' => $conversations
		);
	}
}
