<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>

<body>
    <?php
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "task2";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    $dbname = "CREATE DATABASE IF NOT EXISTS `task2`";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }else{
            echo ("OK");
        }

    // $table_user = "CREATE TABLE IF NOT EXISTS `test` (
    //     `id` INT(10) PRIMARY KEY AUTO_INCREMENT,
    //     `username` VARCHAR(255) UNIQUE,
    //     `password` VARCHAR(255),
    //     `email`    VARCHAR(255) UNIQUE
    // );
    // "
    ?>
</body>

</html>