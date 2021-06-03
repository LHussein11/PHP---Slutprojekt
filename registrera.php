<?php
include_once "databas.php";
if(isset($_POST['submit'])) {
    mysqli_query($link, "INSERT INTO aktiviteter(datum, aktivitet)
    VALUES('$_POST[datum]', '$_POST[aktivitet]')");
}

  header("Location: admin.php?=signup=success");