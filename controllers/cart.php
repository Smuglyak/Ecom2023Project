<?php

namespace controllers;

class Cart
{

    function __construct()
    {
        if (isset($_GET)) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                $viewClass = "\\views\\" . "Cart" . ucfirst($action);

                $cart = new \models\Cart();
                //change the cart identification later
                $cart = $cart->findUserCart(3);

                if (class_exists($viewClass)) {
                    $view = new $viewClass();
                    $view->render($cart);
                }
            }
        }
    }  

    public function index()
    {
        $userCart = new \models\Cart();
        //using placeholder user id
        $userCart = $userCart->findUserCart(3);
        if (!$userCart) {
            echo "No user cart";
        } else {
            echo "There is a cart";
        }
    }
}
