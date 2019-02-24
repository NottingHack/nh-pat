<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:56
 */

session_start();
require_once '../../resources/common.php';

if ($_POST['asset_id'] == '') {
    die('No Asset ID');
} else if ($_POST['description'] == '') {
    die('No Description');
} else if ($_POST['location'] == '') {
    die('No Location');
} else if ($_POST['class'] == '') {
    die('No Class');
} else {
    $conn = getDbConnection();
    $stmt = $conn->prepare('INSERT INTO assets VALUES (?, ?, ?, ?, 1)');
    $stmt->bind_param('ssss', $_POST['asset_id'], $_POST['description'], $_POST['location'], $_POST['class']);
    $stmt->execute();
    $stmt->close();

    echo "Success";
}