<?php 
require_once 'header_template.php';
include '../database.php';

    $query_select = 'SELECT * FROM qrcode WHERE idqrcode = "'.$_GET['id'].'"';
    $run_query_select = mysqli_query($connn, $query_select);
    $d = mysqli_fetch_object($run_query_select);

 ?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Detail QR CODE</h3>
        
        <div class="card">

            <img src="../uploads/qrcode/<?= $d->qrname?>" width= "200" alt="QR Code">
 
         <button type="button" onclick="window.location = 'qrcode.php'" class="btn-back">Kembali</button>
            
        </div>

    </div>
    
</div>

<?php 
require_once 'footer_template.php';
?>