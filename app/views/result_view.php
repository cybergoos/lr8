<?php
$url = "http://localhost/nnn/mvc/";
$userCategories = array();
$categoriesImage = [
    "1" => "images/categories/mercy.png",
    "2" => "images/categories/sociability.png",
    "3" => "images/categories/industriousness.png",
    "4" => "images/categories/ambition.png",
    "5" => "images/categories/creativity.png",
    "6" => "images/categories/organization.png",
    "7" => "images/categories/energy.png",
    "8" => "images/categories/curiosity.png"
];

$result100 = $data["result100"];
$result75 = $data["result75"];
$result50 = $data["result50"];

?>
<div class="result__wrapper">

    <div class="result__selected-categories">
        <?php
        for ($i = 1; $i <= 8; $i++) {
            $userCategories[$i] = $_SESSION["cat$i"];

            if ($userCategories[$i] == 1)
            {
            ?>
                <img src="<?php echo $url.$categoriesImage[$i] ?>">
            <?php
            }
        }
        ?>
    </div>

    <div class="content__spacer"></div>

    <div class="result__names">
        <?php
        foreach ($result100 as $row)
        {
            if (isset($_COOKIE[$row["name_name"]])) {
                echo '<div class="result__names--name w100 favorite">';
            } else {
                echo '<div class="result__names--name w100">';
            }
            ?>
                <span class="name__name">
                    <?php echo $row['name_name'] ?>
                </span>
                <div class="name__icon-box">
                    <div id="result-name-icon" class="name__icon" data-set="<?php echo $row['name_name']?>">
                        <img class="checked-icon" src=".././images/icons/favorites_checked_icon.svg">
                        <img class="favorites-icon" src=".././images/icons/favorites_icon.svg">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        foreach ($result75 as $row)
        {
            if (isset($_COOKIE[$row["name_name"]])) {
                echo '<div class="result__names--name w75 favorite">';
            } else {
                echo '<div class="result__names--name w75">';
            }
            ?>
                <span class="name__name">
                    <?php echo $row['name_name'] ?>
                </span>
                <div class="name__icon-box">
                    <div id="result-name-icon" class="name__icon" data-set="<?php echo $row['name_name']?>">
                        <img class="checked-icon" src=".././images/icons/favorites_checked_icon.svg">
                        <img class="favorites-icon" src=".././images/icons/favorites_icon.svg">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        foreach ($result50 as $row)
        {
            if (isset($_COOKIE[$row["name_name"]])) {
                echo '<div class="result__names--name w50 favorite">';
            } else {
                echo '<div class="result__names--name w50">';
            }
            ?>
                <span class="name__name">
                    <?php echo $row['name_name'] ?>
                </span>
                <div class="name__icon-box">
                    <div id="result-name-icon" class="name__icon" data-set="<?php echo $row['name_name']?>">
                        <img class="checked-icon" src=".././images/icons/favorites_checked_icon.svg">
                        <img class="favorites-icon" src=".././images/icons/favorites_icon.svg">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    
    <script>
        resultNames = document.querySelectorAll(".result__names--name");
        resultAddFavorite();
    </script>
</div>