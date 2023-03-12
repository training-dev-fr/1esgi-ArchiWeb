<?php
    namespace Controller;

    use  \Model;

    function getAllProducts()
    {
        echo json_encode(\Model\getAllUsers());
    }
 
    function getOneProduct($id)
    {
        echo json_encode(\Model\getOneUser($id));
    }

    function createProduct()
    {
        $user = new \stdClass();
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->birthday = $_POST["birthday"];
        \Model\createUser($user);
        echo '{"message":"Utilisateur créé"}';
    }

    function updateProduct($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = new \stdClass();
        $user->id = $id;
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->birthday = $data->birthday;
        if(\Model\updateUser($user)){
            echo '{"message":"Utilisateur mis à jour"}';
        }else{
            return '{"message":"Utilisateur non trouvé"}';
        }
    }

    function deleteProduct($id)
    {
        if(\Model\deleteUser($id)){
            echo '{"message":"Utilisateur supprimé"}';
        }else{
            return '{"message":"Utilisateur non trouvé"}';
        }
    }