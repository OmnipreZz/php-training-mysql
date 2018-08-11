<?php
require 'connectRandoDB.php';	
$v = $_GET['id'];
$sth = $pdo->prepare("DELETE FROM `hiking` WHERE `id` = $v");
$sth->execute();
$pdo = null;

header('Location: ./read.php');
?>