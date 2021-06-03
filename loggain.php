<?php
Include_once "header.php";
require_once "databas.php";
session_start();

/*
Inloggning 
*/

// Enter kommer från type hidden input fältet
if(isset($_POST['enter']) && $_POST['enter'] == 1) {
    $_POST['enter'] = 0;
    
    //Hämta in användarnamn och lösenord från formuläret
    //Htmlenteties ser till att inga konstiga tecken
    //kommer med och är en säkerhetsåtgärd
    $username = htmlentities ($_POST['user_name']);
    $pwd = htmlentities ($_POST['password']);
    $kryp = hash("sha256", $pwd);
    $userType = htmlentities($_POST['type']);

    // Kod för att hämta det lagrade användarnamnet & lösenord i db och kolla
    // det mot användarnamet & lösenordet som skrivs in i formuläret
    $sqlPass = "SELECT * FROM users WHERE username = '$username' AND pwd = '$kryp' AND type='$userType';";
    $res = mysqli_query($link, $sqlPass);
    
    while($row = mysqli_fetch_assoc($res)) {
    $_SESSION['user'] =  $row['username'];
    $_SESSION['role'] =  $row['type'];   
    }
 

    if(mysqli_num_rows($res) == 1 && $_SESSION['role'] == "Admin3"){
        // När session är satt och man är inloggad blir man skickad till en viss sida
        header("Location: admin.php");
    } 
    else if(mysqli_num_rows($res) == 1 && $_SESSION['role'] == "Admin2") {
        echo " du är inloggad som lärare";
        header("Location: admin.php");
    } 
    else if(mysqli_num_rows($res) == 1 && $_SESSION['role'] == "Admin") {
        echo "du är inloggad som elev";
        header("Location: admin.php");
    }
    else {
        echo "<h2>Fel inloggningsuppgifter</h2>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Inloggingssidan</title>
</head>
    <body>
        <div class="main">
            <h1>Inloggning</h1>
            <form action="" method="POST">
                <input type="text" name="user_name" placeholder="Användarnamn">
                <input type="password" name="password" placeholder="Lösenord">

                <label for="type">Välj en roll för inloggning </label>
                <select name="type">
                    <option value="Admin3">Admin3</option>
                    <option value="Admin2">Admin2</option>
                    <option value="Admin">Admin</option>
                </select>

                <input type="submit" name="login" value="Logga in">
                <input type="hidden" name="enter" value="1">
            </form>
        </div>
    </body>
</html>

<?php
}
?>

