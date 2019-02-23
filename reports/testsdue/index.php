<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 02:58
 */

// List all current assets, with their PAT status (PASS/FAIL), datetime of last test, operator of last test, next test date

$page = 'reports';

include_once '../../resources/header.php';

?>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center">Tests Due</h1>
            <table class="table">
                <tr>
                    <th>Asset ID</th>
                    <th>Last Test Date</th>
                    <th>Last Test By</th>
                    <th>Last Test Note</th>
                    <th>Asset Details</th>
                </tr>

                <?php

                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
                $cmd = "SELECT asset_id, datetime, user_id, note FROM tests WHERE (asset_id NOT IN (SELECT asset_id FROM tests WHERE datetime > (SELECT DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) AND pass = 1))";
                $result = $conn -> query($cmd);

                if ($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $user = getUserInformation($row['user_id']);

                        echo "<tr class = 'danger'>";
                        echo "<td>" . $row['asset_id'] . "</td>";
                        echo "<td>" . $row['datetime'] . "</td>";
                        echo "<td>" . $user['first_name'] . " " . $user['last_name'] . "</td>";
                        echo "<td>" . $row['note'] . "</td>";
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