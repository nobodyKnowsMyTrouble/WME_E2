<?php
//save.php
//parseCSV
//print saveXML
require('world_data_parser.php');
$my_wdp = new WorldDataParser;
$table = $my_wdp->parseCSV("test.csv");
$wahrheitswert = $my_wdp->saveXML($table);
if ($wahrheitswert) {
  echo "<pre>" . "Speichern erfolgreich" . "</pre>";
} else {
  echo "<pre>" . "Leider haben wir nur unfähige Programmierer und irgendwas ging schief" . "</pre>";
}

?>
