<?php
class WorldDataParser {
  var $benoetigter_kraftstoff;
  var $head = array();
  var $table = array();
  function parseCSV(string $path){
    $path = "world_data_v1.csv"; //TODO: Entfernen
    $row = 1;
    ini_set('auto_detect_line_endings', TRUE); // for Mac-User
    if (($handle = fopen($path, "r")) !== FALSE) {
            //  array fgetcsv(resource $handle, integer $length, string $delimiter)
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row == 1){
          $this->head = $data;
        } else {
          $this->table[] = array_combine($this->head, $data);
        }
        $row++;
      }
      fclose($handle);
      ini_set('auto_detect_line_endings', FALSE);
//
      return $this->table;
    }
  }

  function saveXML(){
    echo "<p>Bitte mit ";
    echo $this->benoetigter_kraftstoff;
    echo " betanken";
  }

  function printXML(){
    echo "<p>Bitte mit ";
    echo $this->benoetigter_kraftstoff;
    echo " betanken";
  }
}
// bisher passiert noch gar nichts,
// jetzt wird aus der Klasse ein Objekt erzeugt
// $auto_1 = new auto;

// dem Auto wird nun der Kraftstoff zugewiesen,
// eine Eigenschaft (Attribut) wird definiert
//$auto_1->benoetigter_kraftstoff = "Diesel";

// und nun wird das erste mal die Methode (Funktion)
// tankdeckel_oeffnen aufgerufen und das Auto sagt
// freudig, was es für Sprit benötigt
// $auto_1->tankdeckel_oeffnen();
?>
