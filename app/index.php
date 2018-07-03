<?php

require_once 'models/Amount.php';

use app\models\Amount;

$amount = new Amount(60, 15, 10);
try {
    if ($amount->diff()) {
        echo 'Отклонение допустимое';
    } else {
        echo 'Отклонение недопустимое';
    }
    echo "\n";
    echo 'Отклонение: ' . $amount->getAmount();
    echo "\n";
} catch (\Throwable $e)
{
    $e->getMessage();
}

unset($amount);

$amount = new Amount(5, 15, 10);
try {
    if ($amount->diff()) {
        echo 'Отклонение допустимое';
    } else {
        echo 'Отклонение недопустимое';
    }
    echo "\n";
    echo 'Отклонение: ' . $amount->getAmount();
    echo "\n";
} catch (\Throwable $e)
{
    $e->getMessage();
}

unset($amount);

$amount = new Amount(5, 15, 0);
try {
    if ($amount->diff()) {
        echo 'Отклонение допустимое';
    } else {
        echo 'Отклонение недопустимое';
    }
    echo "\n";
    echo 'Отклонение: ' . $amount->getAmount();
    echo "\n";
} catch (\Throwable $e)
{
    echo 'Возникла исключительная ситуация: ' . $e->getMessage();
}

?>