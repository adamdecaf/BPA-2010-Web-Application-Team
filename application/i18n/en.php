<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Define the name of the language
define('TEXT_LANG_NAME', 'English');

// The base title and header
define('TEXT_BASE_TITLE', 'BPA 2010 Social Networking Site');
define('TEXT_HEADER', 'BPA 2010 Networking');

// Some system level actions
define('INVALID_USER_INFO', 'Your username, password, and/or email is incorrect.');
define('INVALID_CONTACT_INFO', 'You need to fill in a name, email, and message.');
define('INVALID_GROUP_CONVO_INFO', 'You need to fill in the title, and message for the post.');
define('INVALID_GROUP_REPLY_INFO', 'You need to enter a comment.');
define('INVALID_GROUP_DETAILS', 'You need to fill out information for your group.');

define('FORM_SUBMIT', 'Submit');
define('FORM_REGISTER', 'Register');
define('FORM_REPLY', 'Reply');

// Simple registration errors
define('USER_NO_UPDATES', 'This user has no updates.');
define('USERNAME_ALREADY_TAKEN', 'That username has already been taken.');
define('EMAIL_ALREADY_TAKEN', 'That email is already in use.');
define('NEW_USER_MAIN_PAGE', 'Hello, it looks like you have no updates to look at.  Why don\'t you add some friends?');

// Some meta info (about, blog, contact, privacy headers...)
define('META_ABOUT_TITLE', 'About Us:');
	define('META_ABOUT_BODY', 'About Us...');
define('META_BLOG_TITLE', 'Our Blog:');
define('META_CONTACT_TITLE', 'Contact Us:');
define('META_PRIVACY_TITLE', 'About Your Privacy');
define('META_ROADMAP_TITLE', 'Our Roadmap:');

// Define the error messages
define('TEXT_WEB_ACCESS_ERROR', 'It looks like web access to the site is disabled right now.');
define('TEXT_MAINTENANCE_MODE', 'We are currently in a maintenance mode, it should be resolved quickly.');

// Set the menu-bar text.
define('MENU_BAR_HOME', 'Home');
define('MENU_BAR_PROFILE', 'Profile');
define('MENU_BAR_FRIENDS', 'Friends');
define('MENU_BAR_GROUPS', 'Groups');

// The text on the upper right.
define('HEADER_ABOUT', 'About');
define('HEADER_BLOG', 'Blog');
define('HEADER_CONTACT', 'Contact');
define('HEADER_PRIVACY', 'Privacy');
define('HEADER_ROADMAP', 'Roadmap');

// The guest main page.
define('GUEST_MAIN_TITLE', 'Welcome to ' . TEXT_HEADER);
define('GUEST_MAIN_TEXT', 'This is ' . TEXT_HEADER . ' and I would like to introduce you here.  This site is designed for the <a href="http://bpa.org" title="Business Professionals of America">BPA</a> State (and hopefully National) competition.  The site is designed to resemble a social networking site, complete with user interaction, complex security measures, and innovation.<br /><br />Feel free to sign-up or login with your account and have fun!');

// The registration/login form data
define('GUEST_MAIN_FORM_USERNAME', 'Username: ');
define('GUEST_MAIN_FORM_PASSWORD', 'Password: ');
define('GUEST_MAIN_FORM_EMAIL', 'Email: ');

// The details for the contact form.
define('CONTACT_FORM_TITLE', 'Feel free to send us an email using the form below.');
define('CONTACT_FORM_NAME', 'Your Name: ');
define('CONTACT_FORM_EMAIL', 'Your Email: ');
define('CONTACT_FORM_MESSAGE', 'Message: ');

// The Updates Spots
define('USER_UPDATE_TITLE', 'Your Updates:');
define('USER_UPDATE_FROM', 'From: ');

// Friends, groups, events...
define('USER_FRIENDS_TITLE', 'Your Friends:');
define('USER_GROUPS_TITLE', 'Your Groups:');

// Profile page
define('PROFILE_TITLE', '\'s Profile Page');
define('PROFILE_FRIENDS', '\'s Friends');
define('PROFILE_GROUPS', '\'s Groups');
define('PROFILE_NO_FRIENDS', 'This user has no friends.');
define('PROFILE_NO_GROUPS', 'This member isn\'s a part of any groups.');

define('PROFILE_ADD_FRIEND', 'Add');
define('PROFILE_REMOVE_FRIEND', 'Remove');
define('PROFILE_CHANGE_FRIEND', ' this person as a friend.');

// Group page
define('GROUP_CREATED', 'Created: ');
define('GROUP_CONVERSATIONS', 'Conversations: ');
define('GROUP_MEMBERS', 'Members');
define('GROUP_TOPICS', 'Conversations');
define('USER_IS_NOT_MEMBER', 'You\'re not a member of this group.');
define('USER_ASK_TO_JOIN_GROUP', 'Ask to %1 join this group %2');

// Group Conversation
define('GROUP_CONVO_AUTHOR', 'By: ');
define('GROUP_CONVO_CLOSE', 'Close');
define('GROUP_NEW_CONVO', 'New Topic');
define('GROUP_NEW_CONVO_DESC', 'Post a new Topic');
define('GROUP_NEW_REPLY_DESC', 'Reply to this thread.');
define('GROUP_NEW_CONVO_TITLE', 'Title: ');

// Create a new group.
define('GROUP_NEW_GROUP', 'New Group');
define('GROUP_NEW_TITLE', 'Title: ');
define('GROUP_NEW_PUBLIC', 'Public: ');

// API Messages
define('GROUP_CONVERSATION_DOES_NOT_EXIST', 'That conversation doesn\'t exist.');