<div class="container">
    <div class="content-box">

        <div class="header">
            <div class="header__back-btn btn-rnd">
                <div class="btn-icon">
                    <img class="back-icon" src=".././images/icons/back_icon.svg">
                    <img class="home-icon" src=".././images/icons/home_icon.svg">
                </div>
            </div>
            <span class="header__text">
                Шаг 1: Выберете пол
            </span>
            <a class="header__next-btn btn-df disable">
                <span>Далее</span>
                <div class="btn-icon">
                    <img class="next-icon" src=".././images/icons/next_icon.svg">
                    <img class="favorites-icon" src=".././images/icons/favorites_icon.svg">
                    <img class="restart-icon" src=".././images/icons/restart_icon.svg">
                </div>
            </a>
        </div>

        <div id="content" class="content">
            <div class="content__spacer"></div>

            <div id="step-place" class="step__place gender">
                <!-- 1 -->
                <div id="gender" class="step">

                    <form id="gender-form" class="gender-form">
                        <input type="hidden" name="gender-sended">
                        
                        <div class="gender__select">

                            <div class="custom__checkbox" data-name="2">
                                <div class="custom__checkbox--image girl">
                                    <img class="custom__checkbox--image__front" src=".././images/girl.png">
                                    <img class="custom__checkbox--image__back" src=".././images/girl.png">
                                </div>
                                <span>Девочка</span>
                            </div>

                            <div class="custom__checkbox" data-name="1">
                            <div class="custom__checkbox--image boy">
                                    <img class="custom__checkbox--image__front" src=".././images/boy.png">
                                    <img class="custom__checkbox--image__back" src=".././images/boy.png">
                                </div>
                                <span>Мальчик</span>
                            </div>

                        </div>

                        <input class="gender__checkbox" type="checkbox" name="girl" value="girl">
                        <input class="gender__checkbox" type="checkbox" name="boy" value="boy">
                    </form>

                </div>
                <!-- 2 -->
                <div id="categories" class="step">

                    <form id="categories-form" class="categories-form">
                        <input type="hidden" name="categories-sended">

                        <!-- categories -->
                        <div class="categories-form__wrapper">
                            <div class="categories-form__col">

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat1" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/mercy.png" class="category__image--front">
                                            <img src=".././images/categories/mercy.png" class="category__image--back">
                                        </div>
                                        <span>Милосердие</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat2" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/sociability.png" class="category__image--front">
                                            <img src=".././images/categories/sociability.png" class="category__image--back">
                                        </div>
                                        <span>Общительность</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat3" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/industriousness.png" class="category__image--front">
                                            <img src=".././images/categories/industriousness.png" class="category__image--back">
                                        </div>
                                        <span>Трудолюбие</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat4" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/ambition.png" class="category__image--front">
                                            <img src=".././images/categories/ambition.png" class="category__image--back">
                                        </div>
                                        <span>Амбициозность</span>
                                    </label>
                                </div>

                            </div>

                            <div class="categories-form__col">

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat5" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/creativity.png" class="category__image--front">
                                            <img src=".././images/categories/creativity.png" class="category__image--back">
                                        </div>
                                        <span>Креативность</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat6" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/organization.png" class="category__image--front">
                                            <img src=".././images/categories/organization.png" class="category__image--back">
                                        </div>
                                        <span>Организованность</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat7" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/energy.png" class="category__image--front">
                                            <img src=".././images/categories/energy.png" class="category__image--back">
                                        </div>
                                        <span>Энергичность</span>
                                    </label>
                                </div>

                                <div class="categories-form__category">
                                    <label>
                                        <input class="category__checkbox" type="checkbox" name="cat8" value="1">
                                        <div class="category__image">
                                            <img src=".././images/categories/curiosity.png" class="category__image--front">
                                            <img src=".././images/categories/curiosity.png" class="category__image--back">
                                        </div>
                                        <span>Любознательность</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <!-- preloader -->
                <div id="preloader" class="step">
                </div>
                <!-- 3 -->
                <div id="result" class="step">

                    <?php ?>

                </div>
                <!-- 4 -->
                <div id="favorites" class="step">

                    <?php ?>

                </div>
            </div>
            
            <div class="content__spacer"></div>
        </div>

    </div>
</div>