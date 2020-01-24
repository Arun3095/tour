<?php
$db=new dbclass();
$con=$db->Connection();
$oldpassword=isset($_REQUEST["oldpassword"])?$_REQUEST["oldpassword"]:"";
$oldpassword=$oldpassword;
$password=isset($_REQUEST["password"])?$_REQUEST["password"]:"";
$password=$password;
$FType=30;
$msg="";

if(isset($_REQUEST["save"]))
{
 /*  $check="Select Password from mst_user Where UserName='".$SesUserName."'";
  $check2=$db->SelectQry($check,$con);
$checkrow2 = mysqli_num_rows( $check2 );
// if($checkrow2 ==1)
// {
  $checkRow2 =mysqli_fetch_array($check2,$con);
  if($checkRow2["Password"]==$oldpassword)
  { */
    $dataset=json_encode($_REQUEST);
   $InsQry="UPDATE `mst_user` SET `Password`='".$password."' where ID='1';";//exit;
  
      $res=$db->TransQry($InsQry,$con);
      if($res)
      {
        $msg="Save Successfully";
        echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
      }
      else
      {
        $msg="Error in saving";
      }
      unset($db);
    /* }
	else{
		$msg="Error in saving : Password Not Match";
	} */
  // }
  // else
  // {
    // $msg="Error in saving : please Enter Correct old Password";
  // }
}
unset($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="assets/bootstrap/css/select2.css" rel=stylesheet type="text/css"/>
<link href="assets/bootstrap/css/style2.css" rel=stylesheet type="text/css"/>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/select2.js"></script> 
<script src="assets/bootstrap/js/zebra_datepicker.js"></script>

</head>
<body>
<div class="row">
<div class="col-sm-12">
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>Master Proof Type</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
              <form class="form-horizontal" role="form" enctype="multipart/form-data" action="#" name="frm" method="post" id="frm">
                  <p align="center"><strong style="color:#F00">
              <?=$msg?>
              </strong></p>
                    <div class="panel-body">
                   
                   <div class="col-md-12 form-group ">
                      <label for="oldpassword" class="col-md-3">Old Password<span class="mendetory">*</span></label>
                          <div class="col-md-9 input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <div class="acr">
                              <input id="oldpassword" type="password" class="form-control" name="oldpassword" value="" placeholder="Enter Old Password">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-12 form-group">
                          <label for="password" class="col-md-3">New Password<span class="mendetory">*</span></label>
                          <div class="col-md-9 input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <div class="acr">
                              <input id="password" type="password" class="form-control" name="password" value="" placeholder="Enter New Password">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-12 form-group">
                          <label for="confirmpassword" class="col-md-3">&nbsp;&nbsp;&nbsp;Confirm<span class="mendetory">*</span></label>
                          <div class="col-md-9 input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="confirmpassword" type="password" class="form-control" name="confirmpassword" value="" placeholder="Confirm New Password"><span id="matcherr"></span>
                          </div>
                    </div>
                   
                    
                    </div>
                    <p align="center"><input type="submit" name="save" value="Save" id="save" class="btn btn-primary" /></p>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
function Success(el)
{
	$("#"+el).removeClass("form-control-success");
	$("#"+el).parent(".acr").removeClass("successcls has-success");
	$("#"+el).parent(".acr").addClass("dangercls has-danger");
	$("#"+el).addClass("form-control-danger");

}
function Danger(nm)
{
	$("#"+nm).parent(".acr").addClass("successcls has-success");
	$("#"+nm).parent(".acr").removeClass("dangercls has-danger");

	$("#"+nm).removeClass("form-control-danger");
	$("#"+nm).addClass("form-control-success");
}

$('#name').change(function (e){
    if($("#name").val().length <2)
    {
		Success("name");
    }
    else
    {
		Danger("name");
    }
});
$("#confirmpassword").keyup(checkPasswordMatch);
$("#save").click(function()
{
   var password = $("#password").val();
  var confirmPassword = $("#confirmpassword").val();
 if(password != confirmPassword)
    {  
      $("#matcherr").html("Passwords do not match!");
      $("#confirmpassword").css("color", "red");
      return false;
    }
if($("#password").val().length <4)
  {
      $("#password").css("border", "1px solid #1db464");
      $("#password").focus();
      return false;
  }
 /*  if($("#oldpassword").val() =='')
  {
      $("#oldpassword").css("border", "1px solid #1db464");
      $("#oldpassword").focus();
      return false;
  } */
  if($("#name").val() =='')
  {
      $("#name").css("border", "1px solid #1db464");
      $("#name").focus();
      return false;
  }

  
});
function checkPasswordMatch() {
  //alert(1);
    var password = $("#password").val();
    var confirmPassword = $("#confirmpassword").val();

    if (password != confirmPassword)
  {
        $("#matcherr").html("Passwords do not match!");
        $("#matcherr").css("color", "red");
    $("#confirmpassword").css("color", "red");
    return false;
  }
   else
  {
    $("#matcherr").css("color", "red");
        $("#matcherr").html("Passwords match.");
        $("#confirmpassword").css("color", "green");
  }
}
</script>