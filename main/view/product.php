<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$delID=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{
	

	//category, p_name,Pimage, desc, fulldesc, tag, sale, GST, price, marketprice, is_sale, sell_price, arrive_date, instock,  weight, is_shipping, ship_price, free_shipping, status 
	
	$category=isset($_REQUEST["category"])?$_REQUEST["category"]:"";
	$subcategory=isset($_REQUEST["subcategory"])?$_REQUEST["subcategory"]:"";
	$p_name=isset($_REQUEST["p_name"])?$_REQUEST["p_name"]:"";
	$slug = create_slug($p_name);
	$SKU=isset($_REQUEST["SKU"])?$_REQUEST["SKU"]:"";
	$desc=isset($_REQUEST["desc"])?$_REQUEST["desc"]:"";
	$fulldesc=isset($_REQUEST["fulldesc"])?$_REQUEST["fulldesc"]:"";
	// $tag=isset($_REQUEST["tag"])?$_REQUEST["tag"]:"";
	$unit=isset($_REQUEST["unit"])?$_REQUEST["unit"]:"";
	
	$regular_price=isset($_REQUEST["price"])?$_REQUEST["price"]:"";
	$market_price=isset($_REQUEST["marketprice"])?$_REQUEST["marketprice"]:"";
	$is_sale=isset($_REQUEST["is_sale"])?$_REQUEST["is_sale"]:"";
	$sell_price=isset($_REQUEST["sell_price"])?$_REQUEST["sell_price"]:"";
	
	if(isset($is_sale) and $is_sale!='')
	{
		$t_price = $sell_price;
	}else{
		$t_price = $regular_price;
	}
	$GST=isset($_REQUEST["GST"])?$_REQUEST["GST"]:"";
	
	$arrive_date=isset($_REQUEST["arrive_date"])?$_REQUEST["arrive_date"]:"";
	$arrive_date=date("Y-m-d",strtotime($arrive_date));
	$instock=isset($_REQUEST["instock"])?$_REQUEST["instock"]:"";
	$weight=isset($_REQUEST["weight"])?$_REQUEST["weight"]:"";
	$is_shipping=isset($_REQUEST["is_shipping"])?$_REQUEST["is_shipping"]:"";
	$ship_price=isset($_REQUEST["ship_price"])?$_REQUEST["ship_price"]:"";
	// $free_shipping=isset($_REQUEST["free_shipping"])?$_REQUEST["free_shipping"]:"";
	$status=isset($_REQUEST["status"])?$_REQUEST["status"]:"";
	// $active=isset($_REQUEST["active"])?$_REQUEST["active"]:1;
	
	$Image=empty($Image)?"abc.png":$Image;
	$dataset=json_encode($_REQUEST);
	$Image=isset($_REQUEST["oldimage"])?$_REQUEST["oldimage"]:"";
	$Image1=isset($_REQUEST["oldimage1"])?$_REQUEST["oldimage1"]:"";
	$Image2=isset($_REQUEST["oldimage2"])?$_REQUEST["oldimage2"]:"";
	$Image3=isset($_REQUEST["oldimage3"])?$_REQUEST["oldimage3"]:"";
	$Image4=isset($_REQUEST["oldimage4"])?$_REQUEST["oldimage4"]:"";
	$msg="";
	if(isset($_REQUEST["submit"]))
	{
		// echo $slug;exit;
		if($status=='on')
		{ 
			$status=1;
		}
		else
		{
			$status=0;
		}
		if($is_sale=='on')
		{ 
			$is_sale=1;
		}
		else
		{
			$is_sale=0;
		}
		if($is_shipping=='on')
		{ 
			$is_shipping=1;
		}
		else
		{
			$is_shipping=0;
		}
		/* if($free_shipping=='on')
		{ 
			$free_shipping=1;
		}
		else
		{
			$free_shipping=0;
		} */
		  /*  $check_exist="select p_name from product where p_name='".$p_name."' ";
		    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		    if($check_exist>0)
		  {
			  $msg="$p_name Already Exist";
			 echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		else{ */  
		$ImgArr=explode('.',basename($_FILES['Pimage']['name']));
		if($_FILES['Pimage']['name']!="" )
	  {
		 
		if(file_exists("uploads/productImage/".$Image))
		{
		  unlink("uploads/productImage/".$Image);
		}
	   $Image=time().'p_image'.rand().'.'.end($ImgArr);
		$UploadDir="uploads/productImage/".$Image;
		move_uploaded_file($_FILES['Pimage']['tmp_name'],$UploadDir);
	  }
	  
		$ImgArr1=explode('.',basename($_FILES['Pimage1']['name']));
		if($_FILES['Pimage1']['name']!="" )
	  {
		 
		if(file_exists("uploads/productImage/".$Image1))
		{
		  unlink("uploads/productImage/".$Image1);
		}
	   $Image1=time().'pimage1'.rand().'.'.end($ImgArr1);
		$UploadDir="uploads/productImage/".$Image1;
		move_uploaded_file($_FILES['Pimage1']['tmp_name'],$UploadDir);
	  }
	  $ImgArr2=explode('.',basename($_FILES['Pimage2']['name']));
		if($_FILES['Pimage2']['name']!="" )
	  {
		 
		if(file_exists("uploads/productImage/".$Image2))
		{
		  unlink("uploads/productImage/".$Image2);
		}
	   $Image2=time().'pimage2'.rand().'.'.end($ImgArr2);
		$UploadDir="uploads/productImage/".$Image2;
		move_uploaded_file($_FILES['Pimage2']['tmp_name'],$UploadDir);
	  }
	  $ImgArr3=explode('.',basename($_FILES['Pimage3']['name']));
		if($_FILES['Pimage3']['name']!="" )
	  {
		 
		if(file_exists("uploads/productImage/".$Image3))
		{
		  unlink("uploads/productImage/".$Image3);
		}
	   $Image3=time().'pimage3'.rand().'.'.end($ImgArr3);
		$UploadDir="uploads/productImage/".$Image3;
		move_uploaded_file($_FILES['Pimage3']['tmp_name'],$UploadDir);
	  }
	  $ImgArr4=explode('.',basename($_FILES['Pimage4']['name']));
		if($_FILES['Pimage4']['name']!="" )
	  {
		 
		if(file_exists("uploads/productImage/".$Image4))
		{
		  unlink("uploads/productImage/".$Image4);
		}
	   $Image4=time().'pimage4'.rand().'.'.end($ImgArr4);
		$UploadDir="uploads/productImage/".$Image4;
		move_uploaded_file($_FILES['Pimage4']['tmp_name'],$UploadDir);
	  }
	
		if($p_name!= "")
		{
			
		  $productID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select productID from product where productID='".$productID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			$qry="update product set categoryID='".$category."',sub_categoryID='".$subcategory."',p_name='".$p_name."',SKU='".$SKU."',r_price='".$regular_price."',m_price='".$market_price."',is_sale='".$is_sale."',s_price='".$sell_price."',price='".$t_price."',weight='".$weight."',unit='".$unit."',description='".$desc."',full_desc='".$fulldesc."',image='".$Image."',img1='".$Image1."',img2='".$Image2."',img3='".$Image3."',img4='".$Image4."',GST='".$GST."',instock='".$instock."',is_shipping='".$is_shipping."',ship_price='".$ship_price."',arrive_date='".$arrive_date."',e_date='".$E_Date."',slug='".$slug."',active='".$status."',jsondata='".$dataset."' where productID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			    $qry="insert into product set productID='".$productID."',categoryID='".$category."',sub_categoryID='".$subcategory."',p_name='".$p_name."',SKU='".$SKU."',r_price='".$regular_price."',m_price='".$market_price."',is_sale='".$is_sale."',s_price='".$sell_price."',price='".$t_price."',weight='".$weight."',unit='".$unit."',description='".$desc."',full_desc='".$fulldesc."',image='".$Image."',img1='".$Image1."',img2='".$Image2."',img3='".$Image3."',img4='".$Image4."',GST='".$GST."',instock='".$instock."',is_shipping='".$is_shipping."',ship_price='".$ship_price."',arrive_date='".$arrive_date."',e_date='".$E_Date."',slug='".$slug."',active='".$status."',jsondata='".$dataset."' ";
		  }
	
		  $res=$db->TransQry($qry,$con);
		  if($res)
		  {
			$msg="Save Successfully";
			echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		  else
		  {
			$msg="Error in saving";
		  }
		  
		}
		else
		{
		  $msg="please enter mendetory field";
		}
	  // }
	  }
}

