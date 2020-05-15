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

//database name
$db_namme = 'bot';

// Connect to the MySql server.
$con = mysqli_connect($server , $usernamme , $password , $db_namme);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}

$txt = mysqli_real_escape_string($con , $_POST['txt']);

$sql = "SELECT answers FROM bot_active WHERE questions LIKE '%$txt%' ";

$response = mysqli_query($con , $sql);

if ( mysqli_num_rows($response) > 0 ) {
    $row = mysqli_fetch_assoc($response);
    $html = $row['answers'];
} else {
    $sql = " INSERT INTO bot_new_database (new_questions, question_asked_by) 
    VALUES ('$txt', 'user') ";
    if(mysqli_query($con , $sql)){

    }
    else
    {
        echo "Error :- " . mysqli_error($connection);
    }
    $html = "Sorry not able to understand you.";
}

echo $html;  


?>