<?php
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}

?>
<html>
<head>
 <title>Add Users</title>
</head>
<body>
    <a href="tampil_mhs.php">Go to Home</a>
        <br/><br/>
            <form action="add_mhs.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr> 
                    <td>Nim</td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <tr> 
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr> 
                    <td>Tgl Lahir</td>
                    <td><input type="date" name="tgl"></td>
                </tr>
                <tr> 
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
             </form>
 
 <?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl = $_POST['tgl'];
    
    // include database connection file
    include_once("koneksi.php");
    
    // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat) 
    VALUES('$nim','$nama','$tgl', '$alamat')");
    
    // Show message when user added
    echo "User added successfully. <a href='tampil_mhs.php'>View Mahasiswa</a>";
    }
 ?>
</body>
</html>