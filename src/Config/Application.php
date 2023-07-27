<?php

namespace App\Config;

use App\Model\User;

class Application
{
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public Session $session;
    public Controller $controller;
    public $user;

    function __construct()
    {
        $this->userClass = User::class;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();


        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $this->user = $this->userClass::findOne(['ID' => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function getController()
    {
        return $this->controller;
    }


    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public function isGuest()
    {
        return !self::$app->user;
    }

    function run()
    {
        echo $this->router->dispatch();
    }
}
