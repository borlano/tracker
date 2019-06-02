<?php

    class Controller
    {
        var $vars = [];
        var $layout = "default";


        function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
        }

        function render($filename)
        {
            $this->isAdmin();
            extract($this->vars);
            ob_start();
            require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }

        public function isAdmin(){
            require_once(ROOT . 'Models/User.php');
            if(!empty($_SESSION["access_token"])){
                $user = new User();
                if($auth = $user->authentificated($_SESSION["access_token"])){
                    return $this->vars["isAdmin"] = true;
                }else{
                    return $this->vars["isAdmin"] = false;
                }
            }else{
                return $this->vars["isAdmin"] = false;
            }
        }

    }
?>