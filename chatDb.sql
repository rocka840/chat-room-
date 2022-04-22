
create database chat;
use chat;

create table users(
    UserId int not null AUTO_INCREMENT,
    UserName varchar(20) unique,
    primary key (userId)
);

create table messages(
    msgId int not null AUTO_INCREMENT,
    msgTime time,
    msgText varchar(100),
    fromUser int not null,
    primary key (msgId),
    foreign key (fromUser) references users(userID)
);