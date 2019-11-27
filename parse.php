<?php
// parse.php
// print parseCSV
require('./world_data_parser.php');
$my_wdp = new WorldDataParser;
$table = $my_wdp->parseCSV("test.csv");
$head = $my_wdp->head;
// print_r($table);
echo "<br /> <br />";
print_r($table);
echo "<br /> <br />";
print_r($table[5]);
echo "<br /> <br />";
echo $table[4][($head[1])];

?>
