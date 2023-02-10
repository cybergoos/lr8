<?php

session_start();

include 'db.php';

$nameId = $_GET["id"];

$delete = $mysql->query(
    "DELETE FROM `name` WHERE `name_id` = $nameId"
);

header('Location: ./'); exit;

?>