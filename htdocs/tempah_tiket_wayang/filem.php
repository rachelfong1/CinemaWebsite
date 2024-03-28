<?PHP 
#Memulakan fungsi session
session_start(); 
#Set rujukkan zon masa & tarikh
date_default_timezone_set("Asia/Kuala_Lumpur");
?>





<h1>Now Showing</h1>
<!-- jadual untuk memaparkan senarai filem yang ditayangkan pada tarikh pilihan -->
<table class="w3-table-all w3-margin-bottom w3-margin-top" align="center" border='1'>
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
<p>Kategori".$rekod['kategori']."</p>
<p><b>Berakhir pada : ".$rekod['tarikh_tamat']."</b></p>
<a href='filem_info.php?".http_build_query($data_get)."'>Tempah Sekarang</a>";

$baris++;
}
?>        
</table>












