<?php
session_start();
require_once('main/controller/dbclass.php');

/* Product On Sale */
function getProduct()
{
	$db=new dbclass();$con=$db->Connection();
	$query = "select * from product where is_sale='1' and active='1' order by ID DESC";
	$cartResult = $db->SelectQry($query,$con);
	$Rows2 = mysqli_num_rows($cartResult);	
	$product=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($Row2 =mysqli_fetch_assoc($cartResult))   	
		{		       			
			$product[$i++]=$Row2;  	
		}	
	}
	 return $product;
					 
}

function getAllProduct()
{
	$db=new dbclass();$con=$db->Connection();
	if(isset($_REQUEST["cat_id"]) and $_REQUEST["cat_id"]!='')
	{
		$category_id = base64_decode($_REQUEST["cat_id"]);
	}
	if(isset($category_id) and $category_id!='')
	{
		 $query1 = "select * from product where active='1' and categoryID='".$category_id."' order by ID DESC ";
	}else{
	 $query1 = "select * from product where active='1' order by ID DESC "; }
	$cartResult1 = $db->SelectQry($query1,$con);
	$Rows2 = mysqli_num_rows($cartResult1);	
	$allproduct=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($Row1 =mysqli_fetch_assoc($cartResult1))   	
		{		       			
			$allproduct[$i++]=$Row1;  	
		}	
	}
	 return $allproduct;
					
}
/* detail.php */
function productDetails()
{
	$db=new dbclass();$con=$db->Connection();

	/* get Product */
	$product_id = base64_decode($_REQUEST["productid"]);
	$sql="Select product.*,category.categoryID as cat_id,category.name as cat_name FROM product left join category on product.categoryID=category.categoryID where product.productID='".$product_id."' and product.active='1' order by e_date DESC;";
	$res=$db->SelectQry($sql,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$cart_product=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($Row2 =mysqli_fetch_assoc($res))   	
		{		       			
			$cart_product[$i++]=$Row2;  	
		}	
	}
	return $cart_product;
 }
 
/* get all Category */
function allCategory()
{
	$db=new dbclass();$con=$db->Connection();
	$query1 = "select categoryID,parantID,name,icon from category where active='1' and categoryID!='' and parantID='0'";
	$catResult = $db->SelectQry($query1,$con);
	$Rows2 = mysqli_num_rows($catResult);	
	$left_cat=array();
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($fetch =mysqli_fetch_assoc($catResult))   	
		{		       			
			$left_cat[$i]=$fetch; 
			$query11 = "select parantID,name,categoryID from category where active=1 and parantID='".$fetch['categoryID']."'";
			$catResult1 = $db->SelectQry($query11,$con);
			$y=0;
			while($fetch2 =mysqli_fetch_assoc($catResult1)){
				$left_cat[$i]["subcat"][$y++]=$fetch2; 			
			// echo "<pre/>";print_r($left_cat);
			}
			$i++;
		}	
		
	}
	return $left_cat;
}

function getcartval()
{
	$db=new dbclass();$con=$db->Connection();
	if(!empty($_GET["action"])) {
	// echo "heii";exit;
switch($_GET["action"]) {
	
	case "add":
	// echo "heii";exit;
		if(!empty($_POST["quantity"])) {
			// echo $_POST["quantity"];exit;
			$productByCod = "SELECT * FROM product WHERE slug='" . $_REQUEST["slug"] . "'";
			$cartResult=$db->SelectQry($productByCod,$con);
			$productByCode=array();
			$i=0;
			while($productByCode1 =mysqli_fetch_assoc($cartResult))
			{
				$productByCode[$i++]=$productByCode1;
			}
			$itemArray = array($productByCode[0]["slug"]=>array(
			'pname'=>$productByCode[0]["p_name"],
			'ID'=>$productByCode[0]["ID"],
			'SKU'=>$productByCode[0]["SKU"], 
			'quantity'=>$_POST["quantity"],
			'price'=>$productByCode[0]["price"],
			'ship_price'=>$productByCode[0]["ship_price"],
			'slug'=>$productByCode[0]["slug"],
			'image'=>$productByCode[0]["image"]
			));
			// echo "<pre/>";print_r($itemArray);exit;
			if(!empty($_SESSION["cart_item"])) {
				
				if(in_array($productByCode[0]["slug"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["slug"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	 break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["slug"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	/* break;
	case "Minus":
		if(!empty($_SESSION["cart_item"])) {
				
				if(in_array($productByCode[0]["slug"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["slug"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] -= $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				
				$_SESSION["cart_item"] = $itemArray;
			} */
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break; 	
}
}
return $_SESSION["cart_item"];

}
?>