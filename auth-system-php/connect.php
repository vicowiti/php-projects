<?php

$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='12345';
$DATABASE='php_auth';


$connection=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$connection)
{
     die("Database Not Connected");
}


?>