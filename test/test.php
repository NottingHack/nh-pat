<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:56
 */

session_start();

require_once '../resources/common.php';

$insert = "INSERT INTO tests (asset_id, user_id, datetime, inspection, insulation, earth, pass, note) VALUES ('";

if ($_POST['asset_id']=="") {
    die("No Asset ID");
}

$date = (new \DateTime())->format('Y-m-d H:i:s');

if ($_POST['passed_inspection']=="") {
    $passed_inspection = 0;
} else {
    $passed_inspection = 1;
}

if ($_POST['insulation_resistance']=="") {
    die("No Insulation Resistance");
}

if ($_POST['earth_bond']=="") {
    die("No Earth Bond");
}

if ($_POST['pass']=="") {
    $pass = 0;
} else {
    $pass = 1;
}

if ($_POST['note']=="") {
    $note = '';
} else {
    $note = $_POST['note'];
}

$conn = getDbConnection();
$stmt = $conn->prepare('INSERT INTO tests (asset_id, user_id, datetime, inspection, insulation, earth, pass, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param(
    'sisissis',
    $_POST['asset_id'],
    $_SESSION['user_id'],
    $date,
    $passed_inspection,
    $_POST['insulation_resistance'],
    $_POST['earth_bond'],
    $pass,
    $note
);

$stmt->execute();
$stmt->close();

echo "Success";
