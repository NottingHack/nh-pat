<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:56
 */

session_start();
require_once '../../resources/common.php';

$insert = "INSERT INTO assets VALUES ('";

if ($_POST['asset_id']=="") {
    die('No Asset ID');
}
else {
    $insert = $insert . $_POST['asset_id'] . "', '";
}
if ($_POST['description']=="") {
    die('No Description');
}
else {
    $insert = $insert . $_POST['description'] . "', '";
}
if ($_POST['location']=="") {
    die('No Location');
}
else {
    $insert = $insert . $_POST['location'] . "', '";
}
if ($_POST['class']=="") {
    die('No Class');
}
else {
    $insert = $insert . $_POST['class'] . "', '";
}
$insert = $insert . "1";
// ADDED BY HERE

$insert = $insert . "'); ";

$conn = getDbConnection();
$cmd = $insert;
$conn -> query($cmd);

echo "Success";