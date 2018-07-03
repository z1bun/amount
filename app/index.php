<?php

require_once 'models/Amount.php';

use app\models\Amount;

$amount = new Amount();
echo $amount->Base();

?>