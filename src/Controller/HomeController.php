<?php

namespace App\Controller;

use App\Config\Application;
use App\Config\Controller;


class HomeController extends Controller
{
    public function home()
    {
        $this->setLayout('main');
        return $this->render('home');
    }
}
