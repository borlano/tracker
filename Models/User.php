<?php
/**
 * Created by PhpStorm.
 * User: Lexz
 * Date: 02.06.2019
 * Time: 10:06
 */

class User
{
    public function login($login, $password){
        $sql = "SELECT access_token FROM admin WHERE login =\"" . $login . "\" AND password=\"" . $password . "\"";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchColumn();
    }

    public function logout(){

    }

    public function authentificated($access_token){
        $sql = "SELECT access_token FROM admin WHERE access_token =\"" . $access_token . "\"";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchColumn();
    }
}