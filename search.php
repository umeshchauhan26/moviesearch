<?php 
include 'common_functions.php';
## GET FORM INPUTS
$plot=trim($_GET["plot"]); 
$title=trim($_GET["title"]); 
$director=trim($_GET["director"]);
$genre_array=$_GET["genre"];
$genre_array_deli = explode(',', $genre_array);

### CHECKING WHICH ALL FORM ELEMENTS ARE SELECTED
$t=0;$d=0;$g=0;$p=0;
$query="select poster,title,year,director,genre from movie_details";
for($i=0;$i<count($genre_array_deli);$i++)
	{
		$str=$genre_array_deli[$i];
		if ( $str != "")
		{
		$g=1;
		}
	}
if ( $title != "")
{
$t=1;
$query=$query." where ( title like '%".$title."%')";
}
else
{
}
if ( $plot != "")
{
$p=1;
	if ( $title != "" )
	{
		$query=$query." and ( plot like '%".$plot."%')";
	}
	else
	{
		$query=$query." where ( plot like '%".$plot."%')";
	}
}
else
{

}
if ( $director != "")
{
	$d=1;
	if( $title != "" ||  $plot != "")
	{
		$query=$query." and ( director like '%".$director."%')";
	}
	else
	{
		$query=$query." where ( director like '%".$director."%')";
	}
}
if ( $g == 1 )
{
	if( $title != "" ||  $plot != "" || $director != "" )
	{
		$query=$query." and ( ";
		for($i=0;$i<count($genre_array_deli);$i++)
		{
			$str=$genre_array_deli[$i];
			if ($i == (count($genre_array_deli)-1))
			{
				$query=$query." genre like '%".$str."%' ";
			}
			else
			{
				$query=$query." genre like '%".$str."%' or ";
			}
		}
		$query=$query.") ";
	}
	else
	{
		$query=$query." where ( ";
		for($i=0;$i<count($genre_array_deli);$i++)
		{
			$str=$genre_array_deli[$i];
			if ($i == (count($genre_array_deli)-1))
			{
				$query=$query." genre like '%".$str."%' ";
			}
			else
			{
				$query=$query." genre like '%".$str."%' or ";
			}
		}
		$query=$query.") ";
	}
	
}

## DB CONNECTION
$filestr=fileread();
list($user, $pass, $dbhost, $db) = explode("|", $filestr);
$conn=DB_connect(trim($dbhost),trim($user),trim($pass),trim($db));

## EXECUTION OF QUERY
$result = mysql_query($query,$conn)
  or die(mysql_error());
$display="<div style='height: 900px;overflow: scroll;width: 1200px;'><table style='width:1200px;' border=1><th>Poster</th><th>Title</th><th>Year</th><th>Director</th><th>Genre</th>";
  while($row = mysql_fetch_array( $result ))
  {
          $poster=$row['poster'];
          $title=$row['title'];
          $year=$row['year'];
          $director=$row['director'];
		  $genre=$row['genre'];
			  $display=$display."<tr><td><img src='".$poster."' height=100 width=100></td><td><font color='white'>".$title."</td><td><font color='white'>".$year."</td><td><font color='white'>$director</td><td><font color='white'>$genre</td></font></tr>";
	  }
  echo $display;
  
?>
