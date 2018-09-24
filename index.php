<?php 
    include_once('template/head.php');
?>
<body>
    <div class="row">
        <div class="container">
            <h2><i class="fa fa-users"></i> Contoh CRUD</h2>
            <hr>
            <a href="input.php" class="btn btn-success"><i class="fa fa-plus"></i> Input Data</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once('koneksi.php');
                    $no = 1;

                    $koneksiObj = new Koneksi();
                    $koneksi = $koneksiObj->getKoneksi();

                    if($koneksi->connect_error){
                        echo "Gagal Koneksi : ". $koneksi->connect_error;
                        echo "</td></tr>";
                    }

                    $query = "select * from user";
                    $data = $koneksi->query($query);
                    if($data->num_rows <= 0){
                        echo "<tr>";
                        echo "<td colspan='5' class='text-center'><i>Tidak ada data</i></td>";
                        echo "</tr>";
                    } else{
                        while($row = $data->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td class='center'>".$row['username']."</td>";
                            echo "<td>".$row['nama']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo '<td class="text-center"><a href="form-edit.php?id='.$row['id'].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>';
                            echo ' <a href="hapus.php?id='.$row['id'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>';
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
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
