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

?>
<div class="favorites_wrapper result__wrapper">

    <div class="favorites__names">
        <?php

        if ($data) {
            foreach ($data as $row)
            {
                ?>
                <div class="favorites__names--name favorite">
                    <span class="name__name">
                        <?php echo $row['name_name'] ?>
                    </span>
                    <div class="name__categories">
                        <?php
                        for ($i = 1; $i <= 8; $i++) {
                            if ($row["name_cat_$i"] == 1)
                            {
                            ?>
                                <img src="<?php echo $url.$categoriesImage[$i] ?>">
                            <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="name__icon-box">
                        <div id="favorite-name-icon" class="name__icon" data-set="<?php echo $row['name_name']?>">
                            <img class="checked-icon" src=".././images/icons/favorites_checked_icon.svg">
                            <img class="favorites-icon" src=".././images/icons/favorites_icon.svg">
                        </div>
                    </div>
                </div>
                <?php
            }       
        } else {
            ?>
                <div class="favorites__names--empty">
                    <span class="empty__text">
                        Вы пока не выбрали<br>ни одного имени
                    </span>
                </div>
            <?php
        }
        ?>
    </div>

    <script>
        favoriteNames = document.querySelectorAll(".favorites__names--name");
        favoritesAddFavorite();
    </script>
</div>