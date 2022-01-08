<!doctype html>
<?php
include('koneksi.php');
require_once('head.php');

$sql="SELECT * FROM angsuran ORDER by angsuran asc";
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
                        <h1>Angsuran</h1>
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
                <div class="pull-right">
                    <a href="angsuran_tambah.php" class="btn btn-success btn-sm"> 
                        <i class="fa fa-plus">Add</i>
                    </a>
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
                            <th>Action</th>
                    
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
                                <td><a href="kelas_edit.php?kelas_id=<?= $row['angsuran_id']; ?>" class="btn btn-warning" onClick="return edit()">Edit</a>
                                    <a href="kelas_detail.php?kelas_id=<?= $row['angsuran_id']; ?>" class="btn btn-primary" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>

                    <script>
                        function edit(){
                            tanya = confirm('Apakah Anda Yakin Ingin Mengedit Data?');
                            if(tanya==true) return true;
                                    else return false;
                        }
                    </script>

                    </tbody>
                    <?php } ?>
                </table>
                </div>
            </div>
            </div>

        </div>
    </div>    

</body>
</html>