<?php
// include database connection file
include_once("../koneksi.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
 $nim = $_POST['nim'];
 
 $nama=$_POST['nama'];
 $tgl=$_POST['tgl'];
 $alamat=$_POST['alamat'];
 
 // update user data
 $result = mysqli_query($conn, "UPDATE mahasiswa SET 
nama_mhs='$nama',alamat='$alamat',tgl_lahir='$tgl' WHERE nim='$nim'");
 
 // Redirect to homepage to display updated user in list
 header("Location: tampil_mhs.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim=$id");
while($user_data = mysqli_fetch_array($result))
{
 $nim = $user_data['nim'];
 $nama = $user_data['nama_mhs'];
 $tgl = $user_data['tgl_lahir'];
 $alamat = $user_data['alamat'];
}
?>
<html>
<head>
 <title>Edit User Data</title>
</head>
<body>
 <a href="tampil_mhs.php">Home</a>
 <br/><br/>
 
 <form name="update_user" method="post" action="edit_mhs.php">
 <table border="0">
 <tr> 
 <td>Nim</td>
 <td><input type="text" name="nim" value='<?php echo $nim;?>' readonly></td>
 </tr>
 <tr> 
 <td>Nama</td>
 <td><input type="text" name="nama" value='<?php echo $nama;?>'></td>
 </tr>
 <tr> 
 <td>Tgl Lahir</td>
 <td><input type="date" name="tgl" value='<?php echo $tgl;?>'></td>
 </tr>
 <tr> 
 <td>Alamat</td>
 <td><input type="text" name="alamat" value='<?php echo $alamat;?>'></td>
 </tr>
 <tr>
 <td></td>
 <td><input type="submit" name="update" value="Update"></td>
 </tr>
 </table>
 </form>
</body>
</html>