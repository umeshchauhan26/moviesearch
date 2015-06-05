<?php
## GET FORM INPUTS
$plot=trim($_GET["plot"]); 
$title=trim($_GET["title"]); 
$director=trim($_GET["director"]);
$genre_array=$_GET["genre"];


echo $plot;
echo $title;
echo $director;
echo $genre_array;

?>
