<?php
    namespace Model;
    function getData()
    {
        $users = file_get_contents("/data/product.json");
        return json_decode($users);
    }
    function getAllProducts()
    {
        return getData()->listUser;
    }
    
    function getOneProduct($id)
    {
        $users = getData();
        $result = array_filter($users->listUser, function ($user) use ($id) {
            return $user->id == $id;
        });
        return array_shift($result);
    }
    
    function createProduct($user)
    {
        $users = getData();
    
        $user->id = ++$users->id;
        $users->listUser[] = $user;
        file_put_contents("user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    function updateProduct($user)
    {
        $users = getData();
        $key = array_search($user->id, array_column($users->listUser, 'id'));
        if (!empty($key)) {
            $users->listUser = array_replace($users->listUser, array($key => $user));
            file_put_contents("user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        } else {
            return false;
        }
    }
    
    function deleteProduct($id)
    {
        $users = getData();
        $before = count($users);
    
        $users->listUser = array_filter($users->listUser, function ($user) use ($id) {
            return $user->id != $id;
        });
        if($before == count($users->listUser) +1){
            file_put_contents("user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        }else{
            return false;
        }
    }