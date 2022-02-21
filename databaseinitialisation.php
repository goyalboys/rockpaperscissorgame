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
        $sql = "CREATE DATABASE mydb";
        $conn->query($sql);
        $conn = new mysqli($servername, $username, $password,"mydb"); 
        $sql = "CREATE TABLE Mytable (
            name VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL PRIMARY KEY,
            email VARCHAR(50),
            password varchar(70),
            gender varchar(10),
            total varchar(10) DEFAULT 0,
            win varchar(10) DEFAULT 0,
            tie varchar(10) DEFAULT 0,
            loose varchar(10) DEFAULT 0,
            active TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
        $conn->query($sql);
        echo $conn->error;
        $conn->close();
    ?>
</body>
</html>