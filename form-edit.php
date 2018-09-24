<?php
    require_once('koneksi.php');

    if($_GET['id']!=null){
        $id = $_GET['id'];

        $koneksiObj = new Koneksi();
        $koneksi = $koneksiObj->getKoneksi();

        if($koneksi->connect_error){
            echo "Gagal Koneksi : ". $koneksi->connect_error;
        }

        $query = "select * from user where id='$id'";
        $data = $koneksi->query($query);

    }
?>

<?php
    include_once('template/head.php');
?>
<body>
    
    <?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
                $id         = $row['id'];
                $username   = $row['username'];
                $nama       = $row['nama'];
                $email      = $row['email'];
                $password   = $row['password'];
            }
        }
    ?>

    <div class="row">
        <div class="container">
        <h2><i class="fa fa-pencil"></i> Form Edit Data</h2>
        <hr>
        <form class="form-horizontal" method="post" action="update.php">

            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" value="<?php echo $username;?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama;?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email" value="<?php echo $email;?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" value="<?php echo $password;?>" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <footer>
        <p class="text-center">Copyright &copy; 2018 by Fredy Nur Apriyanto</p>
    </footer>
</body>
<?php
    include_once('template/script.php');
?>
</html>

