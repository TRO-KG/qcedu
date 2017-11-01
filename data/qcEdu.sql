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