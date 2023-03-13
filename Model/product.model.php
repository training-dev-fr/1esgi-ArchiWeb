<?php
    namespace Model;
    function getData()
    {
        $products = file_get_contents("/data/product.json");
        return json_decode($products);
    }
    function getAllProducts()
    {
        return getData()->listProduct;
    }
    
    function getOneProduct($id)
    {
        $products = getData();
        $result = array_filter($products->listProduct, function ($user) use ($id) {
            return $user->id == $id;
        });
        return array_shift($result);
    }
    
    function createProduct($product)
    {
        $products = getData();
    
        $product->id = ++$products->id;
        $products->listProduct[] = $user;
        file_put_contents("user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    function updateProduct($user)
    {
        $products = getData();
        $key = array_search($user->id, array_column($products->listProduct, 'id'));
        if (!empty($key)) {
            $products->listProduct = array_replace($products->listProduct, array($key => $user));
            file_put_contents("user.json", json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        } else {
            return false;
        }
    }
    
    function deleteProduct($id)
    {
        $products = getData();
        $before = count($products);
    
        $products->listProduct = array_filter($products->listProduct, function ($user) use ($id) {
            return $user->id != $id;
        });
        if($before == count($products->listProduct) +1){
            file_put_contents("user.json", json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        }else{
            return false;
        }
    }