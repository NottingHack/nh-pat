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

function checkKrbPassword($username, $password) {
    global $krb_realm;

    $ticket = new KRB5CCache();
    try {
        $ticket->initPassword(strtolower($username) . "@" . $krb_realm, $password);
    } catch (Exception $e) {

        return false;
    }

    return true;
}

$conn = getHMSDbConnection();
$stmt = $conn->prepare('SELECT m.member_id, m.firstname, m.surname, m.username '
  . 'FROM members m '
  . 'INNER JOIN member_group mg ON mg.member_id = m.member_id '
  . 'INNER JOIN grp g ON g.grp_id = mg.grp_id '
  . 'INNER JOIN group_permissions gp ON gp.grp_id = g.grp_id '
  . 'INNER JOIN permissions p ON p.permission_code = gp.permission_code '
  . 'WHERE m.username = ? '
  . 'OR m.email = ? '
  . 'AND p.permission_code = \'PAT_TEST\';');

$stmt->bind_param("ss", $_POST['username'], $_POST['username']);
$stmt->execute();

$result = $stmt->get_result();

if ($result -> num_rows > 0){
    $row = $result->fetch_assoc();
    if (checkKrbPassword($row['username'], $_POST['password'])){

        $_SESSION['user_id'] = $row['member_id'];
        $_SESSION['first_name'] = $row['firstname'];
        $_SESSION['last_name'] = $row['surname'];
        $_SESSION['username'] = $row['username'];
        echo "Success";
    }
    else {
        echo "Incorrect Password";
    }
}
else {
    echo "User Not Found";
}

$stmt->close();