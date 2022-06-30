<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SISKA - SISTEM INFORMASI PENGUSULAN KARTU</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="<?= $base_url ?>/assets/style.css">

</head>
<body>
	<div>
		<img class="atas belakang" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/top.png"/>
		<img class="bawah belakang" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/bottom.png"/>
	</div>
	<?php
		require($menu_mobile_usr);
	?>
	<div class="container" style="padding:10px;margin-bottom: 20px;">
		<div class="row header">
			<div class="col-xs-12 text-center">
				<h1></h1>
			</div>
		</div>
		<div class="row">
			<?php
				require($menu_kiri_usr);
			?>
			<div class="col-md-8 second-column">
				<div class="bege bulat">
					<br>
					<?php require($cont.$konten.'.php'); ?>
				</div>
			</div>
		</div>
	</div>

<script>
function myFunction() {
	var x = document.getElementById("myLinks");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
		x.style.background= "rgba(0, 0, 0, 0.8)";
	}
}

</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function notifFunction() {
  document.getElementById("myNotif").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.ntfbtn')) {
    var notif = document.getElementsByClassName("notif-content");
    var i;
    for (i = 0; i < notif.length; i++) {
      var openNotif = notif[i];
      if (openNotif.classList.contains('show')) {
        openNotif.classList.remove('show');
      }
    }
  }
}
</script>
<!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
  <script  src="<?= $base_url ?>/assets/script.js"></script>

</body>
</html>
