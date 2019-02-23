<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:35
 */
session_start();

include_once 'common.php';
require_once 'menu.php';

if(!isset($_SESSION['user_id'])){
    if ($page != "login") {
        //header('Location: /login');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/resources/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Nottinghack - PAT Site</title>

</head>
<body>
<div id="header">
    <div class="container container-fluid">
        <div class="container">
        <div class="row" id="nav">
            </br>
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Nottinghack PAT</a>
                </div>

                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li <?php if($page=="home"){echo 'class="active"';} ?> ><a href="/">Home</a></li>
                        <?php if(isset($_SESSION['user_id'])) {echo $menu_test; } ?>
                        <?php if(isset($_SESSION['user_id'])) {echo $menu_reports; } ?>
                        <?php if(isset($_SESSION['user_id'])) {echo $menu_assets; } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_SESSION['user_id'])) {echo $menu_logout; } ?>
                        <?php if(!isset($_SESSION['user_id'])) {echo $menu_login; } ?>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    </div>
</div>
<div id="main" class = "container container-fluid">
