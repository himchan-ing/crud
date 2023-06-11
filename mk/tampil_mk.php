<?php
// Create database connection using config file
include "../koneksi.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM matakuliah");
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
    <a href="add_mk.php">Add New Matakuliah</a>
    <a href="logout.php">Logout</a>
    <br/><br/>
        <table>
            <tr>
                <th>Kode Matakuliah</th> 
                <th>Nama Matakuliah</th> 
                <th>SKS</th> 
                <th>Aksi</th>
            </tr>
 <?php 
 while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>";
            echo "<td>".$user_data['kode_mk']."</td>";
            echo "<td>".$user_data['nama_mk']."</td>";
            echo "<td>".$user_data['sks']."</td>"; 
            echo "<td><a href='edit_mk.php?id=".$user_data['kode_mk']."'>Edit</a> 
            | 
            <a href='delet_mk.php?id=".$user_data['kode_mk']."'>Delete</a></td></tr>"; 
 }
 ?>
 </table>
</body>
</html>