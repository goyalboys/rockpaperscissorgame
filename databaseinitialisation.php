<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        $sql = "CREATE DATABASE IF NOT EXISTS training_game";
        $conn->query($sql);
        $conn = new mysqli($servername, $username, $password,"training_game"); 
        $sql = "CREATE TABLE IF NOT EXISTS user_details(
            name VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL PRIMARY KEY,
            email VARCHAR(50),
            password varchar(70),
            gender varchar(10),
            active TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

        $conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS rps_scoreboard(
            total varchar(10) DEFAULT 0,
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            win varchar(10) DEFAULT 0,
            tie varchar(10) DEFAULT 0,
            loose varchar(10) DEFAULT 0,
            username varchar(30),
            FOREIGN KEY (username) REFERENCES user_details (username) ON DELETE CASCADE
            )";
        $conn->query($sql);
        echo $conn->error;
        $conn->close();
    ?>
</body>
</html>