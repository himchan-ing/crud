<?php
// Create database connection using config file
include_once("../koneksi.php");
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM dosen");
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
    <a href="add_dos.php">Add New Dosen</a><br/><br/>
        <table>
            <tr>
                <th>Nip</th> 
                <th>Nama Dosen</th> 
                <th>Aksi</th>
            </tr>
 <?php 
 while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>";
            echo "<td>".$user_data['nip']."</td>";
            echo "<td>".$user_data['nama_dosen']."</td>";
            echo "<td><a href='edit_dos.php?id=".$user_data['nip']."'>Edit</a> 
            | 
            <a href='delet_dos.php?id=".$user_data['nip']."'>Delete</a></td></tr>"; 
 }
 ?>
 </table>
</body>
</html>