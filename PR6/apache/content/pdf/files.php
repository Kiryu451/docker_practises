<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Прака 5 файлы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body style="margin-left: 2%;">
    <form enctype="multipart/form-data" action="loader.php" method="POST">
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
            <label class="custom-file-label" for="file_field">Отправить этот файл:</label>
            <input class="but" id="file_field" name="userfile" type="file"/>
        </div>
        <button>Отправить файл</button>
    </form>

<div class="list_file">
    <?php
    $files = scandir('./files');
    if (count($files) <= 2) {
        echo "<h2>Нет загруженных файлов</h2>";
    } else {
        echo "<h2>Загруженные файлы</h2>";
        foreach ($files as $file) {
            if ($file != "." and $file != "..") {
                echo "<div class='list_element'><a href='./files/".$file."'>".$file."</a></div>";
            }
        }
    }
    ?>
</div>
</body>
</html>
