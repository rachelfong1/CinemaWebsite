<?PHP 
# Memanggil fail header.php
include ('header.php'); 

# Memanggil fail connection.php
include ('connection.php');

#fungsi untuk memaparkan masa tayangan 
function laksana_masa($tarikh,$id_filem)
{
  # Memanggil fail connection.php
  include ('connection.php');
  

  # arahan untuk mencari masa tayangan bagi filem yang di pilih
  $arahan="select* from tayangan, filem, masa_tayangan, pawagam
  WHERE
  tayangan.id_pawagam=pawagam.id_pawagam AND
  tayangan.id_masa=masa_tayangan.id_masa AND
  tayangan.id_filem=filem.id_filem AND
  tayangan.id_filem='".$_GET['id_filem']."' and
  tayangan.tarikh ='$tarikh'";
  echo"<ul>";

  #melaksanakan arahan carian masa tayangan bagi filem yang di pilih
  $laksanakan_arahan=mysqli_query($condb,$arahan);
  
  # Pemboleh ubah $row akan mengambil data yang ditemui
  while($row=mysqli_fetch_array($laksanakan_arahan))
  {  
    # umpukan data yang ditemui kepada tatasusunan $data_get
    $data_get= array(
      'tarikh_pilihan'=>$tarikh,
      'id_filem'=>$_GET['id_filem'],
      'nama_filem'=>$_GET['nama_filem'],
      'tarikh_mula'=>$_GET['tarikh_mula'],
      'tarikh_tamat'=>$_GET['tarikh_tamat'],
      'gambar'=>$_GET['gambar'],
      'harga_dewasa'=>$_GET['harga_dewasa'],
      'harga_kanak'=>$_GET['harga_kanak'],
      'kategori'=>$_GET['kategori'],
      'id_tayangan'=>$row['id_tayangan'],
      'masa'=>$row['masa'],
      'nama_pawagam'=>$row['nama_pawagam'],
      'jenis'=>$row['jenis']
    );

    # memaparkan link untuk masa tayangan
    echo"<li><a href='filem_seat.php?".http_build_query($data_get)."'>".$row['masa']." | ".$row['jenis']."</a></li>";
}
  echo "</ul>";
}

# Menyemak kewujudan tarikh pilihan yang baru
if(empty($_POST))
{ $tarikh_pilihan=$_GET['tarikh_pilihan']; } 
else 
{ $tarikh_pilihan=$_POST['tarikh_pilihan2']; }

# tarikh semasa pilih
$hari_ini=strtotime($tarikh_pilihan);
$tarikh=date("Y-m-d", $hari_ini);

# tarikh 1 hari selepas tarikh pilihan
$esk=strtotime("+1 Day",strtotime($tarikh_pilihan));
$tarikh_esk=date("Y-m-d", $esk);

#tarikh 2 hari selepas tarikh pilihan
$lusa=strtotime("+2 Days",strtotime($tarikh_pilihan));
$tarikh_lusa=date("Y-m-d", $lusa);


# memaparkan maklumat filem
echo"
<table>
  <tr valign='top'>
    <td>
    <img src='images/movie/".$_GET['gambar']."' width='100%'>
    </td>
    <td>
    <h2><b>".$_GET['nama_filem']."</b></h2>
    <p>Kategori : ".$_GET['kategori']."</p>
    <p>Tarikh Mula Tayangan: ".$_GET['tarikh_mula']."</p>
    <p>Tarikh Akhir Tayangan : ".$_GET['tarikh_tamat']."</p>
    <p>Harga Tiket Dewasa : RM ".$_GET['harga_dewasa']."</p>
    <p>Harga Tiket Kanak-Kanak : RM ".$_GET['harga_kanak']."</p>

    <form action='' method='POST'>
    <p>Tukar tarikh</p>
    <input style='width:70%' type='date' name='tarikh_pilihan2' min='".date("Y-m-d")."' value='$tarikh_pilihan' required>
    <button type='submit'>Cari</button>
    </form>";

    # tab pilihan tarikh
    echo"
    <button class='tablink' onclick=\"opentarikh(event,'tarikh1')\"><b>".date('d M (D)',$hari_ini)."</b></button>
    <button class='tablink' onclick=\"opentarikh(event,'tarikh2')\"><b>".date("d M (D)", $esk)."</b></button>
    <button class='tablink' onclick=\"opentarikh(event,'tarikh3')\"><b>".date("d M (D)", $lusa)."</b></button> ";
    
    # memaparkan pilihan masa tayangan mengikut tarikh pilihan
    echo"<div id='tarikh1' class='kump'>
    <h2>$tarikh_pilihan</h2>
    <p>Pilih Masa tayangan</p>";
    laksana_masa($tarikh_pilihan,$_GET['id_filem']);
    echo "</div>";

    echo"<div id='tarikh2' class='kump' style='display:none'>
    <h2>$tarikh_esk</h2>
    <p>Pilih Masa tayangan</p> ";
    laksana_masa($tarikh_esk,$_GET['id_filem']);
    echo "</div>";

    echo"<div id='tarikh3' class='kump' style='display:none'>
    <h2>$tarikh_lusa</h2>
    <p>Pilih Masa tayangan</p>";
    laksana_masa($tarikh_lusa,$_GET['id_filem']);
    echo "</div>";

?>

<?PHP 
include ('footer.php'); 
?>

<!-- Fungsi untuk tab pilihan tarikh-->
<script>
function opentarikh(evt, tarikh) {
  var i, x, tablinks;
  x = document.getElementsByClassName("kump");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(tarikh).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>



