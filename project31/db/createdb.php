<?php

include_once("../configs/connect.php");
$db = connect();

$ct1 = 'CREATE TABLE images (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    description varchar(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARSET=utf8';

$ct2 = 'create table roles(
        id int not null auto_increment primary key,
        role varchar(32)
        )default charset="utf8"';

$ct3 = 'create table users(
        id int not null auto_increment primary key,
        login varchar(32) UNIQUE,
    	pass varchar(128),
    	email varchar(128),
    	discount int,
        roleid int,
        FOREIGN key(roleid) references roles(id) on delete cascade,
    	avatar mediumblob
        )default charset="utf8"';


$ct4 = 'create table sectors(
    id int not null auto_increment primary key,
    name varchar(255) not null
    )default charset="utf8"';

$ct5 = 'create table categories(
    id int not null auto_increment primary key,
    name varchar(255) not null,
    sector_id int,
    FOREIGN KEY (sector_id) references sectors(id) on delete cascade
    )default charset="utf8"';

$ct6 = 'create table company(
        id int not null auto_increment primary key,
        name varchar(255) not null)default charset="utf8"';


$ct7 = 'create table products(
        id int not null auto_increment primary key,
        name varchar(255) not null,
        category_id int,
        company_id int,
        FOREIGN KEY (company_id) references company(id) on delete cascade,
        FOREIGN KEY (category_id) references categories(id) on delete cascade
        )default charset="utf8"';

$ct_vars = [];
$i = 1;
while (isset(${"ct{$i}"})) {
    $ct_vars[] = ${"ct{$i}"};
    $i++;
}

foreach ($ct_vars as $query) {
    if (!mysqli_query($db, $query)) {
        die('Error: ' . mysqli_error($db));
    }
}