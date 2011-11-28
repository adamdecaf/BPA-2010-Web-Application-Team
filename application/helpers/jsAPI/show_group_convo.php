<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Grab the post
function get_group_comments($group_id, $convo_id) {

	// Check to see if the request is coming from a user.
	if (check_user()) {
		
		// Now that we have a user, check to see if they're in the group.
		$user_id = get_user_id();
		
		// Check to see if the member is in the group.
		if (is_member($user_id, $group_id)) {
			
			// Ok, now query for the conversation they want.
			Data::set('op', 'SELECT * FROM `' . Data::get('db') . '`.`group_conversations` WHERE `group_id` = "' . MySQL::clean($group_id) . '" AND `group_conversation_id` = "' . MySQL::clean($convo_id) . '" LIMIT 1', true);
			
			// Store the results
			$tmp = MySQL::search(Data::get('op'));
			
			if (empty($tmp[0])) {
				
				die(GROUP_CONVERSATION_DOES_NOT_EXIST);
				
			} else {
				
				$op = $tmp[0];
			
			}
			
			// Now grab the messages from that page.
			Data::set('messages', 'SELECT * FROM`' . Data::get('db') . '`.`group_messages` WHERE `group_conversation_id` = "' . MySQL::clean($convo_id) . '" ORDER BY `timestamp` DESC LIMIT 20', true);
			
			// Now prepare the result.
			// We have already loaded a template file for this.
			return array(
				'op' => $op,
				'messages' => MySQL::search(Data::get('messages'))
			);
		}
		
	}
}
