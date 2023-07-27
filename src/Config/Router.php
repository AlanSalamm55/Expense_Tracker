<?php

namespace App\Config;


class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request = $request;
    }

    function get($path, $action)
    {
        $this->addRoute($path, $action, 'get');
    }

    function post($path, $action)
    {
        $this->addRoute($path, $action, 'post');
    }

    function addRoute($path, $action, $method)
    {
        $this->routes[$method][$path] = $action;
    }



    function dispatch()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request, $this->response);
    }



    //views and layouts

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout ?? 'main';
        ob_start();
        include_once __DIR__ . "/../View/layout/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__ . "/../View/$view.php";
        return ob_get_clean();
    }
}
