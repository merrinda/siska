<?php
$tgtgskpn = $tgtgpmlk = '';
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	//$tmtcp = $nokarpeg = $nosk = $tgskpn = $pmlk = $tgpmlk = 'required';
	$tmtcp = $nokarpeg  = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = 'datepicker';
	$sembunyi = '';
	$sembunyi2 = 'style="display:none;"';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" required>
			<option value="">Pilih Status Perkawinan</option>
			<option value="1">Perkawinan Pertama</option>
			<option value="2">Perkawinan Kedua atau selanjutnya</option>
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg  = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = 'datepicker';
	$sembunyi = '';
	$sembunyi2 = 'style="display:none;"';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" required>
			<option value="">Pilih Status Perkawinan</option>
			<option value="1">Perkawinan Pertama</option>
			<option value="2">Perkawinan Kedua atau selanjutnya</option>
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg = $nosk = $tgskpn = 'required';
	$pmlk = $tgpmlk = 'readonly style="background:black;"';
	$tgtgskpn = 'datepicker';
	$sembunyi = 'style="display:none;"';
	$sembunyi2 = '';
	$jandaduda = '
	<div class="row mb-3" style="display:none;">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="background:black;color:black;"></label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly style="background:black;">
			<option value=""></option>
		</select>
    </div>
	</div>
	';
}

$lhr = substr($_SESSION['nip'],0,8);
$th_lhr = substr($lhr,0,4);
$bl_lhr = substr($lhr,4,2);
$tg_lhr = substr($lhr,6,2);
$kel = substr($_SESSION['nip'],14,1);
if($kel == '1'){
	$jk = '<option value="1">Laki-Laki</option>';
} else {
	$jk = '<option value="2">Perempuan</option>';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Lengkapi detail usulan <?= $kartu ?>!</h4>
<br><br>
<form action="<?= $a; ?>" method="post">
  <div class="row mb-3">
    <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNIP" name="nip" value="<?= $_SESSION['nip'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $_SESSION['nama'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="tglhr" value="<?= $tg_lhr.'-'.$bl_lhr.'-'.$th_lhr ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenkel" required>
			<?= $jk; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Usul</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenis" required>
			<?= $o; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">TMT CPNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" placeholder=" Pilih TMT CPNS" id="tmtcp" name="tmtcp" <?= $tmtcp ?>>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi2 ?>>
    <label for="inputUnker" class="col-sm-2 col-form-label">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Masukkan No. SK PNS" id="inputUnker" name="noskpn" <?= $nosk ?>>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi2 ?>>
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= $tgtgskpn ?>" placeholder="Pilih Tanggal SK PNS" id="inputTglNkh" name="tgskpn" <?= $tgskpn ?>>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Isikan No. Karpeg, isi tanda - jika belum memiliki" id="inputUnker" name="karpeg" <?= $nokarpeg ?>>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi ?>>
    <label for="inputUnker" class="col-sm-2 col-form-label">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Isikan nama pemilik" id="inputUnker" name="namapemilik" <?= $pmlk ?>>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi ?>>
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= $tgtgpmlk ?>" placeholder=" Pilih tanggal lahir pemilik" id="inputTglNkh" name="tglpemilik" <?= $tgpmlk ?>>
    </div>
  </div>
  <?= $jandaduda ?>
  <div class="row mb-3">
    <label for="inputPasangan" class="col-sm-2 col-form-label">No. HP Aktif</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Isikan No. HP aktif" id="inputPasangan" name="nohp" required>
    </div>
  </div>
  
  <div align="right">
	<button type="submit" class="btn btn-primary">Selanjutnya</button>
  </div>
  <br><br>
</form>
<!--<button class="btn btn-danger" onclick="location.href='<?= $l ?>';">Selanjutnya</button>-->
</div>
</div>

