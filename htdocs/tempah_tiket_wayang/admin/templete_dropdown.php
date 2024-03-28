<?PHP
# memulakan fungsi session 
session_start(); 

#----------------- Bahagian login & logout Session ------------
if(empty($_SESSION['nokp_admin']))
{
    die("<script>alert('Sila daftar Masuk');
    window.location.href='index.php';</script>");
}
date_default_timezone_set("Asia/Kuala_Lumpur");
?>


<!DOCTYPE html>
<html>
<head>
   <title>admin</title>
   <!-- meta link -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
   <!-- script -->
   
   <script>
  function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
  function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>


<script>
function resizeText(multiplier) {
    var elem = document.getElementById("saiz");
    var currentSize = elem.style.fontSize || 1;
    if(multiplier==2)
    {
        elem.style.fontSize = "1em";
    } 
    else 
    {
        elem.style.fontSize = ( parseFloat(currentSize) + (multiplier * 0.2)) + "em";
    }
}
</script>
   
</head>
<body>


<!-- tajuk -->
    <div class="w3-container w3-dark-gray">
	  <h1>SECTION ADMIN: TRAW CINEMA</h1>
	</div>

<!-- menu -->

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  
  

   <a class="w3-bar-item w3-button" href="laman_utama.php">Laman Utama</a>
   <a class="w3-bar-item w3-button" href="maklumat_pelanggan.php">Maklumat Pelanggan</a>
   <a class="w3-bar-item w3-button" href="maklumat_filem.php">Maklumat Filem</a>
   <a class="w3-bar-item w3-button" href="maklumat_tayangan.php">Maklumat Tayangan</a>
   <a class="w3-bar-item w3-button" href="maklumat_tempahan.php">Maklumat Tempahan</a>
   <a class="w3-bar-item w3-button" href="maklumat_admin.php">Maklumat Admin</a>
   <a class="w3-bar-item w3-button" href="analisis.php">Analisis</a>
   <a class="w3-bar-item w3-button" href="upload.php" >Upload Tayangan</a>
   <a class="w3-bar-item w3-button" href="../logout.php?id=admin">Logout</a> 
<hr>

  
  
  
  
  
  
  
</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h4></h4>
  </div>
</div>

<!-- isi kandungan -->
    <div class="w3-container w3-animate-zoom">
	  <h1>Isi Kandungan</h1>
	</div>

<!-- footer -->
    <div class="w3-container w3-animate-zoom w3-dark-gray">
	  <p>Hak Cipta Terpelihara &copy: (2020) Rachel Fong Tong Wen</p>
	</div>



</body>

</html>   