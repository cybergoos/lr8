<?php

session_start();

include 'db.php';

// auth
if (isset($_POST["auth-sent"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // key to decrypt
    $key = "Tbx)QG&RrJX(a_VSesvDB";

    // password decrypt
    $password = md5(md5($password) . $key);

    // get all users from the database
    $users = $mysql->query(
        "SELECT * FROM `user`"
    );

    while ($row = $users->fetch_assoc()) {

        if (($email == $row['user_email']) && ($password == $row['user_password'])) {
            $_SESSION['logged_user'] = $row['user_id'];

            header('Location: ./'); exit;
        }
    
    }
}

$maleNames = $mysql->query(
    "SELECT * FROM `name` WHERE `gender_id`=1 ORDER BY `name_name` ASC"
);

$femaleNames = $mysql->query(
    "SELECT * FROM `name` WHERE `gender_id`=2 ORDER BY `name_name` ASC"
);

$msum1 = $mysql->query(
    "SELECT SUM(name_cat_1) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum2 = $mysql->query(
    "SELECT SUM(name_cat_2) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum3 = $mysql->query(
    "SELECT SUM(name_cat_3) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum4 = $mysql->query(
    "SELECT SUM(name_cat_4) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum5 = $mysql->query(
    "SELECT SUM(name_cat_5) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum6 = $mysql->query(
    "SELECT SUM(name_cat_6) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum7 = $mysql->query(
    "SELECT SUM(name_cat_7) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();
$msum8 = $mysql->query(
    "SELECT SUM(name_cat_8) FROM `name` WHERE `gender_id`=1"
)->fetch_assoc();

$fsum1 = $mysql->query(
    "SELECT SUM(name_cat_1) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum2 = $mysql->query(
    "SELECT SUM(name_cat_2) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum3 = $mysql->query(
    "SELECT SUM(name_cat_3) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum4 = $mysql->query(
    "SELECT SUM(name_cat_4) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum5 = $mysql->query(
    "SELECT SUM(name_cat_5) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum6 = $mysql->query(
    "SELECT SUM(name_cat_6) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum7 = $mysql->query(
    "SELECT SUM(name_cat_7) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();
$fsum8 = $mysql->query(
    "SELECT SUM(name_cat_8) FROM `name` WHERE `gender_id`=2"
)->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- styles -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

    <?php if (isset($_SESSION['logged_user'])) { ?>
        <div class="page-container">

            <a href="./addName.php">Добавить новое имя</a>
            
            <br>
            <br>

            <div class="gender-tabs">
                <a id="male-tab" class="active">Мужские</a>
                <a id="female-tab">Женские</a>
            </div>

            <br>

            <table id="male-table" class="active">
                <tr class="table-header">
                    <th>NAME</th>
                    <th style="width: 100%">TRANSLATE</th>
                    <th>DESCRIPTION</th>
                    <th class="table-header__category">(<?php echo $msum1["SUM(name_cat_1)"] ?>) МИЛОС.</th>
                    <th class="table-header__category">(<?php echo $msum2["SUM(name_cat_2)"] ?>) ОБЩИТ.</th>
                    <th class="table-header__category">(<?php echo $msum3["SUM(name_cat_3)"] ?>) ТРУД.</th>
                    <th class="table-header__category">(<?php echo $msum4["SUM(name_cat_4)"] ?>) АМБИЦ.</th>
                    <th class="table-header__category">(<?php echo $msum5["SUM(name_cat_5)"] ?>) КРЕАТ.</th>
                    <th class="table-header__category">(<?php echo $msum6["SUM(name_cat_6)"] ?>) ОРГАН.</th>
                    <th class="table-header__category">(<?php echo $msum7["SUM(name_cat_7)"] ?>) ЭНЕРГИЧ.</th>
                    <th class="table-header__category">(<?php echo $msum8["SUM(name_cat_8)"] ?>) ЛЮБОЗН.</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>

                <?php
                while ($row = $maleNames->fetch_assoc()) {
                    $nameId = $row['name_id'];
                    
                    echo "<tr>";

                    echo "<td>"; echo $row['name_name']; echo "</td>";
                    echo "<td>"; echo $row['name_translate']; echo "</td>";
                    echo "<td>"; echo $row['name_desc']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_1']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_2']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_3']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_4']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_5']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_6']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_7']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_8']; echo "</td>";

                    echo "<td>"; echo "<a href='./editName.php?id=$nameId'>Edit</a>"; echo "</td>";
                    echo "<td>"; echo "<a href='./deleteName.php?id=$nameId'>Delete</a>"; echo "</td>";

                    echo "</tr>";
                }
                ?>
            </table>
            
            <table id="female-table">
                <tr class="table-header">
                    <th>NAME</th>
                    <th style="width: 100%">TRANSLATE</th>
                    <th>DESCRIPTION</th>
                    <th class="table-header__category">(<?php echo $fsum1["SUM(name_cat_1)"] ?>) МИЛОС.</th>
                    <th class="table-header__category">(<?php echo $fsum2["SUM(name_cat_2)"] ?>) ОБЩИТ.</th>
                    <th class="table-header__category">(<?php echo $fsum3["SUM(name_cat_3)"] ?>) ТРУД.</th>
                    <th class="table-header__category">(<?php echo $fsum4["SUM(name_cat_4)"] ?>) АМБИЦ.</th>
                    <th class="table-header__category">(<?php echo $fsum5["SUM(name_cat_5)"] ?>) КРЕАТ.</th>
                    <th class="table-header__category">(<?php echo $fsum6["SUM(name_cat_6)"] ?>) ОРГАН.</th>
                    <th class="table-header__category">(<?php echo $fsum7["SUM(name_cat_7)"] ?>) ЭНЕРГИЧ.</th>
                    <th class="table-header__category">(<?php echo $fsum8["SUM(name_cat_8)"] ?>) ЛЮБОЗН.</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>

                <?php
                while ($row = $femaleNames->fetch_assoc()) {
                    $nameId = $row['name_id'];
                    
                    echo "<tr>";

                    echo "<td>"; echo $row['name_name']; echo "</td>";
                    echo "<td>"; echo $row['name_translate']; echo "</td>";
                    echo "<td>"; echo $row['name_desc']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_1']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_2']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_3']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_4']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_5']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_6']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_7']; echo "</td>";
                    echo "<td class='name-cat-col'>"; echo $row['name_cat_8']; echo "</td>";

                    echo "<td>"; echo "<a href='./editName.php?id=$nameId'>Edit</a>"; echo "</td>";
                    echo "<td>"; echo "<a href='./deleteName.php?id=$nameId'>Delete</a>"; echo "</td>";

                    echo "</tr>";
                }
                ?>
            </table>

        </div>
    <?php } else { ?>
        <div class="page-container">
            <form method="POST">
                <label>Авторизация<label>
                <br>
                <input type="text" name="email" placeholder="Email">
                <input type="password" maxlength ="20" name="password" placeholder="Password">
                <input type="submit" name="auth-sent">
            </form>
        </div>
    <?php } ?>

    <!-- scripts -->
    <script src="./js/selection-form.js"></script>
    <script>
        const maleTable = document.querySelector("#male-table");
        const femaleTable = document.querySelector("#female-table");
        const maleTab = document.querySelector("#male-tab");
        const femaleTab = document.querySelector("#female-tab");

        maleTab.onclick = function () {
            if (!maleTable.classList.contains("active")) {
                femaleTable.classList.remove("active");
                maleTable.classList.add("active");
                maleTab.classList.add("active");
                femaleTab.classList.remove("active");
            }
        }
        femaleTab.onclick = function () {
            if (!femaleTable.classList.contains("active")) {
                maleTable.classList.remove("active");
                femaleTable.classList.add("active");
                femaleTab.classList.add("active");
                maleTab.classList.remove("active");
            }
        }
    </script>
</body>

</html>