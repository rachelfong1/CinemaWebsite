<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php'); 
# Memanggil fail connection.php dari folder luaran
include ('../connection.php');



echo"<h3 class='w3-text-red'><b>Laman Administrator</b></h3>";
# -------Pengiraan kutipan filem tertinggi-------------------
# Arahan SQL mengira jumlah kutipan tertinggi
$arahan_tinggi="SELECT SUM(tempahan.bayaran)AS kutipan, filem.nama_filem, filem.tarikh_mula,tayangan.tarikh
FROM tempahan, tayangan, filem
WHERE tempahan.id_tayangan=tayangan.id_tayangan AND
tayangan.id_filem=filem.id_filem 
GROUP BY tayangan.id_filem order by kutipan DESC limit 1";

# Melaksanakan arahan
$laksana_tinggi=mysqli_query($condb,$arahan_tinggi);

# Mengambil data jumlah kutipan tertinggi
$rekod_tinggi=mysqli_fetch_array($laksana_tinggi);

# mamaparkan Maklumat filem yang mempunyai kutipan tertinggi
echo "<div>
<h3 class='w3-panel w3-leftbar w3-border-yellow w3-text-yellow'><b>Filem yang mempunyai kutipan Tiket Tertinggi</b></h3>
<p>Nama Filem : ".$rekod_tinggi['nama_filem']."</p>
<p>Tarikh Mula Tanyangan : ".$rekod_tinggi['tarikh_mula']."</p>
<p>Tarikh Tayangan Terkini : ".$rekod_tinggi['tarikh']."</p>
<p>Jumlah Kutipan :RM ".$rekod_tinggi['kutipan']."</p>
</div> ";

# -------Pengiraan kutipan filem Terendah-------------------
# Arahan SQL mengira jumlah kutipan terendah
$arahan_rendah="SELECT SUM(tempahan.bayaran)AS kutipan, filem.nama_filem, filem.tarikh_mula,tayangan.tarikh
FROM tempahan, tayangan, filem
WHERE tempahan.id_tayangan=tayangan.id_tayangan AND
tayangan.id_filem=filem.id_filem 
GROUP BY tayangan.id_filem order by kutipan ASC limit 1";

# Melaksanakan arahan
$laksana_rendah=mysqli_query($condb,$arahan_rendah);

# Mengambil data jumlah kutipan terendah
$rekod_rendah=mysqli_fetch_array($laksana_rendah);

# Memaparkan maklumat filem yang mempunyai kutipan terendah
echo "<div>
<h3 class='w3-panel w3-leftbar w3-border-yellow w3-text-yellow'><b>Filem yang mempunyai kutipan Tiket Terendah</b></h3>
<p>Nama Filem : ".$rekod_rendah['nama_filem']."</p>
<p>Tarikh Mula Tanyangan : ".$rekod_rendah['tarikh_mula']."</p>
<p>Tarikh Tayangan Terkini : ".$rekod_rendah['tarikh']."</p>
<p>Jumlah Kutipan :RM ".$rekod_rendah['kutipan']."</p>
</div> ";

#memanggil fail footer.php
include ('footer_admin.php'); ?>