<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);


            $explode_url = explode('/', $url);

            $explode_url = array_slice($explode_url, 1);

            $request->controller = $explode_url[0];

            $action = explode("?",$explode_url[1]);
            $request->action = $action[0];
            $request->params = $_REQUEST;

        if(!isset($request->controller) || empty($request->controller)){
            header("Location: /tasks/index");
        }

    }
}
?>