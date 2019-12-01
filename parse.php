<?php
// parse.php
// print parseCSV
require_once('./world_data_parser.php');
$my_wdp = new WorldDataParser;
$table = $my_wdp->parseCSV("test.csv");
$head = $my_wdp->head;
// print_r($table);
echo "<pre>" . print_r($table, TRUE) . "</pre>";
?>
