<?php 
require_once 'header_template.php';
include '../database.php';

 ?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Tambah QR code </h3>
        
        <div class="card">


        	<form action="" method="POST">
        		
        		<div  class="input-group">
        			
        			<label>URL</label>
        			<input type="text" name="url" placeholder="URL" class="input-control" required>

        		</div>
        		 <div  class="input-group">
        			<button type="button" onclick="window.location.href = ' qrcode.php' " class="btn-back">Kembali</button>
        		 	<button type="submit" name="submit" class="btn-submit">Simpan</button>

        		</div>

        	</form>
        	<?php 

        	if(isset($_POST['submit'])) {

                //panggil lib qr

                require_once '../vendor/phpqrcode/qrlib.php';

                $qrname = time() . '.png';
        			
        			//proses input data
        			$query_insert = 'INSERT INTO qrcode (url, qrname) VALUES 
        			("'.$_POST['url'].'", "'.$qrname.'")';

        			$run_query_insert = mysqli_query($connn, $query_insert);

                    //generate qrcodeee
                    QRcode::png($_POST['url'], '../uploads/qrcode/' . $qrname);

        			if($run_query_insert) {
        			 	echo 'Simpan data berhasil!!';
        			 }else{

        			 	echo 'Simpan data gagal--';
        			 }

        	}

        	?>


            
        </div>

    </div>
    
</div>

<?php 
require_once 'footer_template.php';
?>
