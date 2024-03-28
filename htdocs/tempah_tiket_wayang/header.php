<?PHP 
#Memulakan fungsi session
session_start(); 
#Set rujukkan zon masa & tarikh
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRAW CINEMA</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/w3.css">
  </head>
<body>
<!-- tajuk -->
<div class= "w3-container w3-teal w3-text-sand" style= "font-style:italic">

  <h1><b>TRAW CINEMA</b></h1>
  <p><i>Jom Layan Wayang</i></p>
</div>

<!-- menu -->
<div class="w3-bar w3-gray">
  <a href="index.php" class="w3-bar-item w3-button">Laman Utama</a>
  
  <?PHP if(empty($_SESSION['nama_pelanggan'])) { ?>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button">Dftar</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="pelanggan_login.php" class="w3-bar-item w3-button">Daftar Ahli Masuk</a>
      <a href="pelanggan_daftar.php" class="w3-bar-item w3-button">Daftar Ahli Baru</a>
      </div>
  </div>
 
  
  <?PHP } else { ?>
  
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  
  <?PHP } ?>
  
</div>

<!-- isi kandungan -->
<div class= "w3-container w3-animate-zoom">                                       
</html>





<html>
  <head>
  <style>
  body
  { 
   background-color : pale green
  }
  </style>
  </head>
</html>
  
  
   
  