/* Get All Activated category */
	$qry="Select * FROM category where active=1 and parantID='0' order by name ASC;";
	$get_cat=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($get_cat);	
	$all_cat=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat1 =mysqli_fetch_assoc($get_cat))   	
		{		       			
			$all_cat[$i++]=$get_cat1;  	
		}	
	}
	
	
	/* Edit Product */
	$qry="Select p.*,c.name as cat_name FROM product p left join category c ON c.categoryID=p.categoryID";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_product=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($fetch1 =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$fetch1["productID"])
			{
				 $name = $fetch1["p_name"];
				 $image = $fetch1["image"];
				 $image1 = $fetch1["img1"];
				 $image2 = $fetch1["img2"];
				 $image3 = $fetch1["img3"];
				 $image4 = $fetch1["img4"];
				 $icon = $fetch1["icon"];
				 $p_catid = $fetch1["categoryID"];
				 $parantID = $fetch1["parantID"];
				 $sku = $fetch1["SKU"];
				 $description = $fetch1["description"];
				 $full_desc = $fetch1["full_desc"];
				 $r_price = $fetch1["r_price"];
				 $m_price = $fetch1["m_price"];
				 $s_price = $fetch1["s_price"];
				 $instock = $fetch1["instock"];
				 $weight = $fetch1["weight"];
				 $unit = $fetch1["unit"];
				 $ship_price = $fetch1["ship_price"];
				 $is_shipping = $fetch1["is_shipping"];
				 $is_sale = $fetch1["is_sale"];
			}
		$all_product[$i++]=$fetch;
  		
		}
	}
