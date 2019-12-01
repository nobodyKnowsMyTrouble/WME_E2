<?php
//save.php
//parseCSV
//print saveXML
require_once('world_data_parser.php');
$my_wdp = new WorldDataParser;
$table = $my_wdp->parseCSV("test.csv");
$wahrheitswert = $my_wdp->saveXML($table);
if ($wahrheitswert) {
  echo "XML Savestatus: erfolgreich (1)";
} else {
  echo "< br />" . "Leider haben wir nur unfähige Programmierer und irgendwas ging schief" . "< br />";
}

?>
