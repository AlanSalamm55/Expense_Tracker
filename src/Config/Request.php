<?php

namespace App\Config;

class Request
{
    public function getPath()
    {
        // you can improve this method for robust route parsing.
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        $position = strpos($uri[1], '?');
        if ($position === false) {
            return empty($uri[1]) ? '/' : $uri[1];
        }
        return substr($uri[1], 0, $position);
    }


    function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    function isGet()
    {
        return $this->getMethod() === 'get';
    }

    function isPost()
    {
        return $this->getMethod() === 'post';
    }

    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}
