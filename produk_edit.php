<?php 
require_once 'header_template.php';
include '../database.php';

    $query_select = 'SELECT * FROM produk WHERE idproduk = "'.$_GET['id'].'" ';
    $run_query_select = mysqli_query($connn, $query_select);
    $d = mysqli_fetch_object($run_query_select);



 ?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Edit Produk </h3>
        
        <div class="card">

        	<form action="" method="POST" enctype="multipart/form-data">
        		
            <div class="input-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value="<?= $d->namaproduk?>" required>
            </div>
            <div class="input-group">
                <label>Harga</label>
                <input type="text" name="harga" placeholder="Harga" class="input-control" value="<?= $d->hargaproduk?>"required>
            </div>
            <div class="input-group">
                <label>Deskripsi</label>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?= $d->deskripsi?></textarea>
            </div>
                <div class="input-group">
                <label>Kategori</label>
                <select class="input-control" name="kategori"> 
                <option value="">Pilih</option>
                <option value="Makanan" <?= ($d->kategori == 'Makanan') ? 'selected': '';?>>Makanan</option>
                <option value="Minuman" <?= ($d->kategori == 'Minuman') ? 'selected': '';?>>Minuman</option>
                </select>
            </div>
                <div class="input-group">
                <label>Foto</label>
                <input type="hidden" name="foto_lama" value="<?= $d->foto?>">
                <div>
                    <img src="../uploads/products/<?= $d->foto?>" width="200">
                </div>
                <input type="file" name="foto" required>
            </div>
            <h3>Extra Menu</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>NAMA</th>
                        <th>HARGA</th>
                        <th width="100">HAPUS</th>
                    </tr>
                </thead>
                <tbody id="extraMenuList">
                    

                    <?php 

                    $query_select_extra_menu =  'SELECT * FROM extra_menu WHERE idproduk = "'.$_GET['id'].'" ';
                    $run_query_select_extra_menu = mysqli_query($connn, $query_select_extra_menu);

                    while ($row = mysqli_fetch_array($run_query_select_extra_menu )) {

                     ?>

          <tr>
            <td><input type="text" name="extraname[]" class="input-control" value="<?= $row['nama']?>" required></td>
            <td><input type="text" name="extraharga[]" class="input-control"value="<?= $row['nama']?>" required></td>
            <td align="center"><button type="button" class="btn" onclick="removeRow(this)"><i class="fa fa-times"></i></button></td>
          </tr>

                     <<?php } ?>

                </tbody>
            </table>
            <div style="text-align:right;margin-top: 10px;">
                <button type="button" class="btn-submit" id="btnAdd">Tambah Extra Menu</button>
            </div>
            <div class="input-group">
                <button type="button" onclick="window.location.href = 'produk.php'" class="btn-back">Kembali</button>
                <button type="submit" name="submit" class="btn-submit">Simpan</button>
            </div>


        	</form>
        	<?php 

        	if(isset($_POST['submit'])) {

                //cek user upload file atauu tidakk
                if ($_FILES['foto']['error'] <> 4) {
                    # code...

                $name = $_FILES['foto']['name'];
                $tmp_name = $_FILES['foto']['tmp_name'];
                move_uploaded_file($tmp_name, '../uploads/products/' . $name);
            //hapus fiels yg sebelumnha 
                if (file_exists('../uploads/products/' . $_POST['foto_lama'])) {
                    unlink('../uploads/products/' . $_POST['foto_lama']);
                }



                }else {

                    $name = $_POST['foto_lama'];


                }

                //proses upload fiele

                //prodes updat data produ
                    $query_update = 'UPDATE produk SET 
                    namaproduk = "'.$_POST['nama'].'",
                    hargaproduk = "'.$_POST['harga'].'",
                    deskripsi = "'.$_POST['deskripsi'].'",
                    kategori = "'.$_POST['kategori'].'",
                    foto = "'.$name.'"
                    WHERE idproduk = "'.$_GET['id'].'"';

                    $run_query_update = mysqli_query($connn, $query_update );

                if (!$run_query_update)  {
                    echo 'Data produk diedti: '. mysqli_error($connn);
                    exit();
                }

                //proses delete ectramenu berdasarkan idproduk
                    $query_delete_extra = 'DELETE FROM extra_menu WHERE idproduk = "'.$_GET['id'].'"';
                    $run_query_delete_extra = mysqli_query($connn, $run_query_delete_extra);




                //proses insert data exyra menu
                    $sql = [];
                if (isset($_POST['extraname'])){ 

                    for ($i = 0; $i < count($_POST['extraname']); $i++) {

                            $sql[] = '("'.$_GET['id'].'", "'.$_POST['extraname'][$i].'", "'.$_POST['extraharga'][$i].'")';
                        }
                    }
                

                    $query_insert_extra_menu = 'INSERT INTO extra_menu (idproduk, nama, harga) VALUES ' . implode(",", $sql);
                    $run_query_insert_extra_menu = mysqli_query($connn, $query_insert_extra_menu);
                    if(!$run_query_insert_extra_menu)  {
                    echo 'Data produk diedti: '. mysqli_error($connn);
                    exit();
                }
                echo "<script>alert('data berhasil di edit')</script>";
                echo "<script>window.location = 'produk.php'</script>";
                    

        	}

        	?>


            
        </div>

    </div>
    
</div>
<script type="text/javascript">
    
    var btnAdd = document.getElementById("btnAdd")
    var extraMenuList =  document.getElementById("extraMenuList")

    btnAdd.addEventListener("click", function(e){
        e.preventDefault();

        var listItem = document.createElement('tr');

        listItem.innerHTML = `
          <tr>
            <td><input type="text" name="extraname[]" class="input-control" required></td>
            <td><input type="text" name="extraharga[]" class="input-control" required></td>
            <td align="center"><button type="button" class="btn" onclick="removeRow(this)"><i class="fa fa-times"></i></button></td>
          </tr>
        `;

        extraMenuList.appendChild(listItem);

    })

    function removeRow(e){
        e.closest('tr').remove();
    }


</script>

<?php 
require_once 'footer_template.php';
?>
