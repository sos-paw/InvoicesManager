<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
button{
	width:450px;
	height:150px;
	font-size:28px;
}
</style>
</head>
<body>
<?php
$conn = new mysqli("localhost","id16021319_root","-lmx]+M=7-7cSlB{","id16021319_faktury");
$sql = "DELETE FROM faktury WHERE NR_FAKTURY='" . $_GET["NR_FAKTURY"] . "'";
if (mysqli_query($conn, $sql)) {

    echo "<h1>Faktura usunieta pomyslnie co chcesz teraz zrobic</h1>";?>
    <br><button onclick="location.href='index.php'" type="button">dodaj faktury   </button>
    <button onclick="location.href='show.php'" type="button"> wyswietl faktury</button>
<?php
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$conn->close();
?>

</body>
</html>
