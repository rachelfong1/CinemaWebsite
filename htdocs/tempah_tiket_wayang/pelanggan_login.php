<!--Memanggil fail header-->
<?PHP include('header.php'); ?>

<!-- link -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-


<div class="w3-row w3-margin-bottom w3-margin-top">
  <div class="w3-half w3-container w3-brown w3-margin-top w3-margin-bottom ">
    <!--Menyediakan form bagi daftar masuk pengguna-->
<h2>Daftar Masuk Pengguna</h2>
<form class= "w3-margin" action='' method='POST' autofocus>
Nokp Pengguna   <input class="w3-input w3-border w3-round-large" type='nom' name='nokp'><br>
Katalaluan      <input class="w3-input w3-border w3-round-large" type='password' name='katalaluan'><br>
                <input class= "w3-button w3-block w3-round-xlarge w3-khaki" type='submit' value='Daftar Masuk'>
</form>
  </div>
  
  

  
  <div class="w3-half w3-container">
    
	
	
	
  </div>
</div>



<!--isi kandungan-->
<div class = "w3-animate-zoom  w3-container w3-green w3-hoverable w3-hover-deep-orange" style="text-shadow:1px 1px 0 #444">



<h1><b>PROMOSI</b></h1>
<hr>
      
</div>

<!-- iklan 1 -->
<div class="w3-row">
  <div class="w3-third w3-container">
    <img src= "images/promo5.jpeg" class= "w3-image">
  </div>
  <div class="w3-third w3-container">
    <img src= "images/promo4.png" class= "w3-image">
  </div>
  <div class="w3-third w3-container">
    <img src= "images/promo3.png" class= "w3-image">
  </div>
</div>


<!-- iklan 2 -->
<div class="w3-row w3-center">
  <div class="w3-third w3-container">
    <h2 class="w3-lime">Notis Tiket Hari Lahir</h2>
	<p>Berkuat kuasa mulai 1 Januari 2020 - Ahli ALLSTAR perlu membuat sekurang-kurangnya 1 transaksi wang * dalam tempoh 12 bulan terakhir sebelum bulan ulang tahun ahli untuk mendapatkan Tiket Hari Lahir</P>
  </div>
  <div class="w3-third w3-container">
    <h2 class="w3-orange">Happy Hari Rabu </h2>
	<p>Nikmati filem hebat dengan harga berpatutan dan dapatkan 2x StarPoints pada hari Rabu untuk ahli ALLSTAR! Tertakluk kepada terma dan syarat</p>
  </div>
  <div class="w3-third w3-container">
    <h2 class="w3-amber">Masa Untuk Tayang!!!!</h2>
	<p>semua filem akan dikenakan bayaran RM10 pada 6-8 Julai. Terma dan syarat dikenakan.</p>
  </div>
</div>

 <!-- Memanggil fail footer-->
 <?PHP include('footer.php'); ?>

<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
    include ('connection.php');

    # mengambil data POST
    echo $nokp=$_POST['nokp'];
    echo $katalaluan=$_POST['katalaluan'];

    # arahan SQL untuk mencari data dari jadual pelanggan
    $arahan_sql_cari="select* 
    from pelanggan 
    where nokp_pelanggan='$nokp' and 
    katalaluan_pelanggan='$katalaluan'
    limit 1 ";

    # melaksanakan proses carian 
    $laksana_arahan=mysqli_query($condb,$arahan_sql_cari);

    # jika terdapat 1 baris rekod di temui
    if(mysqli_num_rows($laksana_arahan)==1)
    {
        # login berjaya
        # pembolehubah $rekod mengambil data yang di temui semasa proses mencari
        $rekod=mysqli_fetch_array($laksana_arahan);

        #mengumpukkan kepada pembolehubah session
        echo $_SESSION['nama_pelanggan']=$rekod['nama_pelanggan'];
        echo $_SESSION['nokp_pelanggan']=$rekod['nokp_pelanggan'];
        echo $_SESSION['notel_pelanggan']=$rekod['notel_pelanggan'];
        
        # mengarahkan fail index.php dibuka
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('login gagal');
        </script>";
    }
}
?>