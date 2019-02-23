<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:35
 */

$page='login';

include_once '../resources/header.php';

displayErrorMessage();

?>

<script>
    function login() {
        var attemptLogin = new XMLHttpRequest();
        attemptLogin.open("POST", "login.php", false);
        var form = document.getElementById("loginForm");
        var fd = new FormData(form);
        attemptLogin.send(fd);
        if (attemptLogin.responseText == "Success") {
            window.location.replace("/");
        }
        else {
            document.getElementById("errorMsg").style.display = "block";
            document.getElementById("msg").innerText = attemptLogin.responseText;
        }
    }
</script>

<div class='row'>
    <div class='col-sm-4'>
    </div>
    <div class='col-sm-4'>
        <img src='https://wiki.nottinghack.org.uk/images/thumb/a/a7/LogoOrig.svg/243px-LogoOrig.svg.png' style='display:block;margin:auto;'>
    </div>
    <div class='col-sm-4'> </div>
</div>

<div class='row'>
    <div class='col-sm-4'> </div>
    <div class='col-sm-4'>
        <form id="loginForm" onsubmit="return login()">
            <table style="margin:auto;">
                <tr>
                    <th><label>Username: </label></th>
                    <td><input name="username" class="form-control" type="text"> </td>
               </tr>
              <tr>
                    <th><label>Password: </label></th>
                    <td><input id="passwd" name="password" class="form-control" type="password"> </td>
                </tr>
            </table>
            </br>
                <div style="text-align: center">
                    <button id="submitBtn" type="button" name="submit" class="btn btn-block" onclick="login()">Submit</div>
                </div>
        </form>
    </div>
    <div class='col-sm-4'> </div>
</div>

<script>

    var input = document.getElementById("passwd");
    input.addEventListener("keyup", function(event) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Trigger the button element with a click
            document.getElementById("submitBtn").click();
        }
    });

</script>

<?php

include_once '../resources/footer.php';