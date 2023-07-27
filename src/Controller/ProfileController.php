<?php

namespace App\Controller;

use App\Config\Application;
use App\Config\Controller;
use App\Config\Request;
use App\Config\Response;
use App\Model\UserProfile;

class ProfileController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $user = Application::$app->user;
        $userProfile = new UserProfile();
        $userData = $userProfile->getUserProfile($user->email);
        if ($request->isPost()) {
            $userProfile->loadData($request->getBody());
            if ($userProfile->validation() && $userProfile->updateProfile($user->email)) {
                Application::$app->session->setFlash('success', 'Profile updated successfully');
                $response->redirect('user-profile');
                return;
            }
        }

        $this->setLayout('main');
        return $this->render('user-profile', ['userData' => $userData]);
    }
}
