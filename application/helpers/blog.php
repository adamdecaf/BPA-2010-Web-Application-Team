<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// We just need to query the db and get the latest blog posts.
Data::set('sql', 'SELECT * FROM `' . Data::get('db') . '`.`admin-blog` WHERE `public` = "1" ORDER BY `post_id` DESC LIMIT 10', true);