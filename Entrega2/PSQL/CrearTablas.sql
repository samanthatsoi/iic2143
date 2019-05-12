DROP TABLE IF EXISTS Usuario CASCADE;
CREATE TABLE Usuario(
	uid INT PRIMARY KEY not null, 
	user_nombre VARCHAR(50) not null, 
	dob DATE not null, 
	correo VARCHAR(100) not null, 
	nacionalidad VARCHAR(100) not null
);


DROP TABLE IF EXISTS Region CASCADE;
CREATE TABLE Region(
	rid INT PRIMARY KEY not null, 
	region_nombre VARCHAR(100) not null, 
	region_descripcion VARCHAR(200) not null
);

DROP TABLE IF EXISTS ParqueNacional CASCADE;
CREATE TABLE ParqueNacional(
	rid INT, 
	parkid INT PRIMARY KEY not null, 
	park_nombre VARCHAR(100) not null, 
	hectare FLOAT not null, 
	parque_descripcion VARCHAR(300) not null, 
	tarifa FLOAT not null, 
	FOREIGN KEY (rid) REFERENCES Region(rid) ON DELETE SET NULL
);

DROP TABLE IF EXISTS Sendero CASCADE;
CREATE TABLE Sendero(
	sendid INT PRIMARY KEY not null, 
	parkid INT not null, 
	send_nombre VARCHAR(100) not null, 
	largo FLOAT not null, 
	dificultad VARCHAR(20) not null, 
	duracion INT not null, 
	FOREIGN KEY (parkid) REFERENCES ParqueNacional(parkid) ON DELETE CASCADE
);


DROP TABLE IF EXISTS Registro CASCADE;
CREATE TABLE Registro(
	registroid INT PRIMARY KEY not null, 
	uid INT, 
	sendid INT, 
	entrada TIMESTAMP not null, 
	salida TIMESTAMP not null, 
	estado VARCHAR(10) not null, 
	FOREIGN KEY (uid) REFERENCES Usuario(uid) ON DELETE SET NULL, 
	FOREIGN KEY (sendid) REFERENCES Sendero(sendid) ON DELETE SET NULL
);

DROP TABLE IF EXISTS Atractivo CASCADE;
CREATE TABLE Atractivo(
	atractid INT PRIMARY KEY not null, 
	parkid INT not null, 
	atract_nombre VARCHAR(100) not null, 
	atract_descripcion VARCHAR(300) not null,
	atract_url VARCHAR(200) not null,
	FOREIGN KEY (parkid) REFERENCES ParqueNacional(parkid) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Vina CASCADE;
CREATE TABLE Vina(
	rid INT, 
	vinaid INT PRIMARY KEY not null, 
	vina_nombre VARCHAR(100) not null, 
	vina_telefono BIGINT not null, 
	vina_descripcion VARCHAR(300) not null,
	FOREIGN KEY (rid) REFERENCES Region(rid) ON DELETE SET NULL
);

DROP TABLE IF EXISTS Vino CASCADE;
CREATE TABLE Vino(
	vinoid INT PRIMARY KEY not null, 
	vinaid INT not null, 
	vino_nombre VARCHAR(100) not null,
	vino_descripcion VARCHAR(300) not null, 
	cepa VARCHAR(50) not null, 
	vino_precio FLOAT not null,
	FOREIGN KEY (vinaid) REFERENCES Vina(vinaid) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Enoturismo CASCADE;
CREATE TABLE Enoturismo(
	tourid INT PRIMARY KEY not null, 
	tour_nombre VARCHAR(100) not null, 
	tour_precio FLOAT not null
);

DROP TABLE IF EXISTS TourVino CASCADE;
CREATE TABLE TourVino(
	tourid INT not null, 
	vinoid INT not null,
	PRIMARY KEY (tourid, vinoid),
	FOREIGN KEY (vinoid) REFERENCES Vino(vinoid) ON DELETE CASCADE,
	FOREIGN KEY (tourid) REFERENCES Enoturismo(tourid) ON DELETE CASCADE
);


