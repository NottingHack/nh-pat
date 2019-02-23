<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:56
 */

$db_name = 'nhpat';
$db_user = 'nhpatdb';
$db_pass = 'nottinghack';
$db_server = 'localhost';

function getUserInformation($id) {
    $db_name = 'nhpat';
    $db_user = 'nhpatdb';
    $db_pass = 'nottinghack';
    $db_server = 'localhost';
    $userinfo = [];

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    $cmd = "SELECT * FROM users WHERE user_id = '" . $id . "'";
    $result = $conn -> query($cmd);

    if ($result -> num_rows > 0){
        $row = $result->fetch_assoc();

        $userinfo['user_id'] = $row['user_id'];
        $userinfo['first_name'] = $row['first_name'];
        $userinfo['last_name'] = $row['last_name'];
        $userinfo['username'] = $row['username'];
        $userinfo['is_admin'] = $row['is_admin'];
        $userinfo['datetime_added'] = $row['datetime_added'];
        $userinfo['added_by'] = $row['added_by'];

    }
    return $userinfo;
}

function isUserAdmin() {
    if ($_SESSION['is_admin'] == 1) {
        return true;
    }
    else {
        return false;
    }
}

function getLastAssetTest ($id) {
    $db_name = 'nhpat';
    $db_user = 'nhpatdb';
    $db_pass = 'nottinghack';
    $db_server = 'localhost';
    $testinfo = [];

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    $cmd = "SELECT * FROM tests WHERE asset_id = '" . $id . "' ORDER BY test_id DESC LIMIT 1;";
    $result = $conn -> query($cmd);

    if ($result -> num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $testinfo['test_id'] = $row['test_id'];
            $testinfo['asset_id'] = $row['asset_id'];
            $testinfo['datetime'] = $row['datetime'];
            $testinfo['inspection'] = $row['inspection'];
            $testinfo['insulation'] = $row['insulation'];
            $testinfo['earth'] = $row['earth'];
            $testinfo['pass'] = $row['pass'];
            $testinfo['note'] = $row['note'];
        }

    }
    return $testinfo;
}

function displayErrorMessage() {
    echo "<div id='errorMsg' class=\"alert alert-danger\" style='display: none;'>
            <strong>Error: </strong><span id='msg'></span>
          </div>";
}