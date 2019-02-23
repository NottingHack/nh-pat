<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:49
 */

// List all current assets, with their PAT status (PASS/FAIL), datetime of last test, operator of last test, next test date

$page = 'assets';

include_once '../../resources/header.php';

?>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center">Current Assets</h1>
            <table class="table">
                <tr>
                    <th>Asset ID</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Class</th>
                    <th>Last Test Date</th>
                    <th>Details</th>
                </tr>

                <?php

                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
                $cmd = "SELECT * FROM assets WHERE current = 1;";
                $cmd2 = "SELECT asset_id FROM tests WHERE datetime > (SELECT DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) AND pass = 1;";
                $result = $conn -> query($cmd);
                $result2 = $conn ->query($cmd2);
                $res = $result2 -> fetch_all();

                if ($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $lasttest = getLastAssetTest($row['asset_id']);
                        if (in_array([$row['asset_id']],$res)) {
                            $class = "success";
                        }
                        else {
                            $class = "danger";
                        }
                        echo "<tr class = '$class'>";
                        echo "<td>" . $row['asset_id'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>" . $lasttest['datetime'] . "</td>";
                        echo "<td> <a href='/assets/info/?id=" . $row['asset_id'] . "'>Details</a> </td>";
                        echo "</tr>";
                    }

                }

                ?>

            </table>
        </div>
    </div>

<?php

include_once '../../resources/footer.php';