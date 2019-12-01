<?php
//print.php
//parseCSV
//saveXML
//printXML in table

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

require_once('world_data_parser.php');
$my_wdp = new WorldDataParser;
$table = $my_wdp->parseCSV("test.csv");
$bool = $my_wdp->saveXML($table);
if ($bool){
  $tbodycontent = $my_wdp->printXML("world_data.xml", "style.xsl");
  $dom = new DOMDocument('1.0', 'UTF-8');
  header("Location: index.html");  //damit loadHTMLFile die Datei findet
  $dom->loadHTMLFile("./index.html");
  $xpath = new DOMXPath($dom);
  $tbody = $xpath -> query("//tbody@id='table_body'");
  console_log($tbody);
  $tbody[0]->appendChild($dom->createElement($tbodycontent));
  $dom -> saveHTML('index_2.html');
  //header("Location: index_2.html");
}

?>
