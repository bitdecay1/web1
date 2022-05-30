<?php
require 'connection.php';

$pdostatement = $pdo->prepare("DELETE FROM web1 WHERE id=".$_GET['id']);
$pdostatement->execute();

header("Location: index.php");
