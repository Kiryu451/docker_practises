<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PATCH, POST, DELETE, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../config/database.php";
include_once "../objects/books.php";

$database = new Database();
$db = $database->getConnection();
$book = new Books($db);

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        !empty($data->title) &&
        !empty($data->content) &&
        !empty($data->author)
        
    ) {
        $book->title = $data->title;
        $book->content = $data->content;
        $book->author = $data->author;
    
        if ($book->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Книга была внесена"), JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Невозможно внести книгу"), JSON_UNESCAPED_UNICODE);
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Невозможно внести книгу. Данные неполные."), JSON_UNESCAPED_UNICODE);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmt = $book->read();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Книги не найдены."), JSON_UNESCAPED_UNICODE);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    $book->id = $_GET["id"];
    if (!empty($data->title)) {
        $book->title = $data->title;
    }
    if (!empty($data->content)) {
        $book->content = $data->content;
    }
    if (!empty($data->author)) {
        $book->author = $data->author;
    }
    if ($book->update()) {
        http_response_code(200);
    
        echo json_encode(array("message" => "Книга была обновлена"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
    
        echo json_encode(array("message" => "Невозможно обновить книгу"), JSON_UNESCAPED_UNICODE);
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $book->id = $_GET["id"];

    if ($book->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Книга удалена"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Не удалось удалить книгу"));
    }
} else {
    http_response_code(500);
    echo json_encode(array("message" => "Неопределённый запрос"), JSON_UNESCAPED_UNICODE);
}
