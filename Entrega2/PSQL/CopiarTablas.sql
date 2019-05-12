\copy Usuario from '../Entrega2/Datos/Usuario.csv' delimiter ',' CSV HEADER ;
\copy Region from '../Entrega2/Datos/Region.csv' delimiter ',' CSV HEADER ;
\copy ParqueNacional from '../Entrega2/Datos/ParqueNacional.csv' delimiter ',' CSV HEADER ;
\copy Sendero from '../Entrega2/Datos/Sendero.csv' delimiter ',' CSV HEADER ;

CREATE TABLE TourTemp(
	tourid INT not null, 
	tour_nombre VARCHAR(100) not null, 
	tour_precio FLOAT not null
);

\copy TourTemp from '../Entrega2/Datos/Enoturismo.csv' delimiter ',' CSV HEADER ;
INSERT INTO Enoturismo(tourid, tour_nombre, tour_precio) SELECT DISTINCT * FROM TourTemp;
DROP TABLE TourTemp;


# \copy Enoturismo from '../Entrega2/Datos/Enoturismo.csv' delimiter ',' CSV HEADER ;
\copy Atractivo from '../Entrega2/Datos/Atractivo.csv' delimiter ',' CSV HEADER ;

CREATE TABLE VinaTemp(
	rid INT, 
	vinaid INT not null, 
	vina_nombre VARCHAR(100) not null, 
	vina_telefono BIGINT not null, 
	vina_descripcion VARCHAR(300) not null
);

\copy VinaTemp from '../Entrega2/Datos/Vina.csv' delimiter ',' CSV HEADER ;
INSERT INTO Vina(rid, vinaid,vina_nombre,vina_telefono, vina_descripcion) SELECT DISTINCT * FROM VinaTemp;
DROP TABLE VinaTemp;

\copy Vino from '../Entrega2/Datos/Vino.csv' delimiter ',' CSV HEADER ;
\copy TourVino from '../Entrega2/Datos/TourVino.csv' delimiter ',' CSV HEADER ;


iconv -t utf-8 Registro.csv > Registro-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Region.csv > Region-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Usuario.csv > Usuario-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Enoturismo.csv > Enoturismo-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Sendero.csv > Sendero-utf8.csv

iconv -f ISO-8859-1 -t utf-8 ParqueNacional.csv > ParqueNacional-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Vino.csv > Vino-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Vina.csv > Vina-utf8.csv

iconv -f ISO-8859-1 -t utf-8 TourVino.csv > TourVino-utf8.csv

iconv -f ISO-8859-1 -t utf-8 Atractivo.csv > Atractivo-utf8.csv

