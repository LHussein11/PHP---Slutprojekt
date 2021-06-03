<?php
include_once "databas.php";
$id = $_GET['id'];

$datum = "";
$aktivitet = "";

$upp = mysqli_query($link, "SELECT * FROM aktiviteter WHERE id = '$id'");
while($row = mysqli_fetch_array($upp)) {
    $datum = $row['datum'];
    $aktivitet = $row['aktivitet'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Uppdatera Page</title>
</head>
<body>
<div class="main">
    <h2>Uppdatera aktiviteter</h2>
    <form action="" method="POST">
        <input type="date" name="datum" placeholder="Datum" value="<?php echo $datum; ?>">
        <input type="text" name="aktivitet" placeholder="Aktivitet" value="<?php echo $aktivitet; ?>">
        <button type="submit" name="uppdatera">Uppdatera</button>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST["uppdatera"])) {
    mysqli_query($link, "UPDATE aktiviteter SET datum='$_POST[datum]', aktivitet='$_POST[aktivitet]' WHERE id='$id'");
}

?> 