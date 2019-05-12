<?php
try{
	require('conninfo.php');
	$conn = new PDO("pgsql:dbname=$connserver;host=localhost;port=5432;user=$connuser;password=$connpass;options='-c client_encoding=utf8'");
} catch(Exception $e)
{
	echo "Can't connect to database because $e";
}
?>