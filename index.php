<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Application;
use App\Controller\HomeController;
use App\Controller\ExpensesController;
use App\Controller\AuthController;
use App\Controller\ProfileController;


$app = new Application();

$app->router->get('custom', function () {
    echo "This custom route";
});

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('home', [HomeController::class, 'home']);

$app->router->get('login', [AuthController::class, 'login']);
$app->router->post('login', [AuthController::class, 'login']);

$app->router->get('register', [AuthController::class, 'register']);
$app->router->post('register', [AuthController::class, 'register']);

$app->router->get('logout', [AuthController::class, 'logout']);

$app->router->get('change-password', [AuthController::class, 'changePassword']);
$app->router->post('change-password', [AuthController::class, 'changePassword']);

$app->router->get('add-expense', [ExpensesController::class, 'add']);
$app->router->post('add-expense', [ExpensesController::class, 'add']);


$app->router->get('dashboard', [ExpensesController::class, 'dashboard']);

$app->router->get('manageExpenses', [ExpensesController::class, 'manageExpenses']);
$app->router->post('manageExpenses', [ExpensesController::class, 'manageExpenses']);

$app->router->get('user-profile', [ProfileController::class, 'index']);
$app->router->post('user-profile', [ProfileController::class, 'index']);


$app->run();
