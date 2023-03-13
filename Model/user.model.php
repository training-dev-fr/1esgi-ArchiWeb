<?php
    namespace Model\User;
    function getData()
    {
        $users = file_get_contents("data/user.json");
        return json_decode($users);
    }
    function getAllUsers()
    {
        return getData()->listUser;
    }
    
    function getOneUser($id)
    {
        $users = getData();
        $result = array_filter($users->listUser, function ($user) use ($id) {
            return $user->id == $id;
        });
        return array_shift($result);
    }
    
    function createUser($user)
    {
        $users = getData();
    
        $user->id = ++$users->id;
        $users->listUser[] = $user;
        file_put_contents("data/user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    function updateUser($user)
    {
        $users = getData();
        $key = array_search($user->id, array_column($users->listUser, 'id'));
        if ($key !== false) {
            $users->listUser = array_replace($users->listUser, array($key => $user));
            file_put_contents("data/user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        } else {
            return false;
        }
    }
    
    function deleteUser($id)
    {
        $users = getData();
        $before = count($users->listUser);
    
        $users->listUser = array_filter($users->listUser, function ($user) use ($id) {
            return $user->id != $id;
        });
        if($before == count($users->listUser) +1){
            file_put_contents("data/user.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        }else{
            return false;
        }
    }