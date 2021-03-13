<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 25/05/2018
 * Time: 21:46
 */

if($page=="profile"){$menu_user_active = "active"; }
else {$menu_user_active = "";}
if($page=="admin"){$menu_admin_active = "active"; }
else {$menu_admin_active = "";}
if($page=="test"){$menu_test_active = "active"; }
else {$menu_test_active = "";}
if($page=="reports"){$menu_reports_active = "active"; }
else {$menu_reports_active = "";}
if($page=="assets"){$menu_assets_active = "active"; }
else {$menu_assets_active = "";}
if($page=="login"){$menu_login_active = "active"; }
else {$menu_login_active = "";}

$menu_assets = '<li class="dropdown ' . $menu_assets_active . '">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Assets
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/assets/list">Current Assets</a></li>
          <li><a href="/assets/add">New Asset</a></li>
          <li><a href="/assets/remove">Remove Asset</a></li>
        </ul>
      </li>';

$menu_login = '<li class="' . $menu_login_active . '"><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
$menu_logout = '<li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';

$menu_reports = '<li class="dropdown ' . $menu_reports_active . '">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Test Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">';

if (array_key_exists('user_id', $__SESSION)) {
    $menu_reports .= '<li><a href="/reports/usertests/?id=' . $_SESSION['user_id'] . '">My Tests</a></li>';
}

$menu_reports .= '
          <li><a href="/reports/testsdue">Tests Due</a></li>
          <li><a href="/reports/recenttests">Recent Tests</a></li>
        </ul>
      </li>';

$menu_test = '<li class="' . $menu_test_active . '"><a href="/test">Perform Test</a></li>';

