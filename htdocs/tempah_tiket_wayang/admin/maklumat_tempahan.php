<?PHP 
#memanggil fail header_admin.php
include ('header_admin.php'); 
?>

<h2><b>Maklumat Tempahan</b></h2>
    <!-- butang untuk mengubah saiz tulisan dalam jadual -->
    <input name='reSize1' type='button' value='reset' onclick="resizeText(2)" />
    <input name='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="resizeText(-1)" />
    <input name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="resizeText(1)" />

<!-- Header kepada jadual yang akan memaparkan maklumat pelanggan-->
<table border='1' id='saiz' class= "w3-table-all w3-margin-bottom w3-margin-top">
    <tr class="w3-light-green">
        <td>Bil</td>
        <td>Nama pelanggan</td>
        <td>No Seat</td>
        <td>Nama Filem</td>
        <td>Masa</td>
        <td>Tarikh</td>
        <td>Bayaran</td>
    </tr>

<?PHP 
#memanggil fail connection.php dari folder luaran
include ('../connection.php');

#arahan untuk memilih semua medan dalam jadual pelanggan, tempahan, tayangan, filem dan masa_tayangan
$arahan_sql= "SELECT* 
FROM tempahan,pelanggan,tayangan,filem,pawagam,masa_tayangan
WHERE 
tempahan.nokp_pelanggan=pelanggan.nokp_pelanggan and
tempahan.id_tayangan=tayangan.id_tayangan AND
tayangan.id_filem=filem.id_filem AND
tayangan.id_pawagam=pawagam.id_pawagam AND
tayangan.id_masa=masa_tayangan.id_masa
order by tayangan.id_tayangan DESC
limit 50 ";

# Melaksanakan arahan untuk memilih
$laksana_arahan=mysqli_query($condb,$arahan_sql);
$bil=0;

# mengambil data yang dicari dan memaparkannya baris demi baris. maximum paparan adalah 50 baris terakhir
while($rekod=mysqli_fetch_array($laksana_arahan))
{
    echo "
    <tr>
        <td>".++$bil."</td>
        <td>".$rekod['nama_pelanggan']."</td>
        <td>".$rekod['no_seat']."</td>
        <td>".$rekod['nama_filem']."</td>
        <td>".$rekod['masa']."</td>
        <td>".$rekod['tarikh']."</td>
        <td>".$rekod['bayaran']."</td>
    </tr>
    ";
}
?>
</table>
<?PHP include ('footer_admin.php'); ?>