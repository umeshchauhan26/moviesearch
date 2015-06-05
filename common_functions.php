<?php

function fileread()

{
	$file = fopen("settings.php","r");
	while(! feof($file))
	  {
		  $line=fgets($file);
		  list($key, $value) = explode(":", $line);
		  if ( $key == 'user')
		  {
			$user=$value;
		  }
		  else if ( $key == 'db' )
		  {
			$db=$value;
		  }
		  else if ( $key == 'dbhost' )
		  { 
			$dbhost=$value;
		  }
		  else if ( $key == 'pass' )
		  {  
		   $pass=$value;
		  }
		  else
		  {
		  }
	}
	fclose($file);
	return "$user|$pass|$dbhost|$db";
}
function DB_connect($dbhost,$user,$pass,$db)
{
	//echo "$dbhost,$user,$pass,$db";
	$conn = mysql_connect($dbhost,$user,$pass) or die('Could not connect');
	$db_select = mysql_select_db($db);
	return $conn;
}

?>
