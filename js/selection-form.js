const siteUrl = "http://localhost/nnn/mvc/";

if (window.location.href == siteUrl + "select/") {
    window.onload = () => {
        setTimeout(() => {
            document.body.classList.add('loaded');
        }, 4000);
    }
}

const stepPlace = document.getElementById("step-place");
const content = document.getElementById("content");

//// START HEADER
const nextBtn = document.querySelector(".header__next-btn");
const backBtn = document.querySelector(".header__back-btn");
const headerText = document.querySelector(".header__text");
const stepText1 = "Шаг 1: Выберете пол";
const stepText2 = "Шаг 2: Выберете четыре качества";
const preloaderText = "Идёт поиск...";
const preloaderAnimation = '<object id="preloader-animation" type="image/svg+xml" data=".././images/search.svg"><img src=".././images/search.svg"></object>';
const stepText3 = "Шаг 3: Сохраните понравившиеся имена";
const stepText4 = "Избранное";

nextBtn.onclick = function () {
    if (!nextBtn.classList.contains("disable")) {
        if (currentStep == 1) {
            gender.classList.remove("current");
            categories.classList.add("current");
            stepPlace.classList.remove("gender");
            headerText.textContent = stepText2;
            currentStep = 2;
            nextBtn.classList.add("disable");
            allGenders.forEach((d) => {
                d.classList.remove("selected");
                d.checked = false;
            })
        }
        else if (currentStep == 2) {
            categories.classList.remove("current");
            
            // add preloader
            preloader.classList.add("current");
            preloader.innerHTML = preloaderAnimation;
            headerText.textContent = preloaderText;
            nextBtn.classList.add("preloader");
            
            setTimeout(() => {
                if (currentStep == 2) {
                    // remove preloader
                    preloader.classList.remove("current");
                    nextBtn.classList.remove("preloader");
                    document.querySelector("#preloader-animation").remove();

                    result.classList.add("current");
                    headerText.textContent = stepText3;
                    currentStep = 3;
                    nextBtn.querySelector("span").textContent = "Избранное";
                    nextBtn.classList.add("favorites");
                    categoriesSend();
                    content.classList.add("result-content");
                    allCategories.forEach((d) => {
                        d.checked = false;
                        d.disabled = false;
                    })
                }
            }, "3400")
        }
        else if (currentStep == 3) {
            result.classList.remove("current");
            favorites.classList.add("current");
            headerText.textContent = stepText4;
            currentStep = 4;
            nextBtn.querySelector("span").textContent = "Начать подбор";
            nextBtn.classList.remove("favorites");
            nextBtn.classList.add("restart");
            backBtn.classList.add("home");
            loadFavorites();
        }
        else if (currentStep == 4) {
            favorites.classList.remove("current");
            gender.classList.add("current");
            stepPlace.classList.add("gender");
            headerText.textContent = stepText1;
            nextBtn.classList.remove("favorites");
            content.classList.remove("result-content");
            nextBtn.classList.remove("restart");
            backBtn.classList.remove("home");
            nextBtn.querySelector("span").textContent = "Далее";
            currentStep = 1;
            nextBtn.classList.add("disable");
        }
    } else {
        alert("Сорри, брат, но надо что-то выбрать");
    }
}

backBtn.onclick = function () {
    if (currentStep == 1) {
        window.location.href = siteUrl;
        currentStep = 0;
    } 
    else if (currentStep == 2) {
        if (document.querySelector("#preloader-animation")) {
            // remove preloader
            preloader.classList.remove("current");
            nextBtn.classList.remove("preloader");
            document.querySelector("#preloader-animation").remove();

            categories.classList.add("current");
            headerText.textContent = stepText2;
            currentStep = 2;
            nextBtn.querySelector("span").textContent = "Далее";
            nextBtn.classList.remove("favorites");
        } else {
            allCategories.forEach((d) => {
                d.checked = false;
                d.disabled = false;
            })
            categoryCounter = 0;
            categories.classList.remove("current");
            gender.classList.add("current");
            stepPlace.classList.add("gender");
            headerText.textContent = stepText1;
            currentStep = 1;
            nextBtn.classList.add("disable");
        }
    }
    else if (currentStep == 3) {
        result.classList.remove("current");
        categories.classList.add("current");
        headerText.textContent = stepText2;
        currentStep = 2;
        nextBtn.querySelector("span").textContent = "Далее";
        nextBtn.classList.add("disable");
        nextBtn.classList.remove("favorites");
        content.classList.remove("result-content");
    }
    else if (currentStep == 4) {
        window.location.href = siteUrl;
    }
}
//// END HEADER


