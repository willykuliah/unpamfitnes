<?php 
error_reporting(E_ALL);  ini_set('display_errors', '1');

$conn = new mysqli('localhost','root','password','db'); if($conn->connect_error){die('Koneksi gagal: ' . $conn->connect_error);} ?>