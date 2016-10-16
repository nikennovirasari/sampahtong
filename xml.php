<?php

require("proses/dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$query = "SELECT * FROM cabang ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML($row['nama_cabang']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['long'] . '" ';
  echo 'img="' . parseToXML($row['gambar']) . '" ';
  // echo"<img src=$hasil[gambar] width=100 height=100>";
  echo '/>';
}

// End XML file
echo '</markers>';
?>
