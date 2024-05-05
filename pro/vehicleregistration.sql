create DATABASE vehicleregistration;
USE vehicleregistration;
CREATE TABLE user (
	id int NOT NULL UNIQUE AUTO_INCREMENT,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    username VARCHAR(30) UNIQUE,
    email VARCHAR(40) UNIQUE,
    password VARCHAR(264),
    mobile VARCHAR(40),
    roles VARCHAR(6),
    ssn varchar(15),
    gender varchar(10),
    PRIMARY KEY(ssn)
);
CREATE TABLE vehicles (
	vid int NOT NULL UNIQUE AUTO_INCREMENT,
    vin VARCHAR(17)UNIQUE,
    wsize int,
    vendor VARCHAR(15),
    name VARCHAR(15),
    model VARCHAR(15),
    man_year int,
    colour VARCHAR(15),
    vtype VARCHAR(10),
    PRIMARY KEY(vin)
);
CREATE TABLE registration (
    rid int NOT NULL UNIQUE AUTO_INCREMENT,
    registernumber VARCHAR(20) UNIQUE,
    ssn varchar(15),
    vin varchar(17),
    foreign key(ssn) references user(ssn) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(vin) references vehicles(vin) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(registernumber)
);
CREATE TABLE registrationsrequest (
	rrid int NOT NULL UNIQUE AUTO_INCREMENT,
    registernumber VARCHAR(20) UNIQUE,
    ssn varchar(15),
    vin varchar(17),
    foreign key(ssn) references user(ssn) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(vin) references vehicles(vin) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(registernumber) references registration(registernumber) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE rejectedregistrations (
	rejid int not null unique auto_increment,
    ssn varchar(15),
    vin varchar(17),
    foreign key(ssn) references user(ssn) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(vin) references vehicles(vin) ON DELETE CASCADE ON UPDATE CASCADE
);