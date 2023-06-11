<?php
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}

?>
<html>
<head>
 <title>Add Dosen</title>
</head>
<body>
    <a href="tampil_dos.php">Go to Home</a>
        <br/><br/>
            <form action="add_dos.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr> 
                    <td>Nip</td>
                    <td><input type="text" name="nip"></td>
                </tr>
                <tr> 
                    <td>Nama Dosen</td>
                    <td><input type="text" name="nama dosen"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
             </form>
 
 <?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
    $nip = $_POST['nip'];
    $nama_dosen = $_POST['nama_dosen'];
    
    // include database connection file
    include_once("koneksi.php");
    
    // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO dosen (nip,nama_dosen) 
    VALUES('$nip','$nama_dosen')");
    
    // Show message when user added
    echo "User added successfully. <a href='tampil_dos.php'>View Dosen</a>";
    }
 ?>
</body>
</html>