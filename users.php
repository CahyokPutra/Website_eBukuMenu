<?php 
require_once 'header_template.php';
include '../database.php';

    $query_select = 'SELECT * FROM users';
    $run_query_select = mysqli_query($connn, $query_select);

    //cek jika ada parameters delete
    if(isset($_GET['delete'])) {
        // proses delete data
        $query_delete = 'DELETE FROM users WHERE iduser = "'.$_GET['delete'].'"';
        $run_query_delete = mysqli_query($connn, $query_delete);

        if($run_query_delete) {
            echo "<script>window.location = 'users.php'</script>";
        }else{
            echo "<script>alert('data gagal dihpaus')</script>";
        }
    }
 ?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Beranda</h3>
        
        <div class="card">
            <a href="users_add.php" class="btn" title="Tambah Data"><i class="fa fa-plus"></i></a>

            <table class="table">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th width="100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($run_query_select) > 0){ ?>

                    <?php $nomor = 1; ?>
                    <?php while($row = mysqli_fetch_array($run_query_select)){ ?>

                    <tr>
                        <td align="center"><?= $nomor++ ?></td>
                        <td><?= $row['namalengkap'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td align="center">
                            <a href="users_edit.php?id=<?= $row['iduser'] ?>" class="btn" title="Edit Data"><i class="fa fa-edit"></i></a>
                            <a href="?delete=<?= $row['iduser'] ?>" class="btn" onclick="return confirm('Yakin ingin dihapus?')"  title="Hapus Data"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php }}else{ ?>

                    <tr>
                        <td colspan="4">Tidak ada Data</td>
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