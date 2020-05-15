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
$server = 'localhost';

// Username of the MySql. Check it from the User_groups from the MySql Panel.
$usernamme = 'root';

// corresponding password of the username.
$password = '';

//
$db_namme = 'bot';

// Connect to the MySql server.
$con = mysqli_connect($server , $usernamme , $password , $db_namme);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}

echo $txt = mysqli_real_escape_string($con , $_POST['txt']);


?>