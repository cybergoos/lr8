<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaNaName - подбор имён для ребенка</title>
    <!-- styles -->
    <link rel="stylesheet" href=".././css/style.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- preloader -->
    <div id="page-preloader">
        <object class="page-preloader__animation" type="image/svg+xml" data=".././images/loading.svg">
            <img src=".././images/loading.svg">
        </object>
    </div>

    <!-- content -->
    <?php include 'app/views/'.$content_view; ?>

    <!-- scripts -->
    <script src=".././js/selection-form.js"></script>
</body>
</html>