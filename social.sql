


create table utente (
username varchar(20) not null unique,
password varchar(255) not null,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
id int auto_increment primary key
);


create table post (
id int auto_increment primary key,
titolo varchar(25) not null,
descrizione varchar(255) not null,
id_user int not null,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
foreign key (id_user) references utente(id) on delete cascade
);

create table likes(
id_user int not null,
id_post int not null,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
foreign key (id_user) references utente(id) on delete cascade,
foreign key (id_post) references post(id) on delete cascade,
unique (id_user, id_post)
);

create table follow(
id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
follower_id int not null,
followed_id int not null,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp,
foreign key (followed_id) references utente(id) on delete cascade,
foreign key (follower_id) references utente(id) on delete cascade,
unique key unique_follow (follower_id,followed_id),
check(follower_id != followed_id)
);





