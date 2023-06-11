<?php
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}

?>
<html>
<head>
 <title>Add Matakuliah</title>
</head>
<body>
    <a href="tampil_mk.php">Go to Home</a>
        <br/><br/>
            <form action="add_mk.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr> 
                    <td>Kode Matakuliah</td>
                    <td><input type="text" name="kode_mk"></td>
                </tr>
                <tr> 
                    <td>Nama Matakuliah</td>
                    <td><input type="text" name="nama_mk"></td>
                </tr>
                <tr> 
                    <td>SKS</td>
                    <td><input type="text" name="sks"></td>
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
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
        
    // include database connection file
    include_once("koneksi.php");
    
    // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO matakuliah(kode_mk,nama_mk,sks) 
    VALUES('$kode_mk','$nama_mk','$sks')");
    
    // Show message when user added
    echo "User added successfully. <a href='tampil_mk.php'>View Matakuliah</a>";
    }
 ?>
</body>
</html>