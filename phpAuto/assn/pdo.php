<?php 
// Test using JawsDB as a Heroku addon...
$hostname = 'sm9j2j5q6c8bpgyq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'kx97q3pu209vcp9q';
$password = 'os3w5819bl6dn8n5';
$database = 'ymsl8bx8gct9al3i';  // cannot seem to create or rename db with free version of jawsdb - just imported backup into default db

 try {
     $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
     //$pdo = new PDO('mysql:host=localhost; port=3306; dbname=misc', 'rod', 'W595');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected successfully";
     }
 catch(PDOException $e)
     {     echo "Connection failed: " . $e->getMessage();     }

// $pdo = new PDO('mysql:host=localhost; port=3306; dbname=misc', 'rod', '');

?>