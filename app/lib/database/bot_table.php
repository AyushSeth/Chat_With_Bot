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
$con = mysqli_connect($server , $username , $password , $database_name);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}

session_destroy();

// Entries made on the  tables.
$data = [
    "INSERT INTO bot_active (questions, answers)
    VALUES ('HI||hello||Hello||hi||Hi||HELLO', 'Hello How are you?')",
    "INSERT INTO bot_active (questions, answers)
    VALUES ('What is your name?', 'My name is Elix')",
];  

// Inserting the data.
foreach( $data as $key){
    if(mysqli_query($con , $key)){

    }
    else {
        // echo "Error creating table. " . mysqli_error($connection);
        // exit;
    }
}

// Closing the connection.
mysqli_close($con);
