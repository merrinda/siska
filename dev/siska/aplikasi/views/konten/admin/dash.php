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
	<div class="topnav show-mobile">
		<a href="#home" class="active">MENU</a>
		<hr class="garismenu">
		<div id="myLinks">
			<a href="#dash"><i class="fa fa-dashboard"></i> Dashboard</a>
			<a href="#ver"><i class="fa fa-list-alt"></i> Verifikasi</a>
			<a href="#report"><i class="fa fa-line-chart"></i> Report</a>
			<a href="#notif">
				<span><i class="fa fa-bell"></i> Notifikasi</span>
				<span class="tanda">3</span>
			</a>
			<hr class="garismenu">
			<a href="#setting"><i class="fa fa-gears"></i> Setting</a>
			<a href="#logout"><i class="fa fa-sign-out"></i> Logout</a>
		</div>
		<a href="javascript:void(0);" class="icon notification" onclick="myFunction()">
			<span><i class="fa fa-bars"></i></span>
			<span class="badge"><i class="fa fa-bell"></i></span>
		</a>
	</div>
	<div class="container" style="padding:10px;margin-bottom: 20px;">
		<div class="row header">
			<div class="col-xs-12 text-center">
				<h1></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 first-column hidden-mobile">
				<div class="bege-kiri bulat">
					<br>
					<div style="margin: 10px;">
						<img style="width:40%;margin:15px" class="" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/pentol.jpg"/>
						<hr class="garismenu">
						<h6>NAMA PEGAWAI, TITEL</h6>
						<h6>NIP. XXXXXXXXXXXXXXXXXX</h6>
						<hr class="garismenu">
						<ul>
							<li><a href="#dash"><h5><i class="fa fa-dashboard"></i> Dashboard</h5></a></li>
							<li><a href="#ver"><h5><i class="fa fa-list-alt"></i> Verifikasi</h5></a></li>
							<li><a href="#report"><h5><i class="fa fa-line-chart"></i> Report</h5></a></li>
						</ul>
						<hr class="garismenu">
						<ul>
							<li><a href="#home"><h6><i class="fa fa-gears"></i> Setting</h6></a></li>
							<li><a href="#news"><h6><i class="fa fa-sign-out"></i> Logout</h6></a></li>
						</ul>
						<br>
					</div>
				</div>
			</div>
			<div class="col-md-8 second-column">
				<div class="bege bulat">
					<br>
					<div style="margin: 0px;padding:0px;">
						<!--<div class="col-md-6">
							<form class="example" action="action_page.php">
								<input type="text" placeholder="Cari.." name="search">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>-->
						<div class="col-md-12 notif">
							<!--<div class="notif hidden-mobile show-mobile">--
								<i onclick="notifFunction()" class="fa fa-bell ntfbtn"></i>
								<div id="myNotif" class="notif-content">
									<a href="#home">Home</a>
									<a href="#about">About</a>
									<a href="#contact">Contact</a>
								</div>
							<!--</div>-->
							<a href="#notif" class="icon notification2 hidden-mobile">
								<span><i class="fa fa-bell"></i></span>
								<span class="badge2">3</span>
							</a>
						</div>
					</div>
					<div class="susuntombol" style="text-align:center!important;">
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARIS</p>
							<p class="tombol-l2">Kartu Istri</p>
						</button>
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARSU</p>
							<p class="tombol-l2">Kartu Suami</p>
						</button>
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARPEG</p>
							<p class="tombol-l2">Kartu Pegawai</p>
						</button>
					</div>
					<div style="margin: 35px;padding:10px;">
						<h3>SILAHKAN PILIH SALAH SATU MENU DIATAS!</h3>
					</div>
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
