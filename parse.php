<?php
// parse.php
// print parseCSV
include('./world_data_parser.php');
$my_wdp = new WorldDataParser;
$my_wdp->parseCSV("test.csv");
$hed = $my_wdp->head;
print_r($my_wdp->table);
echo "<br />";echo "<br />";
print_r($tab[5]);
echo "<br />";echo "<br />";
echo $tab[4][($hed[1])];

?>
