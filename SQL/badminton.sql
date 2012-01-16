-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2010 at 07:57 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `badminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `club_member` tinyint(1) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) default NULL,
  `age` int(11) NOT NULL,
  `exp_level` varchar(255) NOT NULL,
  `men_single` tinyint(1) default NULL,
  `men_double` tinyint(1) default NULL,
  `woman_single` tinyint(1) default NULL,
  `woman_double` tinyint(1) default NULL,
  `mixed_double` tinyint(1) default NULL,
  `men_double_name` varchar(255) default NULL,
  `woman_double_name` varchar(255) default NULL,
  `mixed_double_name` varchar(255) default NULL,
  `email_address` varchar(255) default NULL,
  `contact_future` tinyint(1) default NULL,
  `date` datetime NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
