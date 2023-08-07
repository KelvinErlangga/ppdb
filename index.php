<?php 

    include 'koneksi.php';
    if(isset($_POST['submit'])) {

        // ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter saja dari sebelah kanan
        $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5))AS id FROM tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxId);
        $generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1); 

        // insert
        $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES(
           '".$generateId."',
           '".date('Y-m-d')."',
           '".$_POST['th_ajaran']."',
           '".$_POST['jurusan']."',
           '".$_POST['nm']."',
           '".$_POST['tmpt_lahir']."',
           '".$_POST['tgl_lahir']."',
           '".$_POST['jk']."',
           '".$_POST['agama']."',
           '".$_POST['alamat']."'
        )");
        if ($insert) {
            echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
        } else {
            echo 'Gagal Mengirimkan Data', mysqli_error($conn);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <!-- bagian box formulir -->
    <section class="box-formulir">
        <h2>Formulir Pendaftaran Siswa Baru SMA</h2>

        <!-- bagian form -->
        <form action="" method="post">
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="th_ajaran" class="input-control" value="2023/2024" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select class="input-control " name="jurusan">
                                <option value="">--Pilih--</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <h3>Data Diri Calon Siswa</h3>
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nm" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tmpt_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="tgl_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jk" class="input-control" value="Laki-laki"> Laki-laki &nbsp;
                            &nbsp; &nbsp;
                            <input type="radio" name="jk" class="input-control" value="Perempuan"> Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="agama">
                                <option value="">--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td>
                            <textarea class="input-control" name="alamat"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </section>

</body>

</html>


<!--
onfocus="hilangkanKalimatBayangan()" onblur="tampilkanKalimatBayangan()" placeholder="Contoh: 2022/2023"
<script>
  function hilangkanKalimatBayangan() {
    var input = document.getElementById('tahun');
    input.placeholder = '';
  }

  function tampilkanKalimatBayangan() {
    var input = document.getElementById('tahun');
    input.placeholder = 'Contoh: 2022/2023';
  }
</scrip>
!>