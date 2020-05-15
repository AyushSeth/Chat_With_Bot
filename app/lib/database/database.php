<?php

/******************************************************************************
 *                                                                            *
 *                                                                            *
 *   Do not change any data without any prior knowledge of PHP. If made and   *
 *   unable to fix. Delete and again reinstall the software.                  *  
 *                                                                            *  
 *                                                                            *  
 *****************************************************************************/ 

 //  Server name
$server = $_SESSION['server_name'];

// Username of the MySql. Check it from the User_groups from the MySql Panel.
$username = $_SESSION['user_name'];

// corresponding password of the username.
$password = $_SESSION['password'];

// database name on the MySql server
$database_name = $_SESSION['db_name'];

// Connect to the MySql server.
$connection = mysqli_connect($server , $username , $password , $database_name);

if(!$connection){
    die("Connection Failed " . mysqli_connect_error());
}

// Creating the table.
    $sql = "CREATE TABLE bot_active (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        questions VARCHAR(800) NOT NULL,
        answers VARCHAR(800) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    // Executing query.
    if(mysqli_query($connection , $sql)){

    }
    else {
        $sql = "SELECT count(*) FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'bot') AND (TABLE_NAME = 'bot_active')";
        if(mysqli_query($connection , $sql)) {
            
        }
        else{
            echo "Error Found within MySQL :-> " . mysqli_error($connection);
            die();
        }
    }

    // Creating the table.
    $sql = "CREATE TABLE bot_new_database (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        new_questions VARCHAR(800) NOT NULL,
        question_asked_by VARCHAR(800) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


    if(mysqli_query($connection , $sql)){
        require('bot_table.php');
    }
    else {
        $sql = "SELECT count(*) FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'bot') AND (TABLE_NAME = 'bot_new_database')";
        if(mysqli_query($connection , $sql)) {
            
        }
        else{
            echo "Error Found within MySQL :-> " . mysqli_error($connection);
            die();
        }
    }

// Closing the connection.
mysqli_close($connection);

