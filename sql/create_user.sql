drop table if exists users;
create table users(
	id int auto_increment,
	username varchar(255) not null,
	password char(32) not null,
	primary key(id),
	unique (username)
);

# Insert test data

insert into users (username,password) values ('admin',md5('password'));
