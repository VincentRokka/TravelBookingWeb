<?php
require_once 'config/db.php';
error_reporting(0);
session_start();
//  session_destroy();
//  die();
if(isset($_GET['id_sp'])){
    $id_sp=$_GET['id_sp'];
    
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
        //gọi quantity để update giỏ hàng
    $quantity = (isset($_GET['action'])) ? $_GET['quantity'] : 1;
    if($quantity <= 0){
        $quantity = 1;
    }

    $query = mysqli_query($connect,"SELECT * FROM sanpham where id_sp=$id_sp");

    if($query){
        $sanpham =mysqli_fetch_assoc($query);
    }
    $item = [
        'id_sp'=>$sanpham['id_sp'],
        'ten_sp'=>$sanpham['ten_sp'],
        'anh_sp'=>$sanpham['anh_sp'],
        'gia_sp'=>$sanpham['gia_sp'],
        'quantity'=>$quantity
    ];
        //Thêm vào giỏ hàng
    $cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    if(isset($_SESSION['cart'][$id_sp])){
        $_SESSION['cart'][$id_sp]['quantity'] +=$quantity;
    }
    else{
        $_SESSION['cart'][$id_sp] = $item;
    }
        //cập nhật số lượng giỏ hàng
    if($action == 'update'){
        $_SESSION['cart'][$id_sp]['quantity'] = $quantity;
    }
    if($action == 'delete'){
        unset($_SESSION['cart'][$id_sp]);
    }
}
//    echo "<pre>";
//    print_r($_SESSION['cart']);
?>