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



  function saveXML(array $data){
    set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });
    try{                            //TODO: implement
      // Create the xml document
      $xmlDoc = new DOMDocument();

      $root = $xmlDoc -> appendChild($xmlDoc ->
                          createElement("Countries"));

      foreach($data as $tabrow) {
        if (!empty($tabrow)) {
          $country = $root -> appendChild($xmlDoc ->
                          createElement('Country'));
          foreach($tabrow as $key => $val) {
            $country -> appendChild($xmlDoc ->
                          createElement(str_replace(' ', '_', trim($key)), trim($val)));
          }
        }
      }
      header("Content-Type: text/plain");

      // Make the output
      $xmlDoc -> formatOutput = true;

      // Save xml file
      $file_name = 'world_data.xml';
		$bool = $xmlDoc -> save($file_name);
		echo $bool;
      if($bool > 0){
		echo "TRUE";
        return TRUE;
      }
	  echo "false";
      return FALSE;
    } catch (ErrorException $e){
      echo '<br />Exception abgefangen: ',  $e->getMessage(), "\n"; //TODO: Entfernen
      return FALSE;
    } finally {
      restore_error_handler();
    }
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
