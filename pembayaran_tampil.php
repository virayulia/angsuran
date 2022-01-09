<!doctype html>
<?php
include('koneksi.php');
require_once('head.php');

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
                        <h1>Peserta Angsuran</h1>
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
                    <strong>Data Peserta Angsuran</strong>
                </div>
                <div class="pull-right">
                    <a href="pembayaran_tambah.php" class="btn btn-success btn-sm"> 
                        <i class="fa fa-plus">Add</i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
    

    <table class="table table-bordered">
    <thead>
    <tr>
            <th>No</th>
            <th>Angsuran</th>
            <th>Nama</th>
            <th>Nominal</th>
            <th>Denda</th>
            <th>Sisa Angsuran</th>
            <th>Jumlah Sisa Angsuran</th>
            <th>Aksi</th>
    </tr>
    </thead>
    <?php
            $no = 1;
            $koneksi = new mysqli ("localhost","root","","angsuran");
            $sql = mysqli_query($koneksi, "SELECT * from pembayaran join angsuran on angsuran.angsuran_id=pembayaran.angsuran_id join mahasiswa on mahasiswa.mahasiswa_id=pembayaran.mahasiswa_id ORDER by angsuran.angsuran");
            

            while ($data = $sql->fetch_assoc()){
    ?>  
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $data['angsuran'];?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['nominal'];?></td>
        <td><?php echo $data['denda'];?></td>
        <td><?php echo $data['sisa_angsuran'];?></td>
        <td><?php echo $data['jmlh_sisa_angsuran'];?></td>
        <td>
            <a href="pembayaran_hapus.php?id=<?php echo $data['pembayaran_id'];?>"><button class="btn btn-danger" onClick="return edit()">Delete</button></a>       
        </td>
    </tr>
    <?php 
    }
    ?>
    <script>
        function edit(){
            tanya = confirm('Apakah Anda Yakin Ingin Hapus Data?');
            if(tanya==true) return true;
            else return false;
        }
    </script>
</table>
   