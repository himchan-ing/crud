<?php
// include database connection file
include_once("../koneksi.php");
// Get id from URL to delete that user
$id = $_GET['id'];
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM matakuliah WHERE kode_mk=$id");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:tampil_mk.php");
?>