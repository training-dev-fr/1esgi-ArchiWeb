<?php
    namespace Controller;

    use  \Model;

    function getAllProducts()
    {
        echo json_encode(\Model\getAllProducts());
    }
 
    function getOneProduct($id)
    {
        echo json_encode(\Model\getOneProduct($id));
    }

    function createProduct()
    {
        $product = new \stdClass();
        $product->name = $_POST["name"];
        $product->price = $_POST["price"];
        \Model\createProduct($product);
        echo '{"message":"Produit créé"}';
    }

    function updateProduct($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $product = new \stdClass();
        $product->id = $id;
        $product->name = $data->name;
        $product->price = $data->price;
        if(\Model\updateProduct($product)){
            echo '{"message":"Produit mis à jour"}';
        }else{
            return '{"message":"Produit non trouvé"}';
        }
    }

    function deleteProduct($id)
    {
        if(\Model\deleteProduct($id)){
            echo '{"message":"Produit supprimé"}';
        }else{
            return '{"message":"Produit non trouvé"}';
        }
    }