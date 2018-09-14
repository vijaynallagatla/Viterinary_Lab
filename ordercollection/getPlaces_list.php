<?php

$state=$_REQUEST['state'];
$xml=simplexml_load_file("places.xml") or die("Error: Cannot create object");

$place=$xml->$state[0]->place;
$places="";
for($x=0;$x<sizeof($place);$x++){
	$places .= '<option value="' .$place[$x] . '">' . $place[$x] . '</option>';
}
	//print_r($place);
	echo $places;
?>