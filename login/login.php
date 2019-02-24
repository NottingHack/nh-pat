<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:36
 */

session_start();

require_once '../resources/common.php';

if ($_POST['username']=="") {
    die("No Username");
}
if ($_POST['password']=="") {
    die("No Password");
}

$conn = getHMSDbConnection();
$cmd = "SELECT * FROM users WHERE username = '" . strtolower($_POST['username']) . "'";
$result = $conn -> query($cmd);

if ($result -> num_rows > 0){
    $row = $result->fetch_assoc();
    if ((password_verify($_POST['password'],$row['password'])) && ($row['active'] == 1)){

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['is_admin'] = $row['is_admin'];
        $_SESSION['datetime_added'] = $row['datetime_added'];
        $_SESSION['added_by'] = $row['added_by'];
        echo "Success";
    }
    else {
        echo "Incorrect Password";
    }
}
else {
    echo "User Not Found";
}