<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SISKA - SISTEM INFORMASI PENGUSULAN KARTU</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="<?= $base_url ?>/assets/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

</head>
<body>
	<div>
		<img class="atas belakang" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/top.png"/>
		<img class="bawah belakang" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/bottom.png"/>
	</div>
	<?php
		require($menu_mobile);
	?>
	<div class="container" style="padding:10px;margin-bottom: 20px;">
		<div class="row header">
			<div class="col-xs-12 text-center">
				<h1></h1>
			</div>
		</div>
		<div class="row">
			<?php
				require($menu_kiri);
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
  <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
  <script  src="<?= $base_url ?>/assets/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
	</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	// Check/Uncheck ALl
	$('#checkAll').change(function(){
		if($(this).is(':checked')){
			$('input[name="update[]"]').prop('checked',true);
			$('#tombol_kirim').prop('disabled',false);
		}else{
			$('input[name="update[]"]').each(function(){
				$(this).prop('checked',false);
			});
			$('#tombol_kirim').prop('disabled',true);
		}
	});

	// Checkbox click
	$('input[name="update[]"]').click(function(){
		var total_checkboxes = $('input[name="update[]"]').length;
		var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
							
		if(total_checkboxes_checked == total_checkboxes){
			$('#checkAll').prop('checked',true);
		}else{
			$('#checkAll').prop('checked',false);
		}
		if(total_checkboxes_checked == 0){
			$('#tombol_kirim').prop('disabled',true);
		} else {
			$('#tombol_kirim').prop('disabled',false);
		}
	});
});
</script>
</body>
</html>
