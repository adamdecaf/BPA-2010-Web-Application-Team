-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: db834.perfora.net
-- Generation Time: Nov 27, 2011 at 09:45 PM
-- Server version: 5.0.91
-- PHP Version: 5.3.3-7+squeeze3

-- --------------------------------------------------------

-- 
-- Table structure for table `admin-blog`
-- 

CREATE TABLE `admin-blog` (
  `post_id` int(32) NOT NULL auto_increment,
  `title` varchar(256) NOT NULL,
  `author` varchar(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `public` int(1) NOT NULL,
  PRIMARY KEY  (`post_id`),
  UNIQUE KEY `blog_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `event_conversations`
-- 

CREATE TABLE `event_conversations` (
  `event_conversations_id` int(32) NOT NULL auto_increment,
  `event_id` int(32) NOT NULL,
  `author` int(32) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  PRIMARY KEY  (`event_conversations_id`),
  UNIQUE KEY `event_conversations_id` (`event_conversations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `event_members`
-- 

CREATE TABLE `event_members` (
  `event_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `events`
-- 

CREATE TABLE `events` (
  `event_id` int(32) NOT NULL auto_increment,
  `event_title` varchar(128) NOT NULL,
  `event_location` varchar(128) NOT NULL,
  `event_desc` varchar(10000) NOT NULL,
  `event_type` varchar(128) NOT NULL,
  `event_start` int(20) NOT NULL,
  `event_end` int(20) NOT NULL,
  `event_public` int(1) NOT NULL default '0',
  `event_creator` int(32) NOT NULL,
  PRIMARY KEY  (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE `friends` (
  `user_1` int(32) NOT NULL,
  `user_2` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `group_conversations`
-- 

CREATE TABLE `group_conversations` (
  `group_id` int(32) NOT NULL,
  `group_conversation_id` int(32) NOT NULL auto_increment,
  `author` int(32) NOT NULL,
  `title` varchar(256) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  PRIMARY KEY  (`group_conversation_id`),
  UNIQUE KEY `group_message_id` (`group_conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `group_members`
-- 

CREATE TABLE `group_members` (
  `user_id` int(32) NOT NULL,
  `group_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `group_messages`
-- 

CREATE TABLE `group_messages` (
  `group_message_id` int(32) NOT NULL auto_increment,
  `group_conversation_id` int(32) NOT NULL,
  `author` int(32) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  PRIMARY KEY  (`group_message_id`),
  UNIQUE KEY `group_conversation_id` (`group_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `groups`
-- 

CREATE TABLE `groups` (
  `group_id` int(32) NOT NULL auto_increment,
  `title` varchar(128) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `conversations` int(32) NOT NULL,
  `public` int(1) NOT NULL,
  PRIMARY KEY  (`group_id`),
  UNIQUE KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `updates`
-- 

CREATE TABLE `updates` (
  `for` int(32) NOT NULL,
  `from` int(32) NOT NULL,
  `title` varchar(256) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `location` varchar(128) NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `user_info`
-- 

CREATE TABLE `user_info` (
  `user_id` int(32) NOT NULL,
  `display_name` varchar(64) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(1000) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `education` varchar(256) NOT NULL,
  `job` varchar(256) NOT NULL,
  `political_view` varchar(256) NOT NULL,
  `religious_view` varchar(256) NOT NULL,
  `activities` varchar(1000) NOT NULL,
  `interests` varchar(1000) NOT NULL,
  `music` varchar(1000) NOT NULL,
  `tv_shows` varchar(1000) NOT NULL,
  `movies` varchar(1000) NOT NULL,
  `books` varchar(1000) NOT NULL,
  `quotes` varchar(1000) NOT NULL,
  `bio` varchar(10000) NOT NULL,
  `zip` int(10) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `user_shorts`
-- 

CREATE TABLE `user_shorts` (
  `short_id` int(32) NOT NULL auto_increment,
  `user_id` int(32) NOT NULL,
  `message` varchar(256) NOT NULL,
  `timestamp` int(20) NOT NULL,
  PRIMARY KEY  (`short_id`),
  UNIQUE KEY `short_id` (`short_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(32) NOT NULL auto_increment,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `cookie_str` varchar(40) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