//// START STEPS
const gender = document.getElementById("gender");
const categories = document.getElementById("categories");
const result = document.getElementById("result");
const favorites = document.getElementById("favorites");
const preloader = document.getElementById("preloader");

let currentStep = 0;

/// start step 1
gender.classList.add("current");

const allGenders = document.querySelectorAll(".custom__checkbox");
currentStep = 1;

allGenders.forEach((e) => {
    e.onclick = function () {
        currentGender = e.getAttribute('data-name');
        selectedGender = e.querySelector(".selected");

        if (e.classList.contains("selected")) {
            e.classList.remove("selected");
            nextBtn.classList.add("disable");

            document.cookie = "gender" + "=" + currentGender + "; path=/; max-age=0";
        } else {
            allGenders.forEach((d) => {
                d.classList.remove("selected");
            })

            e.classList.add("selected");
            nextBtn.classList.remove("disable");

            document.cookie = "gender" + "=" + currentGender + "; path=/";
        }
    }
});
/// end step 1

/// start step 2
// categories
const allCategories = document.querySelectorAll(".category__checkbox");
let categoryCounter = 0;

function categoriesSelection() {
    allCategories.forEach((e) => {
        e.onclick = function () {
            if (categoryCounter < 4 && e.checked == true) {
                categoryCounter++;
            } else {
                if (e.checked == true) {
                    e.checked = false;

                    // message append
                    alert('Вы уже выбрали 4 категории');
                } else {
                    categoryCounter--;

                    allCategories.forEach((d) => {
                        if (d.checked == false) {
                            d.disabled = false;
                        }
                    })
                }
            }

            if (categoryCounter == 4) {
                allCategories.forEach((d) => {
                    if (d.checked == false) {
                        d.disabled = true;
                    }
                })
                nextBtn.classList.remove("disable");
            }
        }
    });
}

if (allCategories != null) {
    categoriesSelection();
}
//
// ajax categories form
const categoriesform = document.getElementById("categories-form");

async function categoriesSend() {
    let formData = new FormData(categoriesform); 

    if (categoryCounter == 4) {
        let response = await fetch('../result/', {
            method: 'POST',
            body: formData
        });

        jQuery(document).ready(function($){
            $("#result").load("../result/");
        })

        if (response.ok) {
            categoryCounter = 0;
            categoriesform.reset();
        }
    }
}
//
/// end step 2

/// start step 3
let resultNames = 0; // loading in result_view.php script part

async function resultAddFavorite() {
    resultNames.forEach((e) => {
        const favoriteBtn = e.querySelector("#result-name-icon");
        const favoriteName = favoriteBtn.getAttribute('data-set');

        favoriteBtn.onclick = function() {
            if (!e.classList.contains("favorite")) {
                e.classList.add("favorite");
                document.cookie = favoriteName + "=" + favoriteName + "; path=/";
            } else {
                e.classList.remove("favorite");
                document.cookie = favoriteName + "=" + favoriteName + "; path=/; max-age=0";
            }
        }
    })
}
/// end step 3

/// start step 4
let favoriteNames = 0; // loading in result_view.php script part

async function favoritesAddFavorite() {
    favoriteNames.forEach((e) => {
        const favoriteBtn = e.querySelector("#favorite-name-icon");
        const favoriteName = favoriteBtn.getAttribute('data-set');

        favoriteBtn.onclick = function() {
            if (!e.classList.contains("favorite")) {
                e.classList.add("favorite");
                document.cookie = favoriteName + "=" + favoriteName + "; path=/";
            } else {
                e.classList.remove("favorite");
                document.cookie = favoriteName + "=" + favoriteName + "; path=/; max-age=0";
            }
        }
    })
}

async function loadFavorites() {
    jQuery(document).ready(function($){
        $("#favorites").load("../favorites/");
    })
}
/// end step 4

//// END STEPS