<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include 'koneksi.php';

$id = $_GET['id'];
// Hapus file gambar jika ada
$result = $conn->query("SELECT gambar FROM berita WHERE id=$id");
$data = $result->fetch_assoc();
if($data['gambar']){
    unlink("uploads/".$data['gambar']);
}

$conn->query("DELETE FROM berita WHERE id=$id");
header("Location: index.php");
exit();
?>
