<script src="style/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="style/assets/js/popper.min.js"></script>
    <script src="style/assets/js/plugins.js"></script>
    <script src="style/assets/js/main.js"></script>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">Angsuran</a>
                <a class="navbar-brand hidden" href="">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <?php
                    if(@$_SESSION['level']=='admin') {?>
                    <!-- <li>
                        <a href="angsuran.php"> <i class="menu-icon fa fa-puzzle-piece"></i>Angsuran </a>
                    </li> -->
                    <li>
                        <a href="angsuran_tampil.php"> <i class="menu-icon fa fa-puzzle-piece"></i>Angsuran </a>
                    </li>
                    <li>
                        <a href="pembayaran_tampil.php"> <i class="menu-icon fa fa-puzzle-piece"></i>Pembayaran </a>
                    </li>
                    <li>
                        <a href="pertemuan_tampill.php"> <i class="menu-icon fa fa-puzzle-piece"></i>Pertemuan </a>
                    </li>
                    <?php 
                    } 
                    else {?>
                    <li>
                        <a href="tampil_mhs.php"> <i class="menu-icon fa fa-puzzle-piece"></i>Pembayaran </a>
                    </li>
                    <?php
                    }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->