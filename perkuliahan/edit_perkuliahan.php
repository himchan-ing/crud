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
 $nim = $_POST['nim'];
 
 $kode_mk=$_POST['kode_mk'];
 $nip=$_POST['nip'];
 $nilai=$_POST['nilai'];
  
 // update user data
 $result = mysqli_query($conn, "UPDATE perkuliahan SET 
 kode_mk='$kode_mk',nip='$nip',nilai='$nilai' WHERE nim='$nim'");
 
 // Redirect to homepage to display updated user in list
 header("Location: tampil_perkuliahan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM perkuliahan WHERE nim= '$id' ");
$user_data = mysqli_fetch_array($result);
?>
<html>
<head>
 <title>Edit User Data</title>
</head>
<body>
 <a href="tampil_perkuliahan.php">Home</a>
 <br/><br/>
 
 <form name="update_user" method="post" action="edit_perkuliahan.php">
 <table border="0">
 <tr> 
                <td>Nim</td>
                <td>
                    <select name="nim">
                        <?php
                            $q = "select * from mahasiswa";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                                if($data ['nim'] == $user_data['nim']){
                                    $select = "selected";
                                }else
                                {
                                    $select = "";
                                }
                            echo "<option $select value=".$data['nim'].">".$data['nim']." | ".$data['nama_mhs']."</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>
            <tr> 
                <td>Kode Matakuliah</td>
                <td>
                <select name="kode_mk">
                        <?php
                            $q = "select * from matakuliah";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                             echo "<option value=".$data['kode_mk'].">".$data['kode_mk']." | ".$data['nama_mk']."</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>
            <tr> 
                <td>NIP</td>
                <td>
                <select name="nip">
                        <?php
                            $q = "select * from dosen";
                            $p = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($p))
                            {
                             echo "<option value=".$data['nip'].">".$data['nip']." | ".$data['nama_dosen']."</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>
            <tr> 
                <td>Nilai</td>
                <td><input type="text" name="nilai"></td>
            </tr>
            <tr> 
 <td></td>
 <td><input type="submit" name="update" value="Update"></td>
 </tr>
 </table>
 </form>
</body>
</html>