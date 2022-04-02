<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
tr:hover
{
    background: #69bd57;
}
#dni{text-align: center;}
#button{
	width:250px;
	height:80px;
	font-size:28px;
}
#button2{
	width:100px;
	height:25px;
}
body{
	
font-family: Verdana,Geneva,sans-serif; 
    font-size:18px;
}

</style>


</head>

<body>



<button id="button" onclick="location.href='index.php'" type="button">dodaj faktury</button><br><br>

<?php
$data=date("Y-m-d");

echo "Dzisiaj jest $data<br><br>";

 $connection = new mysqli("localhost","id16021319_root","-lmx]+M=7-7cSlB{","id16021319_faktury") or die ("Blad");

 $wynik = $connection->query("SELECT NR_FAKTURY,NAZWA,DATA_WYSTAWIENIA,TERMIN_ZAPLATY,KWOTA,datediff(TERMIN_ZAPLATY, curdate()) AS ILE_DNI FROM faktury ORDER BY `ILE_DNI` ASC");

 
    echo "<table cellpadding=2 border=1>";
    echo "<tr>";
    echo "<th bgcolor='#b6dffc'>NR_FAKTURY</th>";
    echo "<th bgcolor='#b6dffc'>NAZWA</th>";
    echo "<th bgcolor='#b6dffc'>DATA_WYSTAWIENIA</th>";
    echo "<th bgcolor='#b6dffc'>TERMIN_ZAPLATY</th>";
    echo "<th bgcolor='#b6dffc'>KWOTA</th>";
    echo "<th bgcolor='#b6dffc'>DNI DO KONCA</th>";
    echo "</tr>";
    $style = '';
    while($r = $wynik->fetch_assoc()) {

    
        echo "<tr>";
        echo "<td>".$r["NR_FAKTURY"]."</td>";
        echo "<td>".$r["NAZWA"]."</td>";
        echo "<td>".$r["DATA_WYSTAWIENIA"]."</td>";
        echo "<td>".$r["TERMIN_ZAPLATY"]."</td>";
        echo "<td>".$r["KWOTA"]."</td>";
        if($r['ILE_DNI'] < -10){$style = "bgcolor='#ff4747'";}
        if($r['ILE_DNI'] < 0 && $r['ILE_DNI'] > -10){$style = "bgcolor='#ff7a7a'";}
        if($r['ILE_DNI'] > 0 && $r['ILE_DNI'] < 7){$style = "bgcolor='#e8ff69'";}
        if($r['ILE_DNI'] > 7){$style = "bgcolor='#a5ff99'";}
        echo "<td style='font-size:22px;' align='center'" .$style.">".$r["ILE_DNI"]."</td>";
        ?>
  
        <td><a href='delete-process.php?NR_FAKTURY=<?php echo $r["NR_FAKTURY"]; ?>'><button id="button2">Usun</button></a></td>
		
        <td><a href='edit-process.php?NR_FAKTURY=<?php echo $r["NR_FAKTURY"]; ?>'><button id="button2">Edytuj</button></a></td>
  <?php
        echo "</tr>";
    }
    echo "</table>";



 /*echo "<pre>";

 print_r($wynik);

 echo "</pre>";*/



 $connection->close();


 ?>





</body>
</html>


