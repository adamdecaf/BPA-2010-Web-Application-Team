<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// If we want to place any checks in here that deal with system level,
// otherwise this will be the spot to send calls for the required page.

// It's now alright to load the basic libraries.
Load::get('lib', 'mysql.class.php');
Load::get('lib', 'data.class.php');
	
		// Connect via the settings in the config.
		MySQL::set_vars(
			$config['database']['hostname'],
			$config['database']['username'],
			$config['database']['password']
		);
		
		// Store the database name in the Data object, it will lighten up grabbing it.
		Data::set('db', $config['database']['database']);

// Load the cookie helper to see if a user is logged in.
Load::get('helper', 'cookie.php');

	// Remember, if there isn't anything in $_GET that we should show the main page.
	if (empty($_GET)) {
		$_GET['main'] = 'true';
	}
	
	if (!isset($_GET['method'])) {
		$_GET['method'] = '';
	}
	
// We will process POST requests first, so we should do that
	if ($_POST) {
	
		// Check for the specific action to do.
		if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
			
			// Check to see if we want to register or login
			if ($_POST['type'] == 'login') {
			
				Load::get('helper', 'login.php');
				
			}
			
			// Check to see if there is a spot for an email.
			if ($_POST['type'] == 'register') {
			
				Load::get('lib', 'rand_string.class.php');
				Load::get('helper', 'register.php');
				
			}
			
		// Check to see if we have a contact submission.
		} else if ($_POST['type'] == 'contact') {
			
			// Load the contact helper.
			Load::get('helper', 'contact.php');
			contact($config['general']['admin_email']);
			
		} else if ($_POST['type'] == 'group-new-convo') {
			
			// Load the helepr to create a new group topic.
			Load::get('helper', 'group_new_convo.php');
			
		} else if ($_POST['type'] == 'group-new-reply') {
			
			// Load the helper to reply to a topic.
			Load::get('helper', 'group-new-reply.php');
			
		} else if ($_POST['type'] == 'new-group') {
			
			// Create a new group.
			Load::get('helper', 'profile.php');
			Load::get('helper', 'group_new.php');
			
		}
		
		// Stop all action so that we don't start to show responses from a $_GET request.
		Error::new_error('');
	}
	
	$stop = false;
	// Process any API requests next, this way we don't have the header in the response.
	if ($_GET['method'] == 'jsApi') {
		
		// Load the profile helper
		Load::get('helper', 'profile.php');
	
		// Respond to a group conversation request
		if (array_key_exists('group_id', $_GET) && array_key_exists('convo_id', $_GET)) {
		
			// Load the group and jsAPI/group_convo helpers.
				Load::get('helper', 'group.php');
				Load::get('jsAPI', 'show_group_convo.php');
				Load::get('html', 'show_group_convo.html');
		}
		
		// Stop the page load, for what ever reason.
				Error::new_error('');
	}
	
// Load the page header so that the helper will put the content in the 'correct' place.
	Load::get('html', 'header.html');

// Decide what action we're going to be doing, then load the page(s) for that.
// Remember, the helper will take control after we call it.
	if (array_key_exists('main', $_GET)) {
		
		// Load the main page for a user.
		Load::get('helper', 'main.php');
		
	} else if (array_key_exists('about', $_GET)) {
	
		// Load the about page
		Load::get('html', 'about.html');
	
	} else if (array_key_exists('blog', $_GET)) {
	
		// Load the blog.
		Load::get('helper', 'blog.php');
		Load::get('html', 'blog.html');
	
	} else if (array_key_exists('change_friend', $_GET)) {
		
		// Load the helper to change a friendship.
		Load::get('helper', 'profile.php');
		Load::get('helper', 'change_friend.php');
		
	} else if (array_key_exists('change_group', $_GET)) {
	
		// Load the change group page.
		Load::get('helper', 'change_group.php');
	
	} else if (array_key_exists('contact', $_GET)) {
	
		// Load the contact form
		Load::get('html', 'contact.html');
		
	} else if (array_key_exists('friends', $_GET)) {
	
		// Load the friends page.
		Load::get('helper', 'friends.php');
		Load::get('html', 'friends.html');
		
	} else if (array_key_exists('group', $_GET)) {
	
		// Load the group helper, this will show the details of a 
		// specific group.
		Load::get('helper', 'profile.php');
		Load::get('helper', 'group.php');
		Load::get('html', 'group.html');
		
	} else if (array_key_exists('groups', $_GET)) {
	
		// Load the group helper.
		Load::get('helper', 'groups.php');
		Load::get('html', 'groups.html');
		
	} else if (array_key_exists('privacy', $_GET)) {
	
		// Load the privacy page
		Load::get('html', 'privacy.html');

	} else if (array_key_exists('profile', $_GET)) {
		
		// Load the profile helper.
		Load::get('helper', 'profile.php');
		
		// Then load the friends and groups helpers
		Load::get('helper', 'friends.php');
		Load::get('helper', 'groups.php');
		
		// Print it all out on the view page.
		Load::get('html', 'profile.html');
		
	} else if (array_key_exists('roadmap', $_GET)) {
		
		// Load the roadmap page.
		Load::get('html', 'roadmap.html');
		
	} else if (array_key_exists('registered', $_GET)) {
		
		// Load the registered page.
		Load::get('html', 'registered.html');
		
	}
	
	// We only want to show the menu bar for users.
	if (check_user()) {
		Load::get('html', 'menu-bar.html');
	}
	
	// Close out the page with the footer.
	Load::get('html', 'footer.html');
