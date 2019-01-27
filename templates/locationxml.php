<?php
//print_r($data);
$sites = $data['sites'];
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
//header("Content-type: text/xml");// Iterate through the rows, adding XML nodes for each

foreach ($sites as $site) {
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$site['id']);
  $newnode->setAttribute("nombre",$site['name']);
  $newnode->setAttribute("alias",$site['alias']);
  $newnode->setAttribute("header",$site['header']);
  $newnode->setAttribute("direccion",$site['address']);
  $newnode->setAttribute("lat",$site['lat']);
  $newnode->setAttribute("lng",$site['lng']);
  $newnode->setAttribute("categoria",$site['category']);
  $newnode->setAttribute("icono","icon-".$site['icon']);
  $newnode->setAttribute("horario",$site['schedule']);
}

echo $dom->saveXML();

?>