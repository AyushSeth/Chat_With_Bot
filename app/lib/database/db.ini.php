<?php

/******************************************************************************
 *                                                                            *
 *                                                                            *
 *   Do not change any data without any prior knowledge of PHP. If made and   *
 *   unable to fix. Delete and again reinstall the software.                  *  
 *                                                                            *  
 *                                                                            *  
 *****************************************************************************/ 

 
session_start();

//  Server name
$server = 'localhost';

// Username of the MySql. Check it from the User_groups from the MySql Panel.
$usernamme = 'root';

// corresponding password of the username.
$password = '';

// Connect to the MySql server.
$con = mysqli_connect($server , $usernamme , $password);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}

# creating the database name on the server for the project. If you want to change the
# name then change it from here.
$db_name = 'bot';

$sql = "CREATE DATABASE $db_name";

if(mysqli_query($con , $sql)){

}
else {
    // echo "Error creating database. " . mysqli_error($con);
    // exit;
}

// Saving the data for other files.

$_SESSION['server_name'] = $server;
$_SESSION['user_name'] = $usernamme;
$_SESSION['password'] = $password;
$_SESSION['db_name'] = $db_name;

// Close the MySql Connection.
mysqli_close($con);

require('database.php');

