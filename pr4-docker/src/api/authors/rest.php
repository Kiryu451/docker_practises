<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PATCH, POST, DELETE, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../config/database.php";
include_once "../objects/authors.php";

$database = new Database();
$db = $database->getConnection();
$author = new Authors($db);

$data = json_decode(file_get_contents("php://input"));

$request = $_GET["request"];

if ($request == "create") {
    if (
        !empty($data->name) &&
        !empty($data->surName) &&
        !empty($data->age)
        
    ) {
        $author->name = $data->name;
        $author->surName = $data->surName;
        $author->age = $data->age;
    
        if ($author->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Статья была записана"), JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Невозможно записать статью"), JSON_UNESCAPED_UNICODE);
        }
    } else {
        http_response_code(400);
        echo $data;
        echo json_encode(array("message" => "Невозможно записать статью. Данные неполные."), JSON_UNESCAPED_UNICODE);
        
    }
} elseif ($request == "read") {
    $stmt = $author->read();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Статьи не найдены."), JSON_UNESCAPED_UNICODE);
    }
} elseif ($request == "update") {
    $author->id = $_GET["id"];
    if (!empty($data->name)) {
        $author->name = $data->name;
    }
    if (!empty($data->surName)) {
        $author->surName = $data->surName;
    }
    if (!empty($data->age)) {
        $author->age = $data->age;
    }
    if ($author->update()) {
        http_response_code(200);
    
        echo json_encode(array("message" => "Статья была обновлена"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
    
        echo json_encode(array("message" => "Невозможно обновить статью"), JSON_UNESCAPED_UNICODE);
    }

} elseif ($request == "delete") {
    $author->id = $_GET["id"];

    if ($author->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Статья удалена"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Не удалось удалить статью"));
    }
} else {
    http_response_code(500);
    echo json_encode(array("message" => "Неопределённый запрос"), JSON_UNESCAPED_UNICODE);
}
