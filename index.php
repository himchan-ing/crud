<?php
// Create database connection using config file
include "koneksi.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<nav>
    <ul>
    	<li><a href="mhs/tampil_mhs.php">Mahasiswa</a></li>
    	<li><a href="#">Input</a>
		<ul>
            	<li><a href="#">Anggota</a></li>
            	<li><a href="#">Buku</a></li>
            	<li><a href="#">Kategori Buku</a></li>
       	</ul>
        </li>
        <li><a href="#">Transaksi</a>
         	<ul>
             	<li><a href="#">Peminjaman</a></li>
             	<li><a href="#">Pengembalian</a></li>
         	</ul>
        </li>
         <li class="logout"><a href="logout.php" onClick="return confirm ('Yakin?')">Logout</a></li>
    </ul>
</nav>
</body>
</html>