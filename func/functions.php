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

require('func/Product.php');

require('func/Manage.php');

// Connect object
$db = new Connect();

// Product object
$product = new Product($db);
$productData = $product->getData();

// Cart object
$cart = new Cart($db);

// Account object
$acc = new Account($db);
$accData = $acc->getData();

// Manage object
$manage = new Manage($db);
$manageData = $manage->getData();
$brandData = $manage->getBrands();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login-submit'])) {
       
        $acc->login($_POST['username'], $_POST['password']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['logout-submit'])) {
        
        $acc->logout();
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register-submit'])) {
        
        $acc->register(
            $_POST['fullname'],
            $_POST['username'],
            $_POST['password'],
            $_POST['phone'],
            $_POST['avatar'],
            $_POST['email'],
            $_POST['city'],
            $_POST['gender'],
            $_POST['address']
        );
    }
}


?>