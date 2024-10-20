<?php
    session_start();
    ob_start();
    require_once 'app/model/database.php';
    require_once 'app/model/ProductModel.php';
    require_once 'app/model/UserModel.php';
    require_once 'app/model/OrderModel.php';
    require_once 'app/controller/HomeController.php';
    require_once 'app/controller/ProductController.php';
    require_once 'app/controller/UserController.php';
    require_once 'app/controller/AboutController.php';
    require_once 'app/controller/ContactController.php';
    require_once 'app/controller/CartController.php';
    require_once 'app/controller/PaymentController.php';
    require_once 'app/controller/OrderController.php';

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'allproducts':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewAllProducts();
                break;
            case 'hotsales':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewHotSales();
                break;
            case 'tfshoes':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewTfShoes();
                break;
            case 'icshoes':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewIcShoes();
                break;
            case 'accessories':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewAccessories();
                break;
            case 'detail':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewDetail();
                break;
            case 'search':
                require_once 'app/view/header.php';
                $product = new ProductController();
                $product->viewSearchProducts();
                break;
            case 'about':
                require_once 'app/view/header.php';
                $about = new AboutController();
                $about->viewAbout();
                break;
            case 'contact':
                require_once 'app/view/header.php';
                $contact = new ContactController();
                $contact->viewContact();
                break;
            case 'login':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->viewLogin();
                break;
            case 'handlelogin':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->handleLogin();
                break;
            case 'register':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->viewRegister();
                break;
            case 'handleregister':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->handleRegister();
                break;
            case 'logout':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->logout();
                break;
            case 'account':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->viewAccount();
                break;
            case 'update-account':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->viewUpdateAccount();
                break;
            case 'handle-update-account':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->handleUpdateAccount();
                break;
            case 'changepassword':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->viewChangePassword();
                break;
            case 'handle-changepassword':
                require_once 'app/view/header.php';
                $user = new UserController();
                $user->handleChangePassword();
                break;
            case 'order-details':
                require_once 'app/view/header.php';
                $order = new OrderController();
                $order->viewOrderDetails();
                break;
            case 'handle-addcart':
                $cart = new CartController();
                $cart->handleAddCart();
                break;
            case 'handle-buy-now':
                require_once 'app/view/header.php';
                $payment = new PaymentController();
                $payment->handleBuyNow();
                break;
            case 'cart':
                require_once 'app/view/header.php';
                $cart = new CartController();
                $cart->viewCart();
                break;
            case 'handle-updatecart':
                $cart = new CartController();
                $cart->handleUpdateCart();
                break;
            case 'handle-deletecart':
                $cart = new CartController();
                $cart->handleDeleteCart();
                break;
            case 'payment':
                require_once 'app/view/header.php';
                $payment = new PaymentController();
                $payment->viewPayment();
                break;
            case 'handlepayment':
                require_once 'app/view/header.php';
                $payment = new PaymentController();
                $payment->handlePayment();
                break;
            default:
                require_once 'app/view/header.php';
                $home = new HomeController();
                $home->viewHome();
                break;
        }
    } else {
        require_once 'app/view/header.php';
        $home = new HomeController();
        $home->viewHome();
    }

    require_once 'app/view/footer.php';
?>
