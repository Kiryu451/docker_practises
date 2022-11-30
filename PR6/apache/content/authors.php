<?php
require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Практическая №5 "авторы" redis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="main_content">
        <div>
            <h1>Список авторов</h1>
            <ol>
                <?php
                $mysqli = new mysqli("db", "root", "example", "appDB");
                $result = $mysqli->query("SELECT * FROM authors");
                foreach ($result as $row) {
                    echo "<li>{$row['surName']} {$row['name']}</li>";
                }
                ?>
            </ol>
        </div>
        <div class="exile">
            <a href="index.html">На главную</a>
            <a href="admin/admin.php">Админам сюда</a>
        </div>
    </div>
</body>
</html>