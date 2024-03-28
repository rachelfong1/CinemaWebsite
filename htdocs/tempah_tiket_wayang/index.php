<?PHP 
# Memanggil fail header.php
include ('header.php');
# Memanggil fail connection.php
include ('connection.php');


#menyemak kewujuan data GET tarikh tayangan
if(empty($_GET))
{ $tarikh_pilihan=date("Y-m-d"); } 
else 
{ $tarikh_pilihan=$_GET['tarikh_pilihan']; }

# arahan SQL untuk memilih filem yang tarikh tamat > dari tarikh pilihan
$arahan_cari="select* from filem
where tarikh_tamat>='$tarikh_pilihan' order by tarikh_mula DESC";

# laksanakan arahan SQL
$laksana=mysqli_query($condb,$arahan_cari);
?>




<div class="w3-row w3-margin-bottom w3-margin-top">
  <div class="w3-half w3-container w3-blue-gray ">
  
<!-- borang untuk memasukan tarikh pilihan -->


  <h2>Find Your Show</h2>
  <p>Select The Showtime</p>
  <form class="w3-margin"action='' method='GET'>
  <input class="w3-input w3-border w3-round-large" type='date' name='tarikh_pilihan' min='<?PHP echo date("Y-m-d"); ?>' value='<?PHP echo $tarikh_pilihan; ?>'>
  <button class="w3-button w3-block w3-gray w3-round-xxlarge" type='submit'>Papar</button>
 
</form>



  </div>
  <div class="w3-half w3-container">
    


  </div>
</div>



<?PHP include ('templete.php'); ?>



<h1 class="w3-hoverable w3-hover-black w3-serif w3-container w3-yellow">Now Showing</h1>
<!-- jadual untuk memaparkan senarai filem yang ditayangkan pada tarikh pilihan -->
<table class="w3-table w3-margin-bottom w3-margin-top w3-card-4 " align="center" border='1'>
<?PHP 
$baris=0;

while($rekod=mysqli_fetch_array($laksana))
{
  # mengumpukan data yang diambil kepada tatasusunan
  $data_get= array(
    'tarikh_pilihan'=>$tarikh_pilihan,
    'id_filem'=>$rekod['id_filem'],
    'nama_filem'=>$rekod['nama_filem'],
    'tarikh_mula'=>$rekod['tarikh_mula'],
    'tarikh_tamat'=>$rekod['tarikh_tamat'],
    'gambar'=>$rekod['gambar'],
    'harga_dewasa'=>$rekod['harga_dewasa'],
    'harga_kanak'=>$rekod['harga_kanak'],
    'kategori'=>$rekod['kategori']                                    
  );

  if($baris==0)
  { echo"<tr align='center'><td>"; }
  else if($baris==6)
  { echo"</tr><tr align='center'><td>"; $baris=0; }
  else
  { echo"</td> <td>"; }


# Memaparkan maklumat filem
echo"<img src='images/movie/".$rekod['gambar']." 'width=100%'>
<p><b>Nama_filem : ".$rekod['nama_filem']."</b></p>
<a class='w3-text-white w3-button w3-round-xxlarge w3-black' href='filem_info.php?".http_build_query($data_get)."'>Tempah Sekarang</a>";

$baris++;
}
?>        
</table>
     
<?PHP include ('footer.php'); ?>