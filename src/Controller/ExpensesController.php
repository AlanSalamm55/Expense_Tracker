<?php

namespace App\Controller;

use App\Config\Application;
use App\Config\Controller;
use App\Config\Request;
use App\Config\Response;
use App\Model\Expense;
use App\Model\User;

class ExpensesController extends Controller
{
    public function add(Request $request, Response $response)
    {
        $expense = new Expense();
        $expense->setUser(Application::$app->user);
        if ($request->isPost()) {
            $expense->loadData($request->getBody());
            if ($expense->validation() && $expense->save()) {
                Application::$app->session->setFlash('success', 'Expense has been added successfully');
                $response->redirect('dashboard');
                return;
            }
        }

        $this->setLayout('main');
        return $this->render('add-expense', ['model' => $expense]);
    }


    public function manageExpenses(Request $request, Response $response)
    {
        $expense = new Expense();
        $expense->setUser(Application::$app->user);
        $allExpenses = $expense->getAllByUser();

        if ($request->isPost()) {
            $expenseId = intval($request->getBody()['delid']);
            $expense->deleteExpense($expenseId);
            Application::$app->session->setFlash('success', 'delete successful');
            $response->redirect('manageExpenses');
            return;
        }

        $this->setLayout('main');
        return $this->render('manageExpenses', ['allExpenses' => $allExpenses]);
    }

    public function dashboard(Request $request, Response $response)
    {
        $expensesToday = new Expense();
        $expensesToday->setUser(Application::$app->user);
        $expenseToday = $expensesToday->getTodayExpenses();

        $totalToday = 0;
        foreach ($expenseToday as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalToday += (float) $expenseCost;
            }
        }

        $expensesYesterday = new Expense();
        $expensesYesterday->setUser(Application::$app->user);
        $expenseYesterday = $expensesYesterday->getLastParamDaysExpenses(1);

        $totalYesterday = 0;
        foreach ($expenseYesterday as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalYesterday += (float) $expenseCost;
            }
        }

        $totalYesterday -= $totalToday;


        $expensesLastWeek = new Expense();
        $expensesLastWeek->setUser(Application::$app->user);
        $expenseLastWeek = $expensesLastWeek->getLastParamDaysExpenses(7);

        $totalLastWeek = 0;
        foreach ($expenseLastWeek as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalLastWeek += (float) $expenseCost;
            }
        }

        $expensesLastMonth = new Expense();
        $expensesLastMonth->setUser(Application::$app->user);
        $expenseLastMonth = $expensesLastMonth->getLastParamDaysExpenses(30);

        $totalLastMonth = 0;
        foreach ($expenseLastMonth as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalLastMonth += (float) $expenseCost;
            }
        }

        $expensesLastYear = new Expense();
        $expensesLastYear->setUser(Application::$app->user);
        $expenseLastYear =  $expensesLastYear->getLastParamDaysExpenses(365);

        $totalLastYear = 0;
        foreach ($expenseLastYear as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalLastYear += (float) $expenseCost;
            }
        }


        $expensesAll = new Expense();
        $expensesAll->setUser(Application::$app->user);
        $expenseAll =  $expensesAll->getAllByUser();

        $totalAll = 0;
        foreach ($expenseAll as $row) {
            if (isset($row['ExpenseCost'])) {
                $expenseCost = $row['ExpenseCost'];
                $totalAll += (float) $expenseCost;
            }
        }

        $this->setLayout('main');
        return $this->render(
            'dashboard',
            [
                'expenseToday' => $totalToday,
                'expenseYesterday' => $totalYesterday,
                'expenseLastWeek' => $totalLastWeek,
                'expenseLastMonth' => $totalLastMonth,
                'expenseLastYear' => $totalLastYear,
                'expenseAll' => $totalAll
            ]
        );
    }
}
