<?php

session_start();

include 'db.php';

$nameId = $_GET["id"];

// get name from the database
$name = $mysql->query(
    "SELECT * FROM `name` WHERE `name_id` = $nameId"
);

$name = $name->fetch_assoc();

if (isset($_POST["edit-sent"])) {
    
    $nameName = $_POST["name"];
    $nameTranslate = $_POST["name_translate"];
    $nameDesc = $_POST["name_desc"];
    $nameCat1 = $_POST["name_cat_1"];
    $nameCat2 = $_POST["name_cat_2"];
    $nameCat3 = $_POST["name_cat_3"];
    $nameCat4 = $_POST["name_cat_4"];
    $nameCat5 = $_POST["name_cat_5"];
    $nameCat6 = $_POST["name_cat_6"];
    $nameCat7 = $_POST["name_cat_7"];
    $nameCat8 = $_POST["name_cat_8"];

    $update = $mysql->query(
        "UPDATE `name`
        SET `name_name` = '$nameName', `name_translate` = '$nameTranslate', `name_desc` = '$nameDesc',
        `name_cat_1` = '$nameCat1', `name_cat_2` = '$nameCat2', `name_cat_3` = '$nameCat3', `name_cat_4` = '$nameCat4',
        `name_cat_5` = '$nameCat5', `name_cat_6` = '$nameCat6', `name_cat_7` = '$nameCat7', `name_cat_8` = '$nameCat8'
        WHERE `name_id` = $nameId"
    );
    
    header('Location: ./'); exit;
}


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

            <a href="./">Назад</a>

            <br>
            <br>

            <form method="POST" id="edit-user">
                <label>Редактирование</label>
                <br>
                <input type="text" name="name" value="<?php echo $name["name_name"]; ?>" placeholder="<?php echo $name["name_name"]; ?>" tabindex="1">
                <input class="w100" type="text" name="name_translate" value="<?php echo $name["name_translate"]; ?>" placeholder="<?php echo $name["name_translate"]; ?>" tabindex="2">
                <br>
                <textarea class="w100" name="name_desc" form="edit-user" tabindex="3" value="<?php echo $name["name_desc"]; ?>"><?php echo $name["name_desc"]; ?></textarea>
                <br>
                <div class="cat form-cats" style="display: flex;">
                    <div>
                        <label>МИЛОС.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_1" value="<?php echo $name["name_cat_1"]; ?>" tabindex="4">
                    </div>
                    <div>
                        <label>ОБЩИТ.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_2" value="<?php echo $name["name_cat_2"]; ?>" tabindex="5">
                    </div>
                    <div>
                        <label>ТРУД.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_3" value="<?php echo $name["name_cat_3"]; ?>" tabindex="6">
                    </div>
                    <div>
                        <label>АМБИЦ.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_4" value="<?php echo $name["name_cat_4"]; ?>" tabindex="7">
                    </div>
                    <div>
                        <label>КРЕАТ.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_5" value="<?php echo $name["name_cat_5"]; ?>" tabindex="8">
                    </div>
                    <div>
                        <label>ОРГАНИЗ.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_6" value="<?php echo $name["name_cat_6"]; ?>" tabindex="9">
                    </div>
                    <div>
                        <label>ЭНЕРГИЧ.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_7" value="<?php echo $name["name_cat_7"]; ?>" tabindex="10">
                    </div>
                    <div>
                        <label>ЛЮБОЗН.</label>
                        <br>
                        <input type="number" max="1" min="0" name="name_cat_8" value="<?php echo $name["name_cat_8"]; ?>" tabindex="11">
                    </div>
                </div>
                <br>
                <br>
                <input style="width: 150px; background: black; color: white" type="submit" name="edit-sent">
            </form>
        </div>
    <?php } else { header('Location: ./'); exit; } ?>

    <!-- scripts -->
    <script src="./js/selection-form.js"></script>
</body>

</html>