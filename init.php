<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE assignment8";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$dbname = "assignment8";
// Create connection again with database "assignment8"
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table
// sql to create table
$sql = "CREATE TABLE Items (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(40) NULL,
    Type VARCHAR(40) NULL,
    Make VARCHAR(40) NULL,
    Model VARCHAR(40) NULL,
    Brand VARCHAR(40) NULL,
    Description VARCHAR(60) NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table Items created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
  
// populate table using csv file
$file = fopen("input.csv", "r");

$count = 0;
while(($column = fgetcsv($file, 1000, ",")) !== FALSE){
    $count++;
    if ($count == 1) {continue; } //skip the first line in csv
    $sql = "Insert into items (Name, Type, Make, Model, Brand, Description) values ('" . $column[1] . "', '" . $column[2] . "',
    '" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] ."')";

    $result = mysqli_query($conn, $sql);
}

if(!empty($result)){
    echo "CSV Data Imported into the database";
}else{
    echo "Problem in importing csv";
}

fclose($file);

$conn->close();
?>