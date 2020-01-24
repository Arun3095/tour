<?php
if(isset($_SESSION['success']) and $_SESSION['success']!=''){
	?>
	<div class="alert alert-success alert-sm alert-msg">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['success']; ?>
	</div>
<?php
unset($_SESSION['success']);

}
if(isset($_SESSION['err']) and $_SESSION['err']!=''){
	?>
	<div class="alert alert-danger alert-sm alert-msg">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['err']; ?>
	</div>
<?php
unset($_SESSION['err']);

}