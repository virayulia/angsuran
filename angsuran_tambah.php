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
                        <h1>Kelas</h1>
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
                    <strong>Tambah Angsuran</strong>
                </div>
                <div class="pull-right">
                    <a href="angsuran_tampil.php" class="btn btn-success btn-sm"> 
                        <i class="fa">Back</i>
                    </a>
                </div>
            </div>

            <div class="card-body table-responsive">
            <form action="" method="post">
                    <div class="mb-3"> 
                      <label for="angsuran" class="form-label">Angsuran</label>
                      <br>
                        <select name="angsuran" class="form-control">
                         <option value="null" disabled selected> </option>
                         <option value="Angsuran 1">Angsuran 1</option>
                         <option value="Angsuran 2">Angsuran 2</option>
                         <option value="Angsuran 3">Angsuran 3</option>
                         <option value="Angsuran 4">Angsuran 4</option>
                         <option value="Angsuran 5">Angsuran 5</option>
                         <option value="Angsuran 6">Angsuran 6</option>
                         <option value="Angsuran 7">Angsuran 7</option>
                         <option value="Angsuran 8">Angsuran 8</option>
                         <option value="Angsuran 9">Angsuran 9</option>
                         <option value="Angsuran 10">Angsuran 10</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            </div>
            </div>
    <?php 

    if (isset($_POST['submit'])) {
        $angsuran = $_POST['angsuran'];

            $query = mysqli_query($db,"SELECT max(angsuran_id) as kodeTerbesar FROM angsuran");
            $data = mysqli_fetch_array($query);
            $urutan = $data['kodeTerbesar'];
        
            $urutan++; 
            $angsuran_id = $urutan;
            
            $result = mysqli_query($db,"INSERT INTO angsuran VALUES('$angsuran_id','$angsuran')") or die(mysqli_error($db));
            
            if ($result > 0) {
                echo "
                <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'angsuran_tampil.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'angsuran_tampil.php';
                </script>
                ";
            }
         
        }
        ?>

        </div>
    </div>    

</body>
</html>
