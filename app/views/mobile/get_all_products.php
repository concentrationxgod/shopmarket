<?php
// Получаем список всех продуктов
 
// массив JSON-ответов
$response = array();
 
// импортируем переменные для соединения с базой данных
require_once 'db_config.php';
 
// соединяемся с базой данных
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error());
mysqli_query($db, "SET NAMES utf8");
 
// получаем список всех товаров из таблицы products
$query = "SELECT * FROM products";
$result = mysqli_query($db, $query) or die('Ошибка при получении списка товаров');

// если данные есть
if (mysqli_num_rows($result) > 0) {
    // проходим в цикле через все результаты
    $response["products"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        $product = array();
        $product["pid"] = $row["pid"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["description"] = $row["description"];
 
        // помещаем информацияю о товаре  в массив
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;
 
    echo json_encode($response);
} else {
    // если товаров нет
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    echo json_encode($response);
}
?>