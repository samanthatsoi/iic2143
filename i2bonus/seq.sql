CREATE OR REPLACE FUNCTION seq(first integer, last integer, increment integer)
RETURNS TABLE (number integer) AS $$
DECLARE
i INTEGER;
inc INTEGER := -increment;
BEGIN
    CREATE TABLE SEQ(number integer);
    IF (increment < 0) THEN
     FOR i in REVERSE last .. first BY inc LOOP
        INSERT INTO SEQ VALUES(i);
    END LOOP;
    ELSE
    FOR i in first .. last BY increment LOOP
        INSERT INTO SEQ VALUES(i);
    END LOOP;
    END IF; 
    RETURN QUERY SELECT * FROM SEQ;
    DROP TABLE SEQ;
    RETURN;
END;