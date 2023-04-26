<?php
// start a session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}
if ($_SESSION['logged'] == false) {
    setcookie('user_id', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('user_type', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
}

// require MySQL Connection
require('func/DBConnect.php');

require('func/Cart.php');

require('func/Account.php');

// Connect object
$db = new Connect();



// Cart object
$cart = new Cart($db);

// Account object
$acc = new Account($db);
$accData = $acc->getData();



?>