

<?PHP 
session_start(); 
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<!DOCTYPE html>
<html>
<head>
<title>TRAW CINEMA</title>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="w3-container w3-dark-gray ">
<h1><b>SECTION ADMIN:TRAW CINEMA</b></h1>
<i>Together We Go Far</i>
<hr>
<center>

<div class="w3-row">
<div class="w3-third w3-container ">
  </div>

 <div class="w3-third w3-margin-bottom w3-margin-top w3-container w3-gray">
   
  
    <h2><b>Administrator</b></h2> 
      <div class="w3-panel w3-leftbar w3-border-red w3-pale-blue">
	    <p>Sila daftar Masuk</p>
	</div>	
	<div class="w3-panel w3-leftbar w3-border-red w3-pale-blue">
	  <p ><i>Jangan dedahkan katalaluan anda kepada orang lain</i></p>  
	</div>
    <div class="w3-panel w3-leftbar w3-border-red w3-pale-blue">
	  <p ><i>Tukar katalaluan anda secara berkala</i></p>  
	</div>
    
    
	
	<form action='' method='POST'>
    Nokp Pengguna 
    <input class="w3-input w3-round-xlarge " type='text' name='nokp' autofocus><br>
    Katalaluan 
    <input class="w3-input w3-round-xlarge " type='password' name='katalaluan'><br>
    <input class="w3-button w3-margin-bottom w3-margin-top w3-block w3-round-xlarge w3-lime" type='submit' value='Daftar Masuk'>
    </form>

  
  </div>
  
  <div class="w3-third w3-container ">
    
  </div>
</div>


    </center>


</html>


<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
    include ('../connection.php');
	

    # mengambil data POST
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];
	
	
    # arahan SQL untuk mencari data dari jadual admin
    $arahan_sql_cari="select* 
    from admin 
    where nokp_admin='$nokp' and 
    katalaluan_admin='$katalaluan'
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
        $_SESSION['nama_admin']=$rekod['nama_admin'];
        $_SESSION['nokp_admin']=$rekod['nokp_admin'];
        
        # mengarahkan fail index.php dibuka
        echo "<script>window.location.href='laman_utama.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('login gagal');
        window.history.back();</script>";
    }
}
?>

<?PHP include ('footer_admin.php'); ?>