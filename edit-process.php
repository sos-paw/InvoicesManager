
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
	$KWOTA=$_POST["KWOTA"];
}

if(empty($NR_FAKTURY) ||  empty($KWOTA) ){
	echo "Wypelnij wszystkie pola";
}
else{
$connection = new mysqli("localhost","id16021319_root","-lmx]+M=7-7cSlB{","id16021319_faktury") or die ("Blad");

 $odp = $connection->query("UPDATE faktury set NR_FAKTURY='$NR_FAKTURY',KWOTA='$KWOTA' WHERE NR_FAKTURY='$NR_FAKTURY'" );

 //if($odp){
 //echo "<script>window.location.href='navi.php';</script>";

// }else{
// echo "Nie udalo sie edytowac";
// }
if($odp){
 echo "<script>window.location.href='navi1.php';</script>";

 }else{
 echo "Nie udalo sie edytowac";
 }
 
 
 
 
 
 
 
 
 
 
 

 
 
 $connection->close();
}
 






?>
<table cellpadding=2 border=1>
<form method="POST" action="edit-process.php">
<tr><td>WPISZ NR_FAKTURY KTOREJ KWOTE CHCESZ ZMIENIC:</td><td><input name="NR_FAKTURY" type="text" <?php  echo 'value="' . $_GET['NR_FAKTURY'] . '"';  ?>></td></tr>
<tr><td>NOWA KWOTA:</td><td><input name="KWOTA" type="number" step="0.01" ></td></tr>




<tr><td colspan="2"><input id="guzik" type="submit" value="Zapisz"></td></tr>
</table>
<br>
<br>
<br>

<button onclick="location.href='show.php'" type="button">wyswietl faktury</button>
</body>
</html>


