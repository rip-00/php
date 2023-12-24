<?php
// API coté site web
require "conf_bdd.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM inscription";
    $result = $connection->query($query);

    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Impossible de trouver les données dans la BDD'));
    }
}
?>
