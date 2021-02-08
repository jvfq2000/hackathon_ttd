<?php
require("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$sql_sensores = "SELECT * FROM sensor";
$resultado_sensores = mysqli_query($conn, $sql_sensores);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<sensores>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_sensores)){
  // Add to XML document node
  echo '<sensor ';
  echo 'descricao="'.parseToXML($row_markers['descricao']).'" ';
  echo 'endereco="'.parseToXML($row_markers['endereco']).'" ';
  echo 'lat="'.$row_markers['lat'].'" ';
  echo 'lng="'.$row_markers['lng'].'" ';
  echo 'nivel_son="'.$row_markers['nivel_son'].'" ';
  echo '/>';
}

// End XML file
echo '</sensores>';



