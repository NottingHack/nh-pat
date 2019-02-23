<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21/05/2018
 * Time: 00:48
 */

// Ask user for how many tests they would like to view, then display last x tests as requested

$page = 'reports';

include_once '../../resources/header.php';

?>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center">Recent tests (last 100)</h1>
            <table class="table">
                <tr>
                    <th>Test ID</th>
                    <th>Asset ID</th>
                    <th>User</th>
                    <th>Datetime</th>
                    <th>Inspection</th>
                    <th>Insulation</th>
                    <th>Earth</th>
                    <th>Note</th>
                </tr>

                <?php

                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
                $cmd = "SELECT * FROM tests ORDER BY test_id LIMIT 100;";
                $result = $conn -> query($cmd);

                if ($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $user = getUserInformation($row['user_id']);
                        if ($row['pass'] == 1) {
                            $class = "success";
                        }
                        else {
                            $class = "danger";
                        }
                        echo "<tr class = '$class'>";
                        echo "<td>" . $row['test_id'] . "</td>";
                        echo "<td>" . $row['asset_id'] . "</td>";
                        echo "<td>" . $user['first_name'] . " " . $user['last_name'] . "</td>";
                        echo "<td>" . $row['datetime'] . "</td>";
                        echo "<td>" . $row['inspection'] . "</td>";
                        echo "<td>" . $row['insulation'] . "</td>";
                        echo "<td>" . $row['earth'] . "</td>";
                        echo "<td>" . $row['note'] . "</td>";
                        echo "</tr>";
                    }

                }

                ?>

            </table>
        </div>
    </div>

<?php

include_once '../../resources/footer.php';