
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

body
{ font-size: 24px;font-family: Verdana,Geneva,sans-serif;  }
button{
	width:450px;
	height:150px;
	font-size:28px;
}
#guzik{
	width:450px;
	height:50px;
}
input{
	width:350px;
	height:50px;
	font-size:22px;
}


</style>
</head>

<body>

<?php
ob_start();

if(isset($_POST["NR_FAKTURY"])){
	$NR_FAKTURY=$_POST["NR_FAKTURY"];
	$NAZWA=$_POST["NAZWA"];
	$DATA_WYSTAWIENIA=$_POST["DATA_WYSTAWIENIA"];
	$TERMIN_ZAPLATY=$_POST["TERMIN_ZAPLATY"];
	$KWOTA=$_POST["KWOTA"];
}

if(empty($NR_FAKTURY) || empty($NAZWA) || empty($DATA_WYSTAWIENIA) || empty($TERMIN_ZAPLATY) || empty($KWOTA) ){
	echo "Wypelnij wszystkie pola";
}
else{
$connection = new mysqli("localhost","id16021319_root","-lmx]+M=7-7cSlB{","id16021319_faktury") or die ("Blad");

 $odp = $connection->query("insert into faktury(NR_FAKTURY,NAZWA,DATA_WYSTAWIENIA,TERMIN_ZAPLATY,KWOTA) values('$NR_FAKTURY','$NAZWA','$DATA_WYSTAWIENIA','$TERMIN_ZAPLATY','$KWOTA')");

 if($odp){
 echo "<script>window.location.href='navi.php';</script>";

 }else{
 echo "Nie udalo sie dodac";
 }

 $connection->close();
}
 






?>
<table cellpadding=2 border=1>
<form method="POST" action="index.php">
<tr><td>NR_FAKTURY:</td><td><input name="NR_FAKTURY" type="text"></td></tr>
<tr><td>NAZWA:</td><td><input name="NAZWA" type="text"></td></tr>
<tr><td>DATA_WYSTAWIENIA:</td><td><input name="DATA_WYSTAWIENIA" type="date"></td></tr>
<tr><td>TERMIN_ZAPLATY:</td><td><input name="TERMIN_ZAPLATY" type="date"></td></tr>
<tr><td>KWOTA:</td><td><input name="KWOTA" type="number" step="0.01"></td></tr>




<tr><td colspan="2"><input id="guzik" type="submit" value="Zapisz"></td></tr>
</table>
<br>
<br>
<br>

<button onclick="location.href='show.php'" type="button">wyswietl faktury</button>
</body>
</html>


