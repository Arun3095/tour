<?php
	session_start();
	require_once('main/controller/dbclass.php');
	$db=new dbclass();$con=$db->Connection();

class ShoppingCart extends dbclass
{

    /* function getAllProduct()
    {
        $query = "SELECT * FROM product where active=1";
        
       $productResult=$db->SelectQry($query,$con);
        return $productResult;
    }

    function getMemberCartItem($memberID)
    {
        $query = "SELECT product.*, cart.cartID as cartID,cart.quantity FROM product, cart WHERE 
            product.productID = cart.productID AND cart.memberID = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $memberID
            )
        );
        
        $cartResult = $db->SelectQry($query,$con);
        return $cartResult;
    } */

   /*  function getProductByCode($productID)
    {
        echo $query = "SELECT * FROM product WHERE productID=$productID";
     
		$params = array(
            array(
                "param_type" => "s",
                "param_value" => $productID
            )
        ); 
        // print_r($params);
        $productResult = $db->SelectQry($query,$params);
		
        return $productResult;
    } */

    /* function getCartItemByProduct($productID, $memberID)
    {
        $query = "SELECT * FROM cart WHERE productID = ? AND memberID = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $productID
            ),
            array(
                "param_type" => "i",
                "param_value" => $memberID
            )
        );
        
        $cartResult = $db->SelectQry($query,$con);
        return $cartResult;
    }

    function addToCart($productID, $quantity, $memberID)
    {
        $query = "INSERT INTO cart (productID,quantity,memberID) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $productID
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $memberID
            )
        );
        
        $db->TransQry($query, $con);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE cart SET  quantity = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
      $db->TransQry($query, $con);
    }

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $db->TransQry($query, $con);
    }

    function emptyCart($memberID)
    {
        $query = "DELETE FROM cart WHERE memberID = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $memberID
            )
        );
        
        $db->TransQry($query, $con);
    } */
}
