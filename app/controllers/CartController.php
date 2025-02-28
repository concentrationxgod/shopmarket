<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;
use ishop\App;

class CartController extends AppController {

    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }

    public function viewAction(){
        $this->setMeta('Корзина');
    }

    public function checkoutAction(){
        if(!empty($_POST)){
            // регистрация пользователя
            if(!User::checkAuth()){
                $user = new User();
                $data = $_POST;
                $user->load($data);
                if(!$user->validate($data) || !$user->checkUnique()){
                    $user->getErrors();
                    $_SESSION['form_data'] = $data;
                    redirect();
                }else{
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                    if(!$user_id = $user->save('user')){
                        $_SESSION['error'] = 'Ошибка!';
                        redirect();
                    }
                }
            }

            // сохранение заказа
            $data['user_id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
            $data['note'] = !empty($_POST['note']) ? $_POST['note'] : '';
            $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : $_POST['email'];
            $order_id = Order::saveOrder($data);

            // данные для оплаты
            if(!empty($_POST['pay'])){
                self::setPaymentData($order_id);
            }

            Order::mailOrder($order_id, $user_email);

            if(!empty($_POST['pay'])){
                redirect(PATH . '/payment/form.php');
            }
        }
        redirect();
    }

    protected static function setPaymentData($order_id){
        if(isset($_SESSION['payment'])) unset($_SESSION['payment']);
        $_SESSION['payment']['id'] = $order_id;
        $_SESSION['payment']['curr'] = $_SESSION['cart.currency']['code'];
        $_SESSION['payment']['sum'] = $_SESSION['cart.sum'];
    }

    public function paymentAction(){
        if(empty($_POST)){
            die;
        }

        $dataSet = $_POST;

        unset($dataSet['ik_sign']);
        ksort($dataSet, SORT_STRING);
        array_push($dataSet, App::$app->getProperty('ik_key'));
        $signString = implode(':', $dataSet);
        $sign = base64_encode(md5($signString, true));

        $order = \R::load('order', (int)$dataSet['ik_pm_no']);
        if(!$order) die;

        if($dataSet['ik_co_id'] != App::$app->getProperty('ik_id') || $dataSet['ik_inv_st'] != 'success' || $dataSet['ik_am'] != $order->sum || $sign != $_POST['ik_sign']){
            die;
        }

        $order->status = '2';
        \R::store($order);
        die;
    }

}