CREATE OR REPLACE FUNCTION
vuelo_cacheando(c_origen varchar)
RETURNS TABLE (ciudad_destino varchar(50)) AS $$
BEGIN

DROP TABLE IF EXISTS Vuelo_cache;
CREATE TABLE Vuelo_cache(ciudad_destino varchar PRIMARY KEY);

INSERT INTO Vuelo_cache SELECT Vuelo.ciudad_destino
FROM Vuelo WHERE Vuelo.ciudad_origen = c_origen;

LOOP
DROP TABLE IF EXISTS Vuelo_n;

CREATE TABLE Vuelo_n(ciudad_destino varchar PRIMARY KEY);
INSERT INTO Vuelo_n 
    SELECT Vuelo.ciudad_destino
    FROM Vuelo, Vuelo_cache
    WHERE Vuelo_cache.ciudad_destino = Vuelo.ciudad_origen;

INSERT INTO Vuelo_n
SELECT * FROM Vuelo_cache WHERE Vuelo_cache.ciudad_destino NOT IN (SELECT * FROM Vuelo_n);

EXIT WHEN NOT EXISTS
(SELECT * FROM Vuelo_n EXCEPT SELECT * FROM Vuelo_cache);

INSERT INTO Vuelo_cache
SELECT * FROM Vuelo_n WHERE Vuelo_n.ciudad_destino NOT IN (SELECT * FROM Vuelo_cache);

END LOOP;

RETURN QUERY SELECT Vuelo_cache.ciudad_destino FROM Vuelo_cache;

END;