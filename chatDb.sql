drop database if exists chat;
create database chat;
use chat;

create table messages(
    msgId int not null AUTO_INCREMENT,
    msgUser varchar(100) NOT NULL,
    msgTime time,
    msgText varchar(100),
    primary key (msgId)
);