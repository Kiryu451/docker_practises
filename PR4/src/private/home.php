<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мультфильмы 2x2</title>
    <link rel="stylesheet" href="nstyle.css">
</head>
<body>
    <div class="photo">
        <a href="#">
            <img src="space/forest.jpg">
        </a>
        <a href="#">
            <img src="space/dangerous.jpg">
        </a>
        <a href="#">
            <img src="space/sever.jpg">
        </a>
    </div>
<div class="mainContent">
    <?php
    $celestial_body = file_get_contents("texts/forest.txt", true);
    echo $celestial_body;
    $celestial_body = file_get_contents("texts/dangerous.txt", true);
    echo $celestial_body;
    $celestial_body = file_get_contents("texts/sever.txt", true);
    echo $celestial_body;
    ?>
</div>
</body>
</html>
