<?php
include_once "databas.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Index Page</title>
</head>
<body>
<?php include 'header.php'; ?>

    <main>
        <div class="big-image">
            <p>Välkommen till Panther Muay Thai</p>
        </div>
<?php
        echo "<div class='table-container'>
            <p>Kommande aktiviteter</p>
            <table>
                <tr>
                    <th>Datum</th>
                    <th>Aktivitet</th>
                </tr>";
                $show = mysqli_query($link, 'SELECT * FROM aktiviteter WHERE datum >= CURRENT_DATE ORDER BY datum ASC LIMIT 5');
                while($row = mysqli_fetch_assoc($show)) 
                {
                    echo "<tr>";
                        echo "<td>".$row['datum']."</td>";
                        echo "<td>".$row['aktivitet']."</td>";
                    echo "<tr>";
                }
           echo "</table>";
        echo "</div>";
   echo "</main>";
?>

<?php
include "footer.php";
?>
</body>
</html>

