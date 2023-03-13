<?php
include("./Controller/user.controller.php");
include("./Controller/product.controller.php");

preg_match_all("#\/([a-zA-Z]*)\/?([0-9]*)#", $_SERVER['REQUEST_URI'], $match);
$method = $_SERVER["REQUEST_METHOD"];
$id = intval($match[2][0]);
header("Content-Type: application/json");
if ($match[1][0] == "Users") {
    switch ($method) {
        case "GET":
            if ($id != 0) {
                echo \Controller\getOneUser($id);
            } else {
                echo \Controller\getAllUsers();
            }
            break;
        case "POST":
            echo \Controller\createUser();
            break;
        case "PUT":
            echo \Controller\updateUser($id);
            break;
        case "DELETE":
            echo \Controller\deleteUser($id);
            break;
    }
}elseif($match[1][0] == "Products"){
    switch ($method) {
        case "GET":
            if ($id != 0) {
                echo \Controller\getOneProduct($id);
            } else {
                echo \Controller\getAllProducts();
            }
            break;
        case "POST":
            echo \Controller\createProduct();
            break;
        case "PUT":
            echo \Controller\updateProduct($id);
            break;
        case "DELETE":
            echo \Controller\deleteProduct($id);
            break;
    }
}
