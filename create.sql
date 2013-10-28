create table if not exists Data
(
	id integer PRIMARY KEY AUTOINCREMENT,
	sunetid varchar(10),
	puzzle varchar(50),
	time integer,
	clicks integer,
	correct integer
);

create table if not exists Video
(
	id integer PRIMARY KEY AUTOINCREMENT,
	sunetid varchar(10),
	puzzle varchar(50),
	question varchar(50),
	answer varchar(100),
	correct integer
);

