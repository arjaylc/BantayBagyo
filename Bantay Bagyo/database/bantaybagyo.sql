create database if not exists bantaybagyo;
use bantaybagyo;
drop table if exists log;
drop table if exists logtypes;
drop table if exists relatives;
drop table if exists users;
drop table if exists usertypes;
/*
	user types table -- may be useful in the future
	current usertypes -- admin and basic
*/
create table usertypes(
	usertype char(5) not null,
	primary key(usertype)
);
insert into usertypes values("admin"), ("basic");
/*
	users table
	values(username, password, usertype)
*/
create table users(
	username varchar(64) not null,
	password char(64) not null,
	firstname varchar(64),
	lastname varchar(64),
	usertype char(5) not null,
	primary key(username),
	constraint fk_usertype foreign key(usertype) references usertypes(usertype)
);
/*
	relatives table
	values(relative name, username)
*/
create table relatives(
	relativename varchar(64) not null,
	username varchar(64) not null,
	primary key(relativename),
	constraint fk_username foreign key(username) references users(username)
);
drop table if exists cities;
drop table if exists signalnumbers;
/*
	signal numbers table
	values(signal number, windspeed min value, windspeed max value)
	note: null max value means infinite or unlimited
*/
create table signalnumbers(
	signalnumber tinyint not null,
	windspeedmin int not null,
	windspeedmax int,
	primary key(signalnumber)
);
insert into signalnumbers values (1,30,60),(2,61,100),(3,101,185),(4,186,null);
/*
	cities table -- only info for now is signal number
	values(city name, signal number)
	note: null signal number means weather is fine
*/
create table cities(
	city varchar(64) not null,
	signalnumber tinyint,
	primary key(city),
	constraint fk_signalnumber foreign key(signalnumber) references signalnumbers(signalnumber)
);
/*
	log type table
*/
create table logtypes(
	logtype varchar(16) not null,
	primary key(logtype)
);
insert into logtypes values("login"),("logout"),("edit_cities"), ("change_password"),
("change_username");
/*
	log table
	values(username, log date, log type, status)
*/
create table log(
	username varchar(64) not null,
	logdate datetime not null,
	logtype varchar(16) not null,
	primary key (username, logdate),
	constraint fk_type foreign key(logtype) references logtypes(logtype),
	constraint fk_username foreign key(username) references users(username)
);