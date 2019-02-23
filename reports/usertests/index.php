<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 01:23
 */

$page = 'reports';

session_start();

if(!isset($_GET['id'])) {
    header('Location: /');
}
    $id = $_GET['id'];

include_once '../../resources/header.php';

?>

    <div class="container">
        <div class="row">
            <h1 style="text-align: center"> <?php echo "Tests performed by " . $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></h1>
            <table class="table">
                <tr>
                    <th>Test ID</th>
                    <th>Asset ID</th>
                    <th>Datetime</th>
                    <th>Inspection</th>
                    <th>Insulation</th>
                    <th>Earth</th>
                    <th>Note</th>
                </tr>

                <?php

                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
                $cmd = "SELECT * FROM tests WHERE user_id = '" . $id . "'";
                $result = $conn -> query($cmd);

                if ($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        if ($row['pass'] == 1) {
                            $class = "success";
                        }
                        else {
                            $class = "danger";
                        }
                        echo "<tr class = '$class'>";
                        echo "<td>" . $row['test_id'] . "</td>";
                        echo "<td>" . $row['asset_id'] . "</td>";
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