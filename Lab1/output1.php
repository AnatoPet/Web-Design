<?php
$offset = $_GET["offset"];

if (!isset($offset))
    $offset = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна 2 -> Виведення <?= $offset ?> </title>
    <style>
        body {
            background-color: cornflowerblue;
            color: seashell;
        }

        p {
            font-style: italic;
            font-size: 130%;
            color: seashell;
        }
    </style>

</head>

<body>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, family_name FROM Studentsdata LIMIT 4 OFFSET $offset";

/* select all data */
$sql2 = "SELECT id, firstname, family_name FROM Studentsdata";
$result2 = $conn->query($sql2);
$num_rows_all = $result2->num_rows; //count of all rows

$result = $conn->query($sql);
echo " <p> Виведення ";
$offset2 = $offset + 4;
echo  $offset+1 .' - '. $offset2;
echo " : </p>" . "<br>";
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<table border = 1>';
        echo '<tr><td>' . "id: " . $row["id"] . '</td><td>' . "  Ім'я: " . $row["firstname"] . '</td><td>' . " Прізвище  " . $row["family_name"] . '</td><tr>';
        echo '</table>';
    }
} else {
    echo "0 results";
}
echo '<br><br>';
echo ' <a href="/">На головну</a> <br><br> <br>';

$page_num = 0;

for ($i = 0; $i <= $num_rows_all; $i += 4) {
    $page_num++;
    echo ' <a href="output.php?offset=' . $i . '">' . $page_num  . '</a>';
}

?>
</body>

</html>