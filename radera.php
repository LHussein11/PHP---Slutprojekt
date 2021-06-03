<?php
include_once "databas.php";

$id = $_GET['id'];
mysqli_query($link, "DELETE FROM aktiviteter WHERE id='$id'");

header("Location: admin.php?=signup=success");
?>