<?php
// include database connection file
include_once("../koneksi.php");
session_start();

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
 $kode_mk = $_POST['kode_mk'];
 
 $nama_mk=$_POST['nama_mk'];
 $sks=$_POST['sks'];
  
 // update user data
 $result = mysqli_query($conn, "UPDATE mahasiswa SET 
 nama_mk='$nama_mk',sks='$sks' WHERE kode_mk='$kode_mk'");
 
 // Redirect to homepage to display updated user in list
 header("Location: tampil_mk.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kode_mk=$id");
while($user_data = mysqli_fetch_array($result))
{
 $kode_mk = $user_data['kode_mk'];
 $nama_mk = $user_data['nama_mk'];
 $sks = $user_data['sks'];
 }
?>
<html>
<head>
 <title>Edit User Data</title>
</head>
<body>
 <a href="tampil_mk.php">Home</a>
 <br/><br/>
 
 <form name="update_user" method="post" action="edit_mk.php">
 <table border="0">
 <tr> 
 <td>Kode Matakuliah</td>
 <td><input type="text" name="kode_mk" value='<?php echo $kode_mk;?>' readonly></td>
 </tr>
 <tr> 
 <td>Nama Matakuliah</td>
 <td><input type="text" name="nama_mk" value='<?php echo $nama_mk;?>'></td>
 </tr>
 <tr> 
 <td>SKS</td>
 <td><input type="text" name="sks" value='<?php echo $sks;?>'></td>
 </tr>
  <tr>
 <td></td>
 <td><input type="submit" name="update" value="Update"></td>
 </tr>
 </table>
 </form>
</body>
</html>