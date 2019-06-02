<?php
/**
 * Created by PhpStorm.
 * User: Lexz
 * Date: 02.06.2019
 * Time: 10:06
 */

class AuthController extends Controller
{
    public function login(){
        if(!$this->isAdmin()) {
            require_once(ROOT . 'Models/User.php');
            if (!empty($_POST["login"] && !empty($_POST["password"]))) {
                $user = new User();
                $login = $_POST["login"];
                $password = hash("sha512", $_POST["password"]);
                if ($access = $user->login($login, $password)) {
                    $_SESSION["access_token"] = $access;

                    header("Location: /tasks/index");
                } else {
                    $data["error"] = "Пользователь с таким логином\паролем не найден";
                    $this->set($data);
                    $this->render("login");
                }
            }

            $this->render("login");
        }else{
            header("Location: /tasks/index");
        }
    }

    public function logout(){
        unset($_SESSION['access_token']);
        header("Location: /tasks/index");
    }
}