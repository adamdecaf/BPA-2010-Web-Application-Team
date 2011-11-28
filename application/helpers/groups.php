<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

function get_groups($user_id) {
	
	// Get the groups that the user is in.
	Data::set('sql', 'SELECT `group_id` FROM `' . Data::get('db') . '`.`group_members` WHERE `user_id` = "' . MySQL::clean($user_id) . '" LIMIT 100', true);
	
	$groups = MySQL::search(Data::get('sql'));
	$return = array();
	
	// Now that we have the groups, loop through and get what we need.
	foreach ($groups as $group) {
		
		Data::set('sql','SELECT `group_id`, `title`, `desc` FROM `' . Data::get('db') . '`.`groups` WHERE `group_id` = "' . MySQL::clean($group['group_id']) . '"',true);
		
		$tmp = MySQL::search(Data::get('sql'));
		
		$return[] = $tmp[0];
		
	}
	
	// Check to see if the user has any friends.
	if (empty($return[0])) {
	
		return null;
		
	} else {
		
		return $return;
		
	}
	
	
}