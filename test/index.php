<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:34
 */

$page = 'test';

include_once '../resources/header.php';

displayErrorMessage();
?>

    <script>
        function test() {
            var attemptTest = new XMLHttpRequest();
            attemptTest.open("POST", "test.php", false);
            var form = document.getElementById("testitem");
            var fd = new FormData(form);
            attemptTest.send(fd);
            if (attemptTest.responseText == "Success") {
                window.location.replace("/");
            }
            else {
                document.getElementById("errorMsg").style.display = "block";
                document.getElementById("msg").innerText = attemptTest.responseText;
            }
        }
    </script>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center"> Perform Portable Appliance Test</h1>
            <p>ALL Appliances require a visual inspection. Class 1 Appliances require both Earth Bond AND Insulation Resistance testing. Class 2 Appliances require only Insulation Resistance testing.</p>
            <form id="testitem" onsubmit="return test()">
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
                            Passed Inspection:
                        </th>
                        <td>
                            <input type="checkbox" name="passed_inspection" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Insulation Resistance Ω:
                        </th>
                        <td>
                            <input type="text" name="insulation_resistance" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Earth Bond (Class 1) Ω:
                        </th>
                        <td>
                            <input type="text" name="earth_bond" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pass:
                        </th>
                        <td>
                            <input type="checkbox" name="pass" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Note:
                        </th>
                        <td>
                            <textarea name="note" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>

                        </th>
                        <td>
                            <button id="submitBtn" type="button" name="submit" class="btn btn-block" onclick="test()">Submit</div>
                        </td>
                    </tr>
                </table>



            </form>
        </div>
    </div>

<?php

include_once '../resources/footer.php';