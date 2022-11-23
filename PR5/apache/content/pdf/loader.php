<?php
$uploaddir = '/var/www/html/pdf/files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
echo '<link rel="stylesheet" href="../style.css">';
echo '<div style="display: flex; align-items: center; gap: 10px; padding: 10px; background: rgba(73, 72, 72, 0.651); border-radius: 25px;">';
setlocale(LC_ALL, 'en_US.UTF-8');
$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
if ($ext != "pdf") {
    echo "<p>Вы попытались загрузить не pdf файл</p>";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "<p>Файл корректен и был успешно загружен.</p>";
    } else {
        echo "<p>Возможная атака с помощью файловой загрузки!</p>";
    }
//echo 'Некоторая отладочная информация:';
//print_r($_FILES);
}
echo "</div>";
?>
<div class="exile">
    <a href="files.php">К списку</a>
</div>
