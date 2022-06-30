<?php
//require('..\config\config.php');
require($_SERVER['DOCUMENT_ROOT'].'/dev/siska/aplikasi/config/config.php');
include $_SERVER['DOCUMENT_ROOT'].'/dev/siska/aplikasi/fungsi/query.php';
if(isset($_POST['x'])){
	session_start();
    if(function_exists($_POST['x'])) {    
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$tags = explode(',',$id);

			foreach($tags as $key) {    
				echo '"'.$key.'"<br/>';   
				$_POST['x']($key);
			}
			$_SESSION['flash_message'] = "Update Berhasil, silahkan cetak surat pengantar di halaman report dan download file pendukung dari halaman download berkas";
			header("Location: ".$base_url.'/admin/kirim_berkas');
		} else {
			echo 'id_usul undefined';
		}
        
    } else {
		echo 'function not found';
	}
}

if(isset($_GET['x'])){
    if(function_exists($_GET['x'])) {    
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$tags = explode(',',$id);

			foreach($tags as $key) {    
				echo '"'.$key.'"<br/>';   
				$_GET['x']($key);
			}
		} else {
			echo 'id_usul undefined';
		}
        
    } else {
		echo 'function not found';
	}
}

function olahzip($id){
	$zip = new ZipArchive();
    //$filename = "./myzipfile.zip";
	$filename = 'file_dokumen/'.$id.'.zip';

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        exit("cannot open <$filename>\n");
    }

    //$dir = 'includes/';
	$dir = 'file_dokumen/'.$id.'/';
//echo getcwd();
    // Create zip
    createZip($zip,$dir);

    $zip->close();
}

function createZip($zip,$dir){
    if (is_dir($dir)){
		
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){
                        
                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $s = $zip->addEmptyDir($dir.$file);
							
                            $t = $folder = $dir.$file.'/';
                            
                            // Read data of the folder
                            $u = createZip($zip,$folder);
							
                        }
                    }
                    
                }
                    
            }
            closedir($dh);
        }
    }
}

