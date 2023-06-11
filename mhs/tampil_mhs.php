<?php
// Create database connection using config file
include_once("../koneksi.php");
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<html>
<head> 
 <title>Homepage</title>
 <style>
 body{
    font-family: 'roboto';
 color: #000;
 }
 a{
 padding: 5px;
 text-decoration: none; 
 }
 table{
 border-collapse: collapse;
 width: 900;
 }
 
 th, td{
 padding: 10px 20px ;
 border: 1px solid #ccc;
 }
 </style>
</head>
<body>
    <a href="../index.php">Home</a>
    <a href="add_mhs.php">Add New User</a>
    <br/><br/>
        <table>
            <tr>
                <th>Nim</th> 
                <th>Nama Mahasiswa</th> 
                <th>Tanggal Lahir</th> 
                <th>Alamat</th> 
                <th>Aksi</th>
            </tr>
 <?php 
 while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>";
            echo "<td>".$user_data['nim']."</td>";
            echo "<td>".$user_data['nama_mhs']."</td>";
            echo "<td>".$user_data['tgl_lahir']."</td>"; 
            echo "<td>".$user_data['alamat']."</td>";
            echo "<td><a href='edit_mhs.php?id=".$user_data['nim']."'>Edit</a> 
            | 
            <a href='delet_mhs.php?id=".$user_data['nim']."'>Delete</a></td></tr>"; 
 }
 ?>
 </table>
</body>
</html>