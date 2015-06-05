
<html >
<head>
<style>
body {background-color:CCFF99}
h1   {color:blue;}
th   {color:blue;background-color:lightgrey}
</style>

<center><h1>Search Movies By Movie Name, Director,Plot etc.</h1> *You can search by entering keywords<br><br>

<script type="text/javascript">
   function submitForm()
   {
	var xmlhttp;
	var checkboxes = document.getElementsByName('genre[]');
	var vals = "";
	for (var i=0, n=checkboxes.length;i<n;i++) {
	if (checkboxes[i].checked) 
	{
		vals += ","+checkboxes[i].value;
	}
	}
	
	if (vals) vals = vals.substring(1);

     var plot_value=document.getElementsByName("plot")[0].value;
	 var title_value=document.getElementsByName("title")[0].value;
	 var director_value=document.getElementsByName("director")[0].value;
	 
	 if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById('text1').innerHTML = xmlhttp.responseText;
         // eventUpdate(xmlhttp.responseText);

        }
      }
      xmlhttp.open("GET","search.php?plot="+plot_value+"&title="+title_value+"&director="+director_value+"&genre="+vals, true);
      xmlhttp.send();
  }
  

  
  </script>
  </head>
  <body>
<form  name='movie' method='GET'>
<fieldset>
<legend>Search Here:</legend>
Enter Plot:<br>
<input type="text" name="plot" value="">
<br>
Enter Movie Title:<br>
<input type="text" name="title" value="">
<br>
Search By Director Name:<br>
<input type="text" name="director" value="">
<br>
<input type="checkbox" name="genre[]" value="Comedy"  /> Comedy
<input type="checkbox" name="genre[]" value="Action"  /> Action
<input type="checkbox" name="genre[]" value="Drama"  /> Drama 
<input type="checkbox" name="genre[]" value="Family"  /> Family 
<input type="checkbox" name="genre[]" value="Sci-Fi"  /> Sci-Fi 
<input type="checkbox" name="genre[]" value="Adventure"  /> Adventure 
<input type="checkbox" name="genre[]" value="Romance"  /> Romance 
<input type="checkbox" name="genre[]" value="Thriller"  /> Thriller 
<input type="checkbox" name="genre[]" value="Fantasy"  /> Fantasy 
 <input type="checkbox" name="genre[]" value="War"  /> War
 <input type="checkbox" name="genre[]" value="Mystery"  /> Mystery
 <input type="checkbox" name="genre[]" value="Crime"  /> Crime
 <input type="checkbox" name="genre[]" value="Film-Noir"  /> Film-Noir
 <input type="checkbox" name="genre[]" value="Western"  /> Western
 <input type="checkbox" name="genre[]" value="Musical"  /> Musical

<br><br>
<button onclick="submitForm();return false;" href="#">Search</button></fieldset>
</form>
<fieldset >
<legend >Search results:</legend>
<div id="text1">
</div>
</fieldset>

	</body>
	</center>

	


  
  
