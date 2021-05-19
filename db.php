<?php

$dsn = 'mysql:host=localhost;dbname=shrcom';
$username='root';
$password='';

try{

$conn = new PDO($dsn,$username,$password);


}
catch(PDOException $e){}

  ?>