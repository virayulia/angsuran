<!doctype html>
<?php
include('koneksi.php');
require_once('head.php');

$username = $_SESSION['username'];
$sql = "SELECT * FROM angsuran join pembayaran on angsuran.angsuran_id = pembayaran.angsuran_id join mahasiswa on pembayaran.mahasiswa_id = mahasiswa.mahasiswa_id WHERE mahasiswa.nim = '$username' ORDER by angsuran.angsuran asc";


?>
<body>
    <?php
    require_once('leftpanel.php');
    ?>

    <div id="right-panel" class="right-panel">
        <?php
            require_once('header.php');
        ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

<div class="animated fadeIn">
<div class="card">
<div class="card-header">
    <div class="pull-left">
        <strong>Data Angsuran</strong>
    </div>
</div>
<div class="card-body table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Angsuran</th>
                <th>Nominal</th>
                <th>Denda</th>
                <th>Sisa Angsuran</th>
                <th>Jumlah Sisa Angsuran</th>
                <th>Detail</th>
        
            </tr>
        </thead>
        <tbody>
            <?php
                if(!$result = $db->query($sql)){
                    die('Gagal Meminta Data');
                }
                while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row ['angsuran'] ?></td>
                    <td><?php echo $row ['nominal'] ?></td>
                    <td><?php echo $row ['denda'] ?></td>
                    <td><?php echo $row ['sisa_angsuran'] ?></td>
                    <td><?php echo $row ['jmlh_sisa_angsuran'] ?></td>
                    <td><a href="#" class="btn btn-primary">Detail</a>
                    </td>
                </tr>

        </tbody>
        <?php } ?>
    </table>
    </div>
</div>
</div>

</div>
            

        </div>
    </div>    

</body>
</html>