<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// This helper will get a request to change a group membership.
// If the user is friends with them then remove the 
// friend ship, and if not then add it.
$user_id = get_user_id();
$group_id = (int) $_GET['change_group'];

// Check for valid info
if (($user_id > 0 && $group_id > 0) && ($user_id != '' && $group_id != '')) {

	// Check to see if the group is public, and if so then add the user to the group.
	Data::set('public', 'SELECT `public` FROM `' . Data::get('db') . '`.`groups` WHERE `group_id` = "' . MySQL::clean($group_id) . '"', true);

		$public = MySQL::search(Data::get('public'));
		
		// Check to see if the group is public, if so then add the user.
		if ($public[0]['public'] === '1') {
			
			// Add the user to the group.
			Data::set('add', 'INSERT INTO `' . Data::get('db') . '`.`group_members` (`user_id`, `group_id`) VALUES ("' . MySQL::clean($user_id) . '", "' . MySQL::clean($group_id) . '")', true);
			
			// Query
			MySQL::query(Data::get('add'));
			
		}
		
		header('Location: ?group=' . $group_id);
		
}