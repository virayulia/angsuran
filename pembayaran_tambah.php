<!-- tambah peserta kelas-->

<!DOCTYPE html>
<?php

    include('koneksi.php');
    require_once('head.php');
?>
<html>
<body>

<?php
    require_once('leftpanel.php');
?>

<?php

    $krs = mysqli_query($db, 'SELECT * from pembayaran');
    $kelas = mysqli_query($db,'SELECT * from angsuran');
    $mahasiswa = mysqli_query($db,'SELECT * from mahasiswa');


if(isset($_POST['submit'])){
    $angsuran_id = $_POST ['angsuran_id'];
    $mahasiswa_id = $_POST ['mahasiswa_id'];
  

    if ($angsuran_id!=null && $mahasiswa_id!=null){ //untuk cek apakah data telah diinputkan
        $ambil = mysqli_query($db,"SELECT mahasiswa_id FROM pembayaran WHERE mahasiswa_id='$mahasiswa_id'"); //untuk select mahasiswa yang ingin dicek
        if ($ambil->num_rows>0){ // untuk cek apakah data mahasiswa sudah ada di db
            $take = mysqli_query($db,"SELECT angsuran_id FROM pembayaran WHERE angsuran_id='$angsuran_id' and mahasiswa_id=$mahasiswa_id"); // untuk select data kelas yang ingin dicek
            if ($take->num_rows>0){ // untuk cek apakah data kelas sudah ada di db
                $msg = 1;
            } 
            else{
                $create="INSERT into pembayaran(angsuran_id, mahasiswa_id) values('$angsuran_id','$mahasiswa_id')";
                $sql = mysqli_query($db,$create);
                if ($sql){
                    $msg = 2;
                } 
            }
        }

        else {        
        $create="INSERT into pembayaran(angsuran_id, mahasiswa_id) values('$angsuran_id','$mahasiswa_id')";
        $sql = mysqli_query($db,$create);
            if ($sql){
                $msg = 2;
            } 
        }
    }
    else {
    echo "<script> alert('Silahkan Isi data!'); document.location.href = 'pembayaran_tambah.php'; </script>";
    }
}
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


<?php
    if (isset($msg)){
        if($msg==1){
        ?>
            <div class="alert alert-warning">Data sudah ada!</div>
            <br>
        <?php
        } else if ($msg==2){
        ?>

        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'pembayaran_tampil.php';
        </script>
        <br>
        <?php  
        }
    }
?>

            <div class="animated fadeIn">
            <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Peserta Angsuran</strong>
                </div>
                <div class="pull-right">
                    <a href="pembayaran_tampil.php" class="btn btn-success btn-sm"> 
                        <i class="fa">Back</i>
                    </a>
                </div>
            </div>



            <div class="card-body table-responsive">
            <form action="" method="post">
         
            <div class="mb-3"> 
            <label class="form-label">Angsuran</label>
             <br>
             <select name="angsuran_id" class="form-control">
             <option value="null" disabled selected> </option>
                <?php
                $query = $db->query("SELECT * from angsuran");
            
                while ($qtabel = $query->fetch_assoc())
                {
                    if($qtabel['angsuran']==$data->kelas_id){
                    echo '<option value="'.$qtabel['angsuran_id'].'" selected>'.$qtabel['angsuran'].'</option>';             
                    }else{
                    echo '<option value="'.$qtabel['angsuran_id'].'">'.$qtabel['angsuran'].'</option>';              
                    }
                }
                ?>
            </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
             <br>
             <select name="mahasiswa_id" class="form-control">
             <option value="null" disabled selected> </option>
                <?php
                $query = $db->query("SELECT * from mahasiswa");
            
                while ($qtabel = $query->fetch_assoc())
                {
                    if($qtabel['nama']==$data->mahasiswa_id){
                    echo '<option value="'.$qtabel['mahasiswa_id'].'" selected>'.$qtabel['nama'].'</option>';             
                    }else{
                    echo '<option value="'.$qtabel['mahasiswa_id'].'">'.$qtabel['nama'].'</option>';              
                    }
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form> 
    </div>
</div>
</div>

</body>
</html>

