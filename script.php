<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = intval($_POST['number']);
    $text = $_POST['text'];
    $dataArray = array();

    // create array with indexed text values
    for ($i = 0; $i < $number; $i++) {
        $dataArray[] = "index ke- ".strval($i) . ' = ' . $text;
    }

    // return JSON response with array data
    header('Content-Type: application/json');
    echo json_encode($dataArray);
    exit();
}
?>