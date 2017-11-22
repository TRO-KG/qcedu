--创建数据库
CREATE DATABASE IF NOT EXISTS `qcedu` DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
USE `qcedu`;
--创建管理员数据表
DROP TABLE IF EXISTS `qc_admin`;
CREATE TABLE `qc_admin`(
`id` tinyint unsigned AUTO_INCREMENT,
`username` varchar(20) NOT NULL,
`account` varchar(20) NOT NULL,
`password` varchar(32) NOT NULL,
`email` varchar(50),
`tel` varchar(11) NOT NULL UNIQUE,
`submission_date` TIMESTAMP,
PRIMARY KEY ( id ),
UNIQUE KEY `account` (`account`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
--创建合作院校数据表
DROP TABLE IF EXISTS `qc_cooperate`;
CREATE TABLE `qc_cooperate`(
`id` tinyint unsigned AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`logo` varchar(50),
`synopsis` varchar(500),
`zsdx` varchar(200),
`bmtj` varchar(200),
`bmff` varchar(200),
`zscc` varchar(200),
`lqff` varchar(200),
`xxfs` varchar(200),
`rxks` varchar(200),
`zsbf` varchar(200),
`submission_date` TIMESTAMP,
PRIMARY KEY ( id ),
UNIQUE KEY `name` (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;