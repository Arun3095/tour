
<!DOCTYPE html>
<html>
<title>Welcome To Hills Traveler</title>
<!--Favicon-->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
<body>
	<form name="loginForm" id="loginForm"  method="post" action="">
		<div class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-6">
					<p>Email *</p>
					<input type="text" name="uemail" id="uemail" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-6">
					<p>Password *</p>
					<input type="password" name="password" id="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">


					<button class="btn btn-primary">Login</button>
				</div>
			</div>


		</div>
	</form>


	<script src="js/jquery-1.11.2.min.js"></script> 
	<script src="js/jquery.validate.js"></script>
	<script>
		/* Login Script */
		alert("hie");
		function insubmit()
		{
			alert("hissse");
			var uemail=document.getElementById("uemail").value;
			var passwd=document.getElementById("password").value;

			if($.trim(uemail).length>0 && $.trim(passwd).length>0)
			{
				$.ajax({
					type: "POST",
					url: "register.php",
					data: {email : uemail,passwd:passwd,typed:'Login' },
					success: function(data){

						if(data==1)
						{
				// alert(data);
				window.location.href= "ulogin.php";
			}
			else {
				$('#errorin').html(data);
				
			}
		}
	});

			} 
			return false;

		}
		$("#loginForm").validate({
			rules: {
				
				
				
				uemail: {
					required: true,
					email: true
				},
				
				password: {
					required: true,
					minlength: 4,
					maxlength: 20
				}
			},

			messages: {
				
				uemail: "Please enter a valid email address",
				
				password: {
					required: "Please enter your  password",
					
					minlength: "Minimum 4 character long",
					maxlength: "Your password maximum 20 character long"
				}
				
				
			}, 
			submitHandler: function(form) {
				insubmit();
			}
		}); 
	</script>

</body>
</html>
