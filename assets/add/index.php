<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:55
 */

$page = "assets";

include_once '../../resources/header.php';

displayErrorMessage();
?>

    <script>
        function add() {
            var attemptAdd = new XMLHttpRequest();
            attemptAdd.open("POST", "add.php", false);
            var form = document.getElementById("addasset");
            var fd = new FormData(form);
            attemptAdd.send(fd);
            console.log(attemptAdd.responseText);
            if (attemptAdd.responseText.trim() == "Success") {
                //window.location.replace("/");
                document.getElementById("errorMsg").style.display = "block";
                document.getElementById("msg").innerText = attemptAdd.responseText;
            }
            else {
                document.getElementById("errorMsg").style.display = "block";
                document.getElementById("msg").innerText = attemptAdd.responseText;
            }
        }
    </script>

    <h1 style="text-align: center"> Add Asset </h1>
    <form id="addasset" onsubmit="return add()">
        <table class="table">
            <tr>
                <th>
                    Asset ID:
                </th>
                <td>
                    <input type="text" name="asset_id" class="form-control">
                </td>
            </tr>
            <tr>
                <th>
                    Description:
                </th>
                <td>
                    <input type="text" name="description" class="form-control">
                </td>
            </tr>
            <tr>
                <th>
                    Location:
                </th>
                <td>
                    <input type="text" name="location" class="form-control">
                </td>
            </tr>
            <tr>
                <th>
                    Class:
                </th>
                <td>
                    <input type="text" name="class" class="form-control">
                </td>
            </tr>
            <tr>
                <th>

                </th>
                <td>
                    <button id="submitBtn" type="button" name="submit" class="btn btn-block" onclick="add()">Submit</div>
                </td>
            </tr>
        </table>



    </form>

<?php

include_once '../../resources/footer.php';