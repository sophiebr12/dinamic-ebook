<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dinamic";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }


  // function koneksiDB(){
  //   $servername = "localhost";
  //   $username = "root";
  //   $password = "";
  //   $dbname = "dinamic";
  //   $conn = mysqli_connect($servername, $username, $password, $dbname);
  //   if (!$conn) 
  //     {
  //       die("Connection failed: " . mysqli_connect_error());
  //     }else{
  //       return $conn;
  //     }
  // }
  
  
  
  
  //   function insertData($data){
  //     $query = "INSERT INTO koleksi VALUES ('".$data['kodel_kol']."','".$data['judul_kol']."','".$data['penulis']."','".$data['tahun_terbit']."','".$data['kategori_kol']."','".$data['deskripsi']."','".$data['file']."';
  //     $result = mysqli_query(koneksiDB(), $query);
  //     if(!$result) {
  //       return 0;
  //     }else{
  //       return 1;
  //     }
  //   }