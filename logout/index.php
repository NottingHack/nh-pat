<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:36
 */

session_start();
$_SESSION = array();
session_destroy();
header('Location: /');