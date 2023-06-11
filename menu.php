<?php
// Create database connection using config file
include "koneksi.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}
?>
<HTML>
    <HEAD>
    <TITLE>Menu</TITLE>
    <style>
        body {
            background-color: rgb(66, 66, 66);
        }
        a {
            color: rgb(255, 0, 0);
            text-decoration: none;
        }
        ul {
            margin: 10;
            line-height: 2;
        }
    </style>
    </HEAD>
    <BODY>
    <font color="white" size="4">Menu</font>
    <font color="yellow" size="4">
    <ul type="square">
     <li><a href="mhs/tampil_mhs.php" target="kanan">Mahasiswa</a></li>
     <li><a href="GunungHonje.html" target="kanan">wisata</a></li>
     <li><a href="kontak.html" target="kanan">kontak</a></li>
	 <li><a href="Formulir.html" target="kanan">Reservasi</a></li>
     <li><a href="logout.php">logout</a></li>
    </ul></font>
    </BODY>
    </HTML>