/* delete record query */
if(isset($delID) and $delID!=''){
  $delqry = mysqli_query($con, "DELETE FROM product WHERE productID='".$delID."'"); 
  $msg="Delete Successfully";
  echo '<meta http-equiv="refresh" content="2;URL=?route=product-list" />';
}
$StatusArr=array("","");
$StatusArr[$status]='checked="checked" ';
unset($db);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New Product
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Catelog</a></li>
        <li class="breadcrumb-item active">product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Product</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
		<form name="c_form" method="post" enctype="multipart/form-data">
		<p class="text-center" style="color:green;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Select Category</label>
				  <div class="col-sm-10">
					
				<select onchange="getCategory(this.value);" class="form-control select2" data-placeholder="Select Category" name="category" id="category">
                  <option value="0">None</option>
				<?php
					for($i=0;$i<count($all_cat);$i++)
					{
						
				?>
				  <option value="<?=$all_cat[$i]["categoryID"]?>" <?php if(isset($p_catid) and $p_catid!='' and $p_catid==$all_cat[$i]["categoryID"]) { ?> selected="selected" <?php }?>><?=$all_cat[$i]["name"]?></option>
					<?php } ?>
                </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Sub Category</label>
				  <div class="col-sm-10">
					
				<select class="form-control select2" multiple="multiple" data-placeholder="Select Category" name="subcategory" id="subcategory">
                  <option value="0">None</option>
				
                </select>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Product Name" type="text" value="<?=$name;?>" id="p_name" name="p_name">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">SKU</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="SKU" type="text" value="<?=$sku?>" id="SKU" name="SKU">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Product Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage" name="Pimage" />
					<input type="hidden" name="oldimage" id="oldimage" value="<?=$image?>"  />
					<?php if(isset($edID) and $edID!=''){ ?>
                        <img src="uploads/productImage/<?=$image?>" height='70'>
                      <?php } ?>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Image1</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage1" name="Pimage1" />
					<input type="hidden" name="oldimage1" id="oldimage1" value="<?=$image1?>"  />
					<?php if(isset($edID) and $edID!='' and $image1!=''){ ?>
                        <img src="uploads/productImage/<?=$image1?>" height='70'>
                      <?php } ?>
					
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Image2</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage2" name="Pimage2" />
					<input type="hidden" name="oldimage2" id="oldimage2" value="<?=$image2?>"  />
					<?php if(isset($edID) and $edID!='' and $image2!=''){ ?>
                        <img src="uploads/productImage/<?=$image2?>" height='70'>
                      <?php } ?>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Image3</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage3" name="Pimage3" />
					<input type="hidden" name="oldimage3" id="oldimage3" value="<?=$image3?>"  />
					<?php if(isset($edID) and $edID!='' and $image3!=''){ ?>
                        <img src="uploads/productImage/<?=$image3?>" height='70'>
                      <?php } ?>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Image4</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage4" name="Pimage4" />
					<input type="hidden" name="oldimage4" id="oldimage4" value="<?=$image4?>"  />
					<?php if(isset($edID) and $edID!='' and $image4!=''){ ?>
                        <img src="uploads/productImage/<?=$image4?>" height='70'>
                      <?php } ?>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
				  <div class="col-sm-10">
					 <textarea class="textarea" name="desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$description;?></textarea>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Full Description</label>
				  <div class="col-sm-10">
					 <textarea class="textarea" name="fulldesc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$full_desc;?></textarea>
				  </div>
				</div>
				
				<!--<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Select Tag</label>
				  <div class="col-sm-10">
					<select class="form-control select2" multiple="multiple" name="tag" data-placeholder="Select a State"
                        style="width: 100%;">
					  <option value="">Select Tag</option>
					  <option value="1">Tag1</option>
					  <option value="2">Tag2</option>
					  <option value="3">Tag3</option>
					 
                </select>
				  </div>
				</div>-->
				
				<!--<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Available For Sale</label>
				  <div class="col-sm-10">
					
					<input type="checkbox" id="sale" name="sale" class="filled-in chk-col-green" checked />
					<label for="sale"></label>
					
				  </div>
				</div>-->
				<h2>Price & Inventory:</h2>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">GST</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="GST" type="text" value="Default" disabled id="GST" name="GST">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Price</label>
				  <div class="col-sm-2">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$r_price;?>"  id="price" name="price">
				  </div>
				  
				  <label for="example-text-input" class="col-sm-1 col-form-label">Market Price</label>
				  <div class="col-sm-2">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$m_price;?>"  id="marketprice" name="marketprice">
				  </div>
				  <label for="example-text-input" class="col-sm-1 col-form-label">Sale</label>
				  <div class="col-sm-1">
					<input type="checkbox" id="is_sale" name="is_sale" class="filled-in chk-col-green" onchange="valueChanged()" <?php if(isset($is_sale) and $is_sale>0){echo " checked=\"checked\"";}?> />
					<label for="is_sale"></label>
				  </div>
				 <?php if(isset($is_sale) and $is_sale>0){?>
				  <label for="example-text-input" class="col-sm-1 col-form-label sellPrice">Selling Price</label>
				  <div class="col-sm-1 sellPrice">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$s_price;?>"  id="sell_price" name="sell_price">
				  </div>
				  <?php }else{ ?>
					<label style="display:none;" for="example-text-input" class="col-sm-1 col-form-label sellPrice">Selling Price</label>
				  <div style="display:none;" class="col-sm-1 sellPrice">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$s_price;?>"  id="sell_price" name="sell_price">
				  </div>  
					  
				  <?php }?>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Arrival Date</label>
				  <div class="col-sm-4">
					<input class="form-control" placeholder="Arrival Date" type="text" value="" id="datepicker" name="arrive_date">
				  </div>
				  <label for="example-text-input" class="col-sm-2 col-form-label">Quantity in stock</label>
				  <div class="col-sm-3">
					<input class="form-control" placeholder="Enter Quantity in stock" type="text" value="<?=$instock?>"  id="instock" name="instock">
				  </div>
				</div>
				
				<h2>Shipping:</h2>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Weight</label>
				  <div class="col-sm-3">
					<input class="form-control" placeholder="Enter Weight" type="text" value="<?=$weight?>" id="weight" name="weight">
				  </div>
				  <label for="example-text-input" class="col-sm-1 col-form-label">Unit</label>
				  <div class="col-sm-3">
					<input class="form-control" placeholder="Enter Unit" type="text" value="<?=$unit;?>" id="unit" name="unit">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Requires Shipping</label>
				  <div class="col-sm-2">
					<input type="checkbox" id="is_shipping" name="is_shipping"<?php if(isset($is_shipping) and $is_shipping>0){echo " checked=\"checked\"";}?> class="filled-in chk-col-green" onchange="isShipping()" />
					<label for="is_shipping"></label>
				  </div>
				  
				 
				</div>
				<?php if(isset($is_shipping) and $is_shipping>0){?>
				<div class="form-group row">
				
				 
				  <label style="" for="example-text-input" class="col-sm-2 col-form-label shipping">Shipping Price</label>
				  <div style="" class="col-sm-2 shipping">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$ship_price;?>"  id="ship_price" name="ship_price">
				  </div>
				</div>
				<?php }else{ ?>
					<div class="form-group row">
				
				 
				  <label style="display:none;" for="example-text-input" class="col-sm-2 col-form-label shipping">Shipping Price</label>
				  <div style="display:none;" class="col-sm-2 shipping">
					<input class="form-control" placeholder="0.00" type="text" value="<?=$ship_price;?>"  id="ship_price" name="ship_price">
				  </div>
				</div>
					
				<?php }?>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Active</label>
				  <div class="col-sm-10">
					
					<input type="checkbox" id="status" name="status" class="filled-in chk-col-green" checked />
					<label for="status"></label>
					
				  </div>
				</div>
				
				<div class="form-group row">
				 
				  <div class="col-sm-8">
					<input style="font-size: 18px;width: 7em;" class="btn btn-primary" type="submit" value="SUBMIT" id="submit" name="submit">
				  </div>
				</div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
		</form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    
      
    </section>
    <!-- /.content -->
  </div>
 
<script type="text/javascript">
function valueChanged()
{
    if($('#is_sale').is(":checked"))   
        $(".sellPrice").show();
    else
        $(".sellPrice").hide();
}
function isShipping()
{
    if($('#is_shipping').is(":checked"))   
        $(".shipping").show();
    else
        $(".shipping").hide();
}


function getCategory(val) {
	// alert(val);
	$.ajax({
	type: "POST",
	url: "model/gertResult.php",
	data:'catID='+val,
	success: function(data){
		// alert(data);
		$("#subcategory").html(data);
		// getCity();
	}
	});
}
</script>	
</body>

</html>
