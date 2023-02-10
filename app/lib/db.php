<?php
class DB
{
    public function query($sql)
    {
        $db = new mysqli('localhost', 'root', '', 'chi_db');

        mysqli_set_charset($db, 'utf8');

        $result = $db->query($sql);

        return $result;
    }
}
?>