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


    # creating with sql server and conn is an object
    $conn = new mysqli($servername, $username, $password);

    # creating database in mysql by myDB name
    $sql = "CREATE DATABASE mydb";
    $conn->query($sql);
    // checking query is excecuting or not 
    /*
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
    } else {
    echo "Error creating database: " . $conn->error;
    }
    */
    $conn->close();
    $conn = new mysqli($servername, $username, $password,"mydb"); 
     $sql = "CREATE TABLE Mytable (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        username VARCHAR(30) NOT NULL PRIMARY KEY,
        email VARCHAR(50),
        password varchar(70),
        gender varchar(10),
        total varchar(10),
        win varchar(10)
        )";
    $conn->query($sql);
    //echo $conn->error;
    /*
        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully<br>";
            } else {
            echo "Error creating database: " . $conn->error;
            }
    */
            $conn->close();
        ?>
</body>
</html>