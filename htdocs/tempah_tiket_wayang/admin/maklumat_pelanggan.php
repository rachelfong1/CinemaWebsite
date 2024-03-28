<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php'); 
?>

<h3 ><b>Maklumat Pelanggan</b></h3>

    <!-- Butang untuk membesarkan saiz tulisan dalam jadual --> 
    <input name='reSize1' type='button' value='reset' onclick="resizeText(2)" />
    <input name='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="resizeText(-1)" />
    <input name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="resizeText(1)" />

<!-- Header jadual yang memaparkan data pelanggan-->
<table border='1' id='saiz' class= "w3-table-all w3-margin-bottom w3-margin-top">
    <tr class="w3-light-green">
        <td>Bil</td>
        <td>Nama pelanggan</td>
        <td>Nokp pelanggan</td>
        <td>No Tel Pelanggan</td>
        <td>Katalaluan Pelanggan</td>
    </tr>

<?PHP 
# memanggil fail connection.php dari folder luaran
include ('../connection.php');

# arahan SQL untuk memilih semua medan dalam jadual pelanggan
$arahan_sql= "select* from pelanggan order by nama_pelanggan";

# melaksanakan arahan tersebut
$laksana_arahan=mysqli_query($condb,$arahan_sql);
$bil=0;


while($rekod=mysqli_fetch_array($laksana_arahan))
{
    # Memaparkan data pelanggan satu demi satu
    echo "
    <tr>
        <td>".++$bil."</td>
        <td>".$rekod['nama_pelanggan']."</td>
        <td>".$rekod['nokp_pelanggan']."</td>
        <td>".$rekod['notel_pelanggan']."</td>
        <td>".$rekod['katalaluan_pelanggan']."</td>
    </tr>
    ";
}

?>

</table>
</div>

<?PHP include ('footer_admin.php'); ?>