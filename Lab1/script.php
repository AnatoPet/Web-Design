<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна 2</title>
    <style>
        body {
            background-color: cornflowerblue;
        }

        p {
            font-style: italic;
            font-size: 130%;
            color: seashell;
        }

        a {
            font-style: italic;
            background-color: dodgerblue;
            font-size: 130%;
            color: seashell;
            padding: 5px;
            border: 2px seashell;
            text-decoration: none;
            width: 250px;
            display: block;
        }
    </style>
</head>

<body>
<?php
$firstname = $_POST['firstname'];
$family_name = $_POST['family_name'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";

$sql = "CREATE DATABASE students";
if ($conn->query($sql) === TRUE) {
    echo "Database Students created successfully <br><br>";
} else {
    echo "Error creating database: <br><br>" . $conn->error;
}
$conn->close();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: <br><br> " . $conn->connect_error);
}
echo "<p>Connected successfully </p><br><br>";



$sql = "CREATE TABLE students.Studentsdata (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    family_name VARCHAR(20) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Table Studentsdata created successfully</p> <br><br>";
} else {
    echo "<p>Error creating table: </p> <br><br> " . $conn->error;
}


$sql = "INSERT INTO students.Studentsdata (firstname, family_name)
    VALUES ('$firstname', '$family_name')";

if ($conn->query($sql) === TRUE) {
    echo "<p>New record created successfully </p> <br><br>";
} else {
    echo "<p>Error: " . $sql . "<br></p>" . $conn->error;
}
echo ' <a href="/">На головну</a>  <br>';
echo ' <a href="output1.php" id ="output1">Переглянути записи</a> ';
$conn->close();
?>
</body>

</html>