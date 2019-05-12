CREATE OR REPLACE FUNCTION cruz()
RETURNS TABLE (aa integer, ab integer, ba integer, bb integer) as $$
DECLARE
    r1 record;
    r2 record;
BEGIN
    CREATE TABLE cruz(aa integer, ab integer, ba integer, bb integer);
    FOR r1 IN SELECT * FROM A LOOP
        FOR r2 IN SELECT * FROM B LOOP
            INSERT INTO cruz VALUES(r1.a, r1.b, r2.a, r2.b);
        END LOOP;
    END LOOP;
    RETURN QUERY SELECT * FROM cruz;
    DROP TABLE cruz;
    RETURN;
END;