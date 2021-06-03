<?php
include_once "header.php";
include_once "databas.php";
?>

<?php
session_start();
//Kolla om man är Inloggad och vilken roll man har
if(isset($_SESSION['user']) && $_SESSION['role'] == "Admin3"){
    echo "<p>Inloggad som: " .$_SESSION['user']. "</p>";
    admin3();
} else if(isset($_SESSION['user']) && $_SESSION['role'] == "Admin2") {
    echo "<p>Inloggad som: " .$_SESSION['user']. "</p>";
    admin2();

} else if(isset($_SESSION['user']) && $_SESSION['role'] == "Admin") {
    echo "<p>Inloggad som: " .$_SESSION['user']. "</p>";
    admin();

}
else {
    echo "<p>Du har ej behörighet, logga in!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
</head>
<body>
<?php 
function admin3(){
    global $link;
   echo "<div class='main'>
        <h2>Registera aktiviteter</h2>
        <form action='registrera.php' method='POST'>
            <input type='date' name='datum' placeholder='Datum'>
            <input type=.text' name='aktivitet' placeholder='Aktivitet'>
            <button type='submit' name='submit'>Skicka</button>
        </form>
        </div>"
?>
<?php
        echo "<div class='table-container'>
            <p>Kommande aktiviteter</p>
            <table>
                <tr>
                    <th>Datum</th>
                    <th>Aktivitet</th>
                    <th>Uppdatera</th>
                    <th>Radera</th>
                </tr>";
                $show = mysqli_query($link, 'SELECT * FROM aktiviteter ORDER BY datum DESC');
                while($row = mysqli_fetch_assoc($show)) 
                {
                    echo "<tr>";
                        echo "<td>".$row['datum']."</td>";
                        echo "<td>".$row['aktivitet']."</td>";
                        echo "<td>"?><a href="uppdatera.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-up">Uppdatera</button></a> <?php "</td>";
                        echo "<td>"?><a href="radera.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-del">Radera</button></a> <?php "</td>";
                    echo "<tr>";
                }
        echo "</table>";
        echo "</div>";
            }

?>


</body>


<?php
// Admin 2

function admin2() {
        global $link;
        echo "<div class='main'>
        <h2>Registera aktiviteter</h2>
        <form action='registrera.php' method='POST'>
            <input type='date' name='datum' placeholder='Datum'>
            <input type=.text' name='aktivitet' placeholder='Aktivitet'>
            <button type='submit' name='submit'>Skicka</button>
        </form>
        </div>";

        echo "<div class='table-container'>
            <p>Kommande aktiviteter</p>
            <table>
                <tr>
                    <th>Datum</th>
                    <th>Aktivitet</th>
                </tr>";
                $show = mysqli_query($link, 'SELECT * FROM aktiviteter ORDER BY datum DESC');
                while($row = mysqli_fetch_assoc($show)) 
                {
                    echo "<tr>";
                        echo "<td>".$row['datum']."</td>";
                        echo "<td>".$row['aktivitet']."</td>";
                    echo "<tr>";
                }
        echo "</table>";
        echo "</div>";
}

?>

<?php 
// Admin 3
function admin() {
        global $link;
        echo "<div class='table-container'>
            <p>Aktiviteter</p>
            <table>
                <tr>
                    <th>Datum</th>
                    <th>Aktivitet</th>
                </tr>";
                $show = mysqli_query($link, 'SELECT * FROM aktiviteter ORDER BY datum DESC');
                while($row = mysqli_fetch_assoc($show)) 
                {
                    echo "<tr>";
                        echo "<td>".$row['datum']."</td>";
                        echo "<td>".$row['aktivitet']."</td>";
                    echo "<tr>";
                }
        echo "</table>";
        echo "</div>";
}

?>


<?php
include "footer.php";
?>