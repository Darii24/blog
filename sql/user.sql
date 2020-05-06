CREATE DATABASE blog;
use blog;
CREATE TABLE `user` (
    Id int AUTO_INCREMENT PRIMARY KEY,
    Login varchar(50),
    Email varchar(50),
    `Password` varchar(50),
    `urlAvatar` varchar(255),
    `Role` varchar(50) DEFAULT 'follower'
);

use blog;
CREATE TABLE record(
	Id int AUTO_INCREMENT PRIMARY KEY,
    Id_autor int,
    `Date` varchar(25),
    `Status` varchar(25) DEFAULT 'not approved',
    `Text` longtext,
    `Like` int DEFAULT 0,
    `DisLike` int DEFAULT 0
);

use blog;
CREATE TABLE comment(
	Id int AUTO_INCREMENT PRIMARY KEY,
    Id_autor int,
    Id_record int,
    `Date` varchar(25),
    `Status` varchar(25) DEFAULT 'not approved',
    `Text` longtext,
    `Like` int DEFAULT 0,
    `DisLike` int DEFAULT 0
);