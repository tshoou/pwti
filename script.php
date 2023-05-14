<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = $_POST["number"];
    $text = $_POST["text"];
    $dataArray = array();

    // create array with indexed text values
    for ($i = 1; $i <= $number; $i++) {
      $dataArray[$i] = $text . ' ' . $i;
    }

    // return JSON response with array data
    header('Content-Type: application/json');
    echo json_encode($dataArray);
}
?>
