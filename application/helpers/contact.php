<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

function contact($admin_email) {

	// For now we can email all requests just to a standard email address.
	$data = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'message' => $_POST['message']
	);

		// Do a simple check on the string, more will be added later in Milestone 2.
		if ($data['name'] == '' || $data['email'] == '' || $data['message'] == '') {
			die(INVALID_CONTACT_INFO);
		}
		
		// Otherwise send the email.
		mail(
			$admin_email, 
			substr($data['message'], 0, 50), 
			substr($data['message'], 0, 2000), 
			'From: ' . $data['email']
		);
		
}

// Send you back to the main page.
Header('Location: ?');