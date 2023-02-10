<?php

// data base connection
$mysql = new mysqli('localhost', 'root', '', 'chi_db');

// support for russian characters
mysqli_set_charset($mysql, 'utf8');

?>