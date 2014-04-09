create database if not exists bantaybagyo;
use bantaybagyo;
drop table if exists typhoon;
drop table if exists log;
drop table if exists logtypes;
drop table if exists relatives;
drop table if exists user_provinces;
drop table if exists users;
drop table if exists usertypes;
drop table if exists flood_areas;
drop table if exists provinces;
drop table if exists signalnumbers;
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
	signal numbers table
	values(signal number, windspeed min value, windspeed max value)
	note: null max value means infinite or unlimited
*/
create table signalnumbers(
	signalnumber tinyint not null,
	mapcolor varchar(6) not null,
	windspeedmin int not null,
	windspeedmax int,
	primary key(signalnumber)
);
insert into signalnumbers values (1,"FFCC00",30,60),(2,"DD9900",61,100),(3,"CC6600",101,185),
(4,"red",186,null);
/*
	cities table -- only info for now is signal number
	values(city name, signal number)
	note: null signal number means weather is fine
*/
create table provinces(
	province varchar(64) not null,
	signalnumber tinyint,
	primary key(province),
	constraint fk_signalnumber foreign key(signalnumber) references signalnumbers(signalnumber)
);

INSERT INTO provinces VALUES
("Abra", null),
("Agusan del Norte", 1),
("Agusan del Sur", 2),
("Aklan", 3),
("Albay", 4),
("Antique", null),
("Apayao", 1),
("Aurora", 2),
("Basilan", 3),
("Bataan", 4),
("Batanes", null),
("Batangas", 1),
("Benguet", 2),
("Biliran", 3),
("Bohol", 4),
("Bukidnon", null),
("Bulacan", 1),
("Cagayan", 2),
("Camarines Norte", 3),
("Camarines Sur", 4),
("Camiguin", null),
("Capiz", 1),
("Catanduanes", 2),
("Cavite", 3),
("Cebu", 4),
("Compostela Valley", null),
("Davao del Norte", 1),
("Davao del Sur", 2),
("Davao Oriental", 3),
("Dinagat Islands", 4),
("Eastern Samar", null),
("Guimaras", 1),
("Ifugao", 2),
("Ilocos Norte", 3),
("Ilocos Sur", 4),
("Iloilo", null),
("Isabela", 1),
("Kalinga", 2),
("La Union", 3),
("Laguna", 4),
("Lanao del Norte", null),
("Lanao del Sur", 1),
("Leyte", 2),
("Maguindanao", 3),
("Marinduque", 4),
("Masbate", null),
("Metropolitan Manila", 1),
("Misamis Occidental", 2),
("Misamis Oriental", 3),
("Mountain Province", 4),
("Negros Occidental", null),
("Negros Oriental", 1),
("North Cotabato", 2),
("Northern Samar", 3),
("Nueva Ecija", 4),
("Nueva Vizcaya", null),
("Occidental Mindoro", 1),
("Oriental Mindoro", 2),
("Palawan", 3),
("Pampanga", 4),
("Pangasinan", null),
("Quezon", 1),
("Quirino", 2),
("Rizal", 3),
("Romblon", 4),
("Samar", null), 
("Sarangani", 1),
("Shariff Kabunsuan", 2),
("Siquijor", 3),
("Sorsogon", 4),
("South Cotabato", null),
("Southern Leyte", 1),
("Sultan Kudarat", 2),
("Sulu", 3),
("Surigao Del Norte", 4),
("Surigao Del Sur", null),
("Tarlac", 1),
("Tawi-Tawi", 2),
("Zambales", 3),
("Zamboanga del Norte", 4),
("Zamboanga del Sur", null),
("Zamboanga Sibugay", 1);
/*
	users table
	values(username, password, usertype)
*/
create table users(
	email_address varchar(64),
	password char(64) not null,
	usertype char(5) not null,
	province varchar(64) not null,
	primary key(email_address),
	constraint fk_usertype foreign key(usertype) references usertypes(usertype),
	constraint fk_province foreign key(province) references provinces(province)
);
insert into users values
("arjaylc@yahoo.com.ph", '7c4a8d09ca3762af61e59520943dc26494f8941b',"admin", "Cebu");
/*
	user provinces table
	values(username, province)
*/
create table user_provinces(
	email_address varchar(64) not null,
	province varchar(64) not null,
	primary key(email_address, province),
	constraint fk_email foreign key(email_address) references users(email_address) ON UPDATE CASCADE,
	constraint fk_user_province foreign key(province) references provinces(province)
);

INSERT INTO user_provinces VALUES("arjaylc@yahoo.com.ph", "Cebu"),("arjaylc@yahoo.com.ph", "Metropolitan Manila"), ("arjaylc@yahoo.com.ph", "Davao Oriental")
, ("arjaylc@yahoo.com.ph", "Zamboanga Del Norte");
/*
	flood_areas
*/
create table flood_areas(
	flood_area varchar(64) not null,
	flood_depth varchar(32) not null,
	province varchar(64) not null,
	primary key(flood_area),
	constraint fk_flood_province foreign key(province) references provinces(province)
);
INSERT INTO flood_areas VALUES
("EDSA", "knee-deep", "Metropolitan Manila"),
("Quezon City", "tire-deep", "Metropolitan Manila"),
("Paranaque", "gutter-deep", "Metropolitan Manila");
/*
	typhoon
*/
CREATE TABLE typhoon(
	typhoon_name varchar(32) not null,
	windspeedmin int not null,
	windspeedmax int not null,
	primary key(typhoon_name)
);
INSERT INTO typhoon VALUES('Basyang', 100, 110);