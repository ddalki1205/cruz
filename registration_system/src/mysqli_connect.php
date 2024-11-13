<?php
$host = 'localhost'; 
$user = '201cruz'; 
$password = 'cruz'; 
$database = 'members_cruz';


$dbconnect = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$dbconnect) {
  die('Connection failed: ' . mysqli_connect_error());
}


/* put in http://localhost/phpmyadmin -> registration_system -> SQL query box
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (id)
);


ID: name of the column that stores a unique identifier for each record
<-- why did we put ID? 1. avoid duplicates; 2. to identify each record uniquely -->

INT(11): This means the id column will store an integer value. It just suggests that the number will be displayed using 11 digits,
          but it doesn't limit the range of values, which is still the full integer range.

AUTO_INCREMENT: This ensures that MySQL will automatically increase the value of id for each new row

PRIMARY KEY (id): Makes the id column as the primary key of our table.
*/
?>