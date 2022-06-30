<?php
if(isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
	$alert = 'alert';
    unset($_SESSION['flash_message']);
    //echo $message;
} else {
	$message = '';
	$alert = '';
	$alrt = 'display:none;';
}
?>

	<center>
	<form method="POST" action="<?= $a ?>" style="width: 60%;margin: 0px;padding:0px;">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Silahkan login terlebih dahulu</h1>
	  <div class="<?= $alert; ?> alert-danger" role="alert" style="<?= $alrt; ?>">
		<?= $message; ?>
	  </div>
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
	  <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
	  <br><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
	  <br><br>
    </form>
	</center>
	
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>