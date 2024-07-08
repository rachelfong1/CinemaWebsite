<!-- Memanggil fail header-->
<?PHP include('header.php'); ?>

<div class="w3-row w3-margin-bottom w3-margin-top">

  <div class="w3-half w3-container w3-lime">
  <!-- Menyediakan borang untuk mendaftar pelanggan baru-->
<h3>Daftar Masuk ahli</h3>
<form class= "w3-margin" action='' method='POST'>
Nama pelanggan         <input class="w3-input w3-border w3-round-large" type='text' name='nama'><br>
Nokp ahli         <input class="w3-input w3-border w3-round-large" type='text' name='nokp'><br>
No Tel ahli       <input class="w3-input w3-border w3-round-large" type='text' name='notel'><br>
Katalaluan ahli   <input class="w3-input w3-border w3-round-large" type='password' name='katalaluan'><br>
                  <input class= "w3-button w3-block w3-round-xlarge w3-light-green" type='submit' value='Submit'>
</form>

  </div>
  
  <div class="w3-half w3-container">
    
	<img src = "images/member.png" class = "w3-image">
	
	
  </div>
</div>


<div class = "w3-animate-left w3-text-white w3-text-xlarge w3-container w3-black w3-hover-brown" style="text-shadow:1px 1px 0 #444">

<h1><b>ABOUT TRAW</b></h1>
      
</div>






<div class="w3-panel w3-border-left w3-border-black w3-container w3-blue-gray">
  <h2>TRAW CINEMA</h2>
  <p>Since first opening our doors in 1994, we’ve entertained countless moviegoers with memories of a special day out.

From the latest blockbusters to intimate dramas, with a dash of documentaries, sports and culture also in the mix, TRAW’s diverse range of entertainment means there’s something for everyone.

Pamper yourself in the trappings of Malaysia’s premier classic cinema, TRAW Indulge, or lounge in the blissful comfort of our Beanieplex halls. Why not bring your kids for some Family Friendly fun, or treat your eyes to the astonishing clarity of the world's largest cinema LED screen, Samsang ONYX. The choice is yours!

We also take pride in the flavour-rich quality of our food & beverages, offering the best popcorn in town. We count ourselves lucky and feel immensely proud to have played a small part in big moments; from the first time that kids see their superheroes come to life on the big screen, to the innocent beauty of a first date.

At TRAW, it’s not just about movies - it’s a total entertainment experience.</P>


   

  

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
    $nama=$_POST['nama'];
    $notel=$_POST['notel'];
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];

    # -- data validation --
    if(empty($nama) or empty($notel) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }

    # --- data validation bilangan nokp dan semak aksara
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('Ralat pada nokp');
        window.history.back();</script>");
    }
 
    # arahan SQL untuk menyimpan data ke dalam jadual pelanggan
    $arahan_sql_simpan="insert into pelanggan
    (nama_pelanggan,nokp_pelanggan,notel_pelanggan,katalaluan_pelanggan)
    values
    ('$nama','$nokp','$notel','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat if
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # jika proses menyimpan berjaya. papar info dan buka laman pelanggan_login.php
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='pelanggan_login.php';</script>";
    }
    else
    {
        # jika proses menyimpan gagal, kembali ke laman sebelumnya
        echo "<script>alert('Pendaftaran gagal');
        window.history.back();</script>";
    }
}
?>


