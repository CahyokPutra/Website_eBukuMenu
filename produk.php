<?php 
require_once 'header_template.php';
include '../database.php';

    $query_select = 'SELECT * FROM produk';
    $run_query_select = mysqli_query($connn, $query_select);

    //cek jika ada parameters delete
    if(isset($_GET['delete'])) {
        // proses delete data
        $query_delete = 'DELETE FROM produk WHERE idproduk = "'.$_GET['delete'].'"';
        $run_query_delete = mysqli_query($connn, $query_delete);

        if($run_query_delete) {
            echo "<script>window.location = 'produk.php'</script>";
        }else{
            echo "<script>alert('data gagal dihpaus')</script>";
        }
    }
 ?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Produk</h3>
        
        <div class="card">
            <a href="produk_add.php" class="btn" title="Tambah Data"><i class="fa fa-plus"></i></a>

            <table class="table">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>FOTO</th>
                        <th>NAMA</th>
                        <th>HARGA</th>
                        <th>KATEGORI</th>
                        <th>DESKRIPSI</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($run_query_select) > 0){ ?>
                    <?php $nomor = 1; ?>
                    <?php while($row = mysqli_fetch_array($run_query_select)){ ?>

                    <tr>
                        <td align="center"><?= $nomor++ ?></td>
                        <td><img src="../uploads/products/<?= $row['foto'] ?>" alt="Ayam Goreng" widt="100"></td>
                        <td><?= $row['namaproduk'] ?></td>
                        <td><?= $row['hargaproduk'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td align="center">
                            <a href="produk_edit.php?id=<?= $row['idproduk'] ?>" class="btn" title="Edit Data"><i class="fa fa-edit"></i></a>
                            <a href="?delete=<?= $row['idproduk'] ?>" class="btn" onclick="return confirm('Yakin ingin dihapus?')"  title="Hapus Data"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php }}else{ ?>

                    <tr>
                        <td colspan="7">Tidak ada Data</td>
                    </tr>

                <?php  } ?>
                </tbody>
            </table>
            
        </div>

    </div>
    
</div>

<?php 
require_once 'footer_template.php';
?>