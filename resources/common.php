<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:56
 */

/**
 * nhpat.php contains
 *
 * <?php
 *
 * $db_name = 'nh-pat';
 * $db_name_hms = 'instrumentation';
 * $db_user = '<USER>';
 * $db_pass = '<PASSWORD>';
 * $db_server = '<HOST>';
 * $krb_realm = 'NOTTINGHACK.ORG.UK';
 */
require_once '/home/hms/www_secure/nhpat.php';

function getDbConnection() {
    global $db_server, $db_user, $db_pass, $db_name;

    return new mysqli($db_server, $db_user, $db_pass, $db_name);
}

function getHMSDbConnection() {
    global $db_server, $db_user, $db_pass, $db_name_hms;

    return new mysqli($db_server, $db_user, $db_pass, $db_name_hms);
}

function getUserInformation($id) {
    $userinfo = [];

    $conn = getHMSDbConnection();
    $cmd = 'SELECT member_id, firstname, surname, username FROM members WHERE member_id = \'' . $id . '\';';
    $result = $conn -> query($cmd);

    if ($result -> num_rows > 0){
        $row = $result->fetch_assoc();

        $userinfo['user_id'] = $row['member_id'];
        $userinfo['first_name'] = $row['firstname'];
        $userinfo['last_name'] = $row['surname'];
        $userinfo['username'] = $row['username'];

    }
    return $userinfo;
}

function getLastAssetTest ($id) {
    $testinfo = [];

    $conn = getDbConnection();
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