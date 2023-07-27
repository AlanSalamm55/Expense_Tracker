<?php

namespace App\Model;

use App\Config\DbModel;

class Expense extends DbModel
{
    public string $UserEmail = '';
    public string $ExpenseDate = '';
    public string $ExpenseItem = '';
    public float $ExpenseCost = 0.0;
    public User $user;

    public function attributes(): array
    {
        return ['UserEmail', 'ExpenseDate', 'ExpenseItem', 'ExpenseCost'];
    }

    public function tableName(): string
    {
        return 'expenses';
    }

    public function rules(): array
    {
        return [
            'ExpenseDate' => [self::RULE_REQUIRED],
            'ExpenseItem' => [self::RULE_REQUIRED],
            'ExpenseCost' => [self::RULE_REQUIRED]
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function setUser($user)
    {
        $this->user = $user;
    }


    //make it saved to the right id
    public function save()
    {
        $this->UserEmail = $this->user->email;
        return parent::save();
    }

    public function getExpenseDate(): string
    {
        return $this->ExpenseDate;
    }

    public function getExpenseItem(): string
    {
        return $this->ExpenseItem;
    }

    public function getExpenseCost(): float
    {
        return $this->ExpenseCost;
    }

    public function getAllByUser()
    {
        $tableName = static::tableName();
        $sql = "SELECT * FROM $tableName WHERE UserEmail = :email";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':email', $this->user->email);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getTodayExpenses()
    {
        $tableName = static::tableName();
        $today = date('Y-m-d');
        $sql = "SELECT * FROM $tableName WHERE UserEmail = :email AND ExpenseDate = :date";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':email', $this->user->email);
        $stmt->bindValue(':date', $today);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getLastParamDaysExpenses(int $time)
    {
        $tableName = static::tableName();
        $last30Days = date('Y-m-d', strtotime("-$time days"));
        $today = date('Y-m-d');
        $sql = "SELECT * FROM $tableName WHERE UserEmail = :email AND ExpenseDate BETWEEN :start_date AND :end_date";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':email', $this->user->email);
        $stmt->bindValue(':start_date', $last30Days);
        $stmt->bindValue(':end_date', $today);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function deleteExpense($expenseId)
    {
        $tableName = static::tableName();
        $sql = "DELETE FROM $tableName WHERE id = :expenseId";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':expenseId', $expenseId);
        $stmt->execute();
    }
}
