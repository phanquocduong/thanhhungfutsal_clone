<?php 
    session_start();
    require_once '../app/model/database.php';
    require_once '../app/model/ProductModel.php';
    require_once '../app/model/CategoryModel.php';
    require_once '../app/model/UserModel.php';
    require_once '../app/model/OrderModel.php';
    require_once './app/controller/AdProductController.php';
    require_once './app/controller/AdCategoryController.php';
    require_once './app/controller/AdUserController.php';
    require_once './app/controller/AdOrderController.php';
    require_once './app/view/header.php';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'categories':
                $category = new AdCategoryController();
                $category->viewCategoryList();
                break;
            case 'add-category':
                $category = new AdCategoryController();
                $category->viewAddCategory();
                break;
            case 'handle-add-category':
                $category = new AdCategoryController();
                $category->handleAddCategory();
                break;
            case 'edit-category':
                $category = new AdCategoryController();
                $category->viewEditCategory();
                break;
            case 'handle-edit-category':
                $category = new AdCategoryController();
                $category->handleEditCategory();
                break;
            case 'handle-delete-category':
                $category = new AdCategoryController();
                $category->handleDeleteCategory();
                break;
            case 'add-product':
                $product = new AdProductController();
                $product->viewAddProduct();
                break;
            case 'handle-add-product':
                $product = new AdProductController();
                $product->handleAddProduct();
                break;
            case 'edit-product':
                $product = new AdProductController();
                $product->viewEditProduct();
                break;
            case 'handle-edit-product':
                $product = new AdProductController();
                $product->handleEditProduct();
                break;
            case 'handle-delete-product':
                $product = new AdProductController();
                $product->handleDeleteProduct();
                break;
            case 'users':
                $user = new AdUserController();
                $user->viewUserList();
                break;
            case 'add-user':
                $user = new AdUserController();
                $user->viewAddUser();
                break;
            case 'handle-add-user':
                $user = new AdUserController();
                $user->handleAddUser();
                break;
            case 'edit-user':
                $user = new AdUserController();
                $user->viewEditUser();
                break;
            case 'handle-edit-user':
                $user = new AdUserController();
                $user->handleEditUser();
                break;
            case 'handle-delete-user':
                $user = new AdUserController();
                $user->handleDeleteUser();
                break;
            case 'orders':
                $order = new AdOrderController();
                $order->viewOrderList();
                break;
            case 'order':
                $order = new AdOrderController();
                $order->viewOrder();
                break;
            case 'handle-update-order-status':
                $order = new AdOrderController();
                $order->handleUpdateOrderStatus();
                break;
            case 'logout':
                $user = new AdUserController();
                $user->logout();
                break;
            default:
                $product = new AdProductController();
                $product->viewProductList();
                break;
        }
    } else {
        $product = new AdProductController();
        $product->viewProductList();
    }
    require_once './app/view/footer.php';
?>