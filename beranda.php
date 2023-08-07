<?php 

    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online | Administrator</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1><a href="beranda.php">Admin PPDB</a></h1>
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="data-peserta.php">Data Peserta</a></li>
            <li><a href="beranda.php">Keluar</a></li>
        </ul>
    </header>
    
    <section class="content">
        <h2>Beranda</h2>
        <div class="box">
            <h3><?php echo $_SESSION['user'] ?>, Selamat datang di PPDB Online</h3>
        </div>
    </section>
</body>

</html>