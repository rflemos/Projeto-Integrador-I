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
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new_bijus_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}


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


// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['buy_product_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        // call method deleteCart
        $cart->deleteCart($_POST['item_id']);
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-update'])) {
        if (isset($_GET['id'])) {
            // call method updateProduct
            $manage->updateProduct(
                $_GET['id'],
                $_POST['name-' . $_GET['id']],
                $_POST['brand-' . $_GET['id']],
                $_POST['price-' . $_GET['id']],
                $_FILES['image-' . $_GET['id']],
            );
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-delete'])) {
        if (isset($_GET['id'])) {
            // call method deleteProduct
            $manage->deleteProduct($_GET['id']);
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-insert'])) {
        // call method insertProduct
        $manage->insertProduct(
            $_POST['name-' . $_GET['id']],
            $_POST['brand-' . $_GET['id']],
            $_POST['price-' . $_GET['id']],
            $_FILES['image-' . $_GET['id']],
        );
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-delete'])) {
        if (isset($_GET['id'])) {
            // call method deleteAcc
            $acc->deleteAcc($_GET['id']);
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-update'])) {
        if (isset($_GET['id'])) {
            // call method updateProduct
            $acc->updateAcc(
                $_GET['id'],
                $_POST['username-' . $_GET['id']],
                $_POST['password-' . $_GET['id']],
                $_POST['email-' . $_GET['id']],
                $_POST['privilege-' . $_GET['id']],
            );
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-insert'])) {
        // call method insertAcc
        $acc->insertAcc(
            $_POST['username-' . $_GET['id']],
            $_POST['password-' . $_GET['id']],
            $_POST['email-' . $_GET['id']],
            $_POST['privilege-' . $_GET['id']],
        );
    }
}


?>