<?php
//print.php
//parseCSV
//saveXML
//printXML in table
require_once('world_data_parser.php');
$my_wdp = new WorldDataParser;
$parsed = $my_wdp->parseCSV("test.csv");
$bool = $my_wdp->saveXML($parsed);
if ($bool){
  $tbody = $my_wdp->printXML("world_data.xml", "style.xsl");
  echo $tbody;
  $dom = new DOMDocument('1.0', 'UTF-8');
  libxml_use_internal_errors(true);
  $dom -> loadHTMLFile("./index.html");
  libxml_clear_errors();
  $tbody_fragment = $dom->createDocumentFragment();
  $tbody_fragment -> appendXml($tbody);
  $table = $dom->getElementsByTagName('table')[0];
  $old_tbody = $dom -> getElementById("table_body");
  $table->appendChild($tbody_fragment);
  #print($dom->saveHTML());
}

?>
