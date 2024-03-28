<?PHP 
include ('header_admin.php'); 

# Memanggil fail connection.php dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # mengambil data POST
    $id_filem=$_POST['id_filem'];
    $id_pawagam=$_POST['id_pawagam'];
    $tarikh=$_POST['tarikh'];
    $id_masa=$_POST['masa'];
    $bilangan_simpan=0;

    # melaksanakan proses menyimpan
    foreach($_POST['masa'] as $masa)
    {
        # Arahan untuk menyimpan data ke dalam jadual tayangan
        $arahan_sql_simpan="insert into tayangan
        (id_pawagam,id_masa,id_filem,tarikh)
        values
        ('$id_pawagam','$masa','$id_filem','$tarikh')";
        $laksana_arahan_simpan=mysqli_query($condb,$arahan_sql_simpan);
        $bilangan_simpan++;
    }
    if(count($_POST['masa'])==$bilangan_simpan)
    {
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');</script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran tidak lengkap. Semak semula data dalam jadual di bawah');
        window.history.back();</script>";
    }
}

?>

<h2 ><b>Maklumat Tayangan</b></h2>

    <h3>Daftar Filem Baru</h3>
    <!-- form / borang untuk mendaftar tayangan baru -->
    <form action='' method='POST'>
    <table class="w3-table-all">
        <tr>
            <td style="width:10%">Nama Filem</td>
            <td style="width:60%">
            <select class="w3-input w3-round-xxlarge w3-gray" name='id_filem'  required>
            <option class="w3-input w3-gray w3-round-xxlarge" value selected disabled>Pilih</option>       
            <?PHP 
            $arahan_pilih_filem= "select* from filem order by tarikh_mula DESC";
            $laksanakan_pilih = mysqli_query($condb,$arahan_pilih_filem);
            while($rekod=mysqli_fetch_array($laksanakan_pilih))
            {
                echo "<option value='".$rekod['id_filem']."'>".$rekod['nama_filem']."</option>";
            }
            ?>
            
            </select> 
            </td>
        </tr>

        <tr>
            <td style="width:10%">Nama Pawagam</td>
            <td style="width:60%">
            <select class="w3-input w3-gray w3-round-xxlarge" name='id_pawagam' required>
            <option class="w3-input w3-gray w3-round-xxlarge" value selected disabled>Pilih</option>       
            <?PHP 
            $arahan_pilih_pawagam= "select* from pawagam limit 50";
            $laksanakan_pilih_pawagam = mysqli_query($condb,$arahan_pilih_pawagam);
            while($rekod=mysqli_fetch_array($laksanakan_pilih_pawagam))
            {
                echo "<option value='".$rekod['id_pawagam']."'>".$rekod['nama_pawagam']." | ".$rekod['jenis']."</option>";
            }
            ?>
            
            </select> 
            </td>
        </tr>
       
        <tr>
            <td style="width:10%">Tarikh</td>
            <td style="width:60%">
            <input class="w3-input w3-gray w3-round-xxlarge" type='date' name='tarikh' >
            </td>
        </tr>

        <tr>
            <td style="width:10%">Masa Tayangan</td>
            <td style="width:60%">
            <?PHP 
            $arahan_pilih_masa= "select* from masa_tayangan";
            $laksanakan_pilih_masa = mysqli_query($condb,$arahan_pilih_masa);
            while($rekod=mysqli_fetch_array($laksanakan_pilih_masa))
            {
                echo "<input type='checkbox' name='masa[]' value='".$rekod['id_masa']."'>
                <label>".$rekod['masa']."</label> ";
            }
            ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input class="w3-button w3-block w3-brown w3-round-xxlarge" type='submit' value='Daftar'>
            </td>
        </tr>
    </table>
    </form>


<!-- Memaparkan maklumat tayangan yang telah berdaftar -->
<h2><b>Senarai Tayangan</b></h2>
   
    <input name='reSize1' type='button' value='reset' onclick="resizeText(2)" />
    <input name='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="resizeText(-1)" />
    <input name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="resizeText(1)" />

<table border='1' id='saiz' class= "w3-table-all w3-margin-bottom w3-margin-top">
    <tr class="w3-light-green">
        <td>Bil</td>
        <td>Nama Filem</td>
        <td>Pawagam</td>
        <td>Tarikh</td>
        <td>Masa Tayangan</td>
    </tr>
<?PHP 
# arahan untuk memilih tayangan
$arahan_sql= "SELECT* 
FROM tayangan,filem,pawagam,masa_tayangan
WHERE 
tayangan.id_filem=filem.id_filem AND
tayangan.id_pawagam=pawagam.id_pawagam AND
tayangan.id_masa=masa_tayangan.id_masa
order by tayangan.id_tayangan DESC";
# melaksanakan arahan memilih
$laksana_arahan=mysqli_query($condb,$arahan_sql);
$bil=0;
#mengambil data tayangan dan memaparkannya baris demi baris
while($rekod=mysqli_fetch_array($laksana_arahan))
{
    echo "
    <tr>
        <td>".++$bil."</td>
        <td>".$rekod['nama_filem']."</td>
        <td>".$rekod['nama_pawagam']." ".$rekod['jenis']."</td>
        <td>".$rekod['tarikh']."</td>
        <td>".$rekod['masa']."</td>
    </tr>
    
    
    ";
   
}
?>
</table>

<?PHP include ('footer_admin.php'); ?>