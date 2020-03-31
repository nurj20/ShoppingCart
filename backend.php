<?php
require_once "dbh.php";

if(isset($_POST['add_to_cart'])){
    $array_item = array(
        'item_id' => $_GET['id'],
        'item_name' => $_POST['hidden_name'],
        'item_price' => $_POST['hidden_price'],
        'item_quantity' => $_POST['quantity'],
    );
    if (isset($_SESSION['shopping_cart'])){
        $item_ids = array_column($_SESSION['shopping_cart'], 'item_id');
        if (in_array($_GET['id'],$item_ids)){

            echo "<script> alert('Item already in the list');</script>";
            echo "<script> window.location = 'index.php';</script>";
        }else{
            $count = count($_SESSION['shopping_cart']);
            $_SESSION['shopping_cart'][$count] = $array_item;   
            $_SESSION['total'] += ((int)$array_item['item_quantity'] > 1)?(int)$array_item['item_price']*(int)$array_item['item_quantity']:(int)$array_item['item_price'];
            }
    }
    else{
        $_SESSION['shopping_cart'][0] = $array_item;
        $_SESSION['total'] = ((int)$array_item['item_quantity'] > 1)?(int)$array_item['item_price']*(int)$array_item['item_quantity']:(int)$array_item['item_price'];
         }
}

if (isset($_GET['action'])){
    if ($_GET['action'] == "delete"){
        foreach($_SESSION['shopping_cart'] as $key=>$values)
       { 
         if ($values['item_id'] == $_GET['id'])  
           {    
       
            $deduct =((int)$values['item_quantity'] > 1)?(int)$values['item_price']*(int)$values['item_quantity']:(int)$values['item_price'];
       
            $_SESSION['total'] -= $deduct;
                unset($_SESSION['shopping_cart'][$key]);
        }
       }
       if (count($_SESSION['shopping_cart'])==0)
          {
            unset($_SESSION['shopping_cart']);
            $_SESSION['total'] = 0;
          }     
       echo "<script> window.location='index.php';</script>";  
    }
    
}

?>