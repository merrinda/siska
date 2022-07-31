<?php

$wrt = is_writable(__DIR__ .'/../../assets/file_dokumen/');
			echo "<script type='text/javascript'>alert('$wrt');</script>";