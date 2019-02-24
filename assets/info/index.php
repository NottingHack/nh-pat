<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 03:56
 */

$page = 'assets';

if(!isset($_GET['id'])) {
    header('Location: /');
}

include_once '../../resources/header.php';

?>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center"> Asset Information</h1>
            <table class="table">
                <tr>
                    <th>Asset ID</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Class</th>
                </tr>

                <?php

                $conn = getDbConnection();
                $stmt = $conn->prepare('SELECT * FROM assets WHERE asset_id = ?;');

                $stms->bind_parm('i', $_GET['id']);
                $stmt->execute();

                $result = $stmt->get_result();

                if ($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['asset_id'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "</tr>";
                    }

                }

                $stmt->close();
                ?>

            </table>
            <h2 style="text-align: center">Tests</h2>
            <table class="table">
                <tr>
                    <th>Test ID</th>
                    <th>Datetime</th>
                    <th>Inspection</th>
                    <th>Insulation</th>
                    <th>Earth</th>
                    <th>Note</th>
                </tr>

                <?php

                $conn = getDbConnection();
                $stmt = $conn->prepare('SELECT * FROM tests WHERE asset_id = ?;');

                $stms->bind_parm('i', $_GET['id']);
                $stmt->execute();

                $result = $stmt->get_result();

                if ($result2 -> num_rows > 0){
                    while ($row2 = $result2->fetch_assoc()) {
                        if ($row2['pass'] == 1) {
                            $class = "success";
                        }
                        else {
                            $class = "danger";
                        }
                        echo "<tr class = '$class'>";
                        echo "<td>" . $row2['test_id'] . "</td>";
                        echo "<td>" . $row2['datetime'] . "</td>";
                        echo "<td>" . $row2['inspection'] . "</td>";
                        echo "<td>" . $row2['insulation'] . "</td>";
                        echo "<td>" . $row2['earth'] . "</td>";
                        echo "<td>" . $row2['note'] . "</td>";
                        echo "</tr>";
                    }

                }
                $stmt->close();

                ?>

            </table>
        </div>
    </div>

<?php

include_once '../../resources/footer.php';