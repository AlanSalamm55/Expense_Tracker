<?php

namespace App\Controller;

use App\Config\Application;
use App\Config\Controller;
use App\Config\Request;
use App\Config\Response;
use App\Model\LoginForm;
use App\Model\User;
use App\Model\ChangePasswordForm;

class AuthController extends Controller
{
    private $user;


    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validation() && $loginForm->login()) {
                $this->setLayout('main');
                $response->redirect('home');
                return;
            }
        }
        $this->setLayout('main');
        return $this->render('login', ['model' => $loginForm]);
    }


    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('home');
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validation() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering'); //key is success and msg is thanks blah blah
                Application::$app->response->redirect('home');
                return;
            }
            return $this->render('register', ['model' => $user, 'msg' => ""]);
        }

        $this->setLayout('main');
        return $this->render('register', ['model' => $user, 'msg' => ""]);
    }

    public function changePassword(Request $request, Response $response)
    {
        $user = Application::$app->user;
        $model = new ChangePasswordForm(); // Move the instantiation here

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validation() && $model->validateCurrentPassword($user) && $user->changePassword($model->newPassword)) { // Fix the property name
                Application::$app->session->setFlash('success', 'Your password has been changed successfully.');
                $response->redirect('home');
                return;
            }
        }

        $this->setLayout('main');
        return $this->render('change-password', ['model' => $model]);
    }
}
