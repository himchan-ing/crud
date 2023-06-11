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
 $nip = $_POST['nip'];
 
 $nama_dosen = $_POST['nama_dosen'];
 
 
 // update user data
 $result = mysqli_query($conn, "UPDATE dosen SET 
nama_dosen='$nama_dosen' WHERE nip='$nip'");
 
 // Redirect to homepage to display updated user in list
 header("Location: tampil_dos.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM dosen WHERE nip=$id");
while($user_data = mysqli_fetch_array($result))
{
 $nip = $user_data['nip'];
 $nama_dosen = $user_data['nama_dosen'];
}
?>
<html>
<head>
 <title>Edit User Data</title>
</head>
<body>
 <a href="tampil_dos.php">Home</a>
 <br/><br/>
 
 <form name="update_user" method="post" action="edit_dos.php">
 <table border="0">
 <tr> 
 <td>Nip</td>
 <td><input type="text" name="nip" value='<?php echo $nip;?>' readonly></td>
 </tr>
 <tr> 
 <td>Nama Dosen</td>
 <td><input type="text" name="nama_dosen" value='<?php echo $nama_dosen;?>'></td>
 </tr>
 <td></td>
 <td><input type="submit" name="update" value="Update"></td>
 </tr>
 </table>
 </form>
</body>
</html>