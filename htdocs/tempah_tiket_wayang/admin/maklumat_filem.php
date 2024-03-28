<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php'); 

# Memanggil fail connection.php dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # mengambil data POST
    $nama_filem=$_POST['nama_filem'];
    $tarikh_mula=$_POST['tarikh_mula'];
    $tarikh_tamat=$_POST['tarikh_tamat'];
    $harga_dewasa=$_POST['harga_dewasa'];
    $harga_kanak=$_POST['harga_kanak'];
    $kategori=$_POST['kategori'];
    

    # memproses maklumat gambar yang di upload
    # proses ini lebih kepada menukar nama fail gambar
    $timestmp=date("Y-m-d");
    $saiz_fail = $_FILES['gambar']['size'];
    $nama_fail=basename($_FILES["gambar"]["name"]);
    $jenis_gambar = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi = $_FILES['gambar']['tmp_name'];
    $folder = "../images/movie/";    
    $nama_baru_gambar=$nama_filem.$timestmp.".".$jenis_gambar;
    
    # Arahan untuk menyimpan data ke dalam jadual filem
    $arahan_sql_simpan="insert into filem
    (nama_filem,tarikh_mula,tarikh_tamat,gambar,harga_dewasa,harga_kanak,kategori)
    values
    ('$nama_filem','$tarikh_mula','$tarikh_tamat','$nama_baru_gambar','$harga_dewasa','$harga_kanak','$kategori')";

    # melaksanakan proses menyimpan dalam syarat if
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # muat naik gambar ke dalam folder images/movie
        move_uploaded_file($lokasi,$folder.$nama_baru_gambar);

        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');</script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran gagal');
        window.history.back();
        </script>";
    }
}

?>

<h2><b>Maklumat Filem</b></h2>
<!-- form / borang untuk mendaftar filem baru -->
    <h4>Daftar Filem Baru</h4>
    <form action='' method='POST' enctype='multipart/form-data'>
    <table border='1' class="w3-table-all">
        <tr>
            <td style="width:10%">Nama Filem</td>
            <td style="width:60%">
                <input class="w3-round-xlarge w3-gray w3-input" type='text' name='nama_filem' size='60'>
            </td>

            <td style="width:10%">Kategori</td>
            <td style="width:20%">
                <select class="w3-round-xlarge w3-gray w3-input" name='kategori' >
                    <option>U</option>
                    <option>18SG</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan='2'></td>
            <td>Tarikh Mula</td>
            <td>
                <input class="w3-round-xlarge w3-gray w3-input" name='tarikh_mula' type='date'>
            </td>
        </tr>

        <tr>
            <td colspan='2'></td>
            <td>Tarikh Tamat</td>
            <td>
                <input class="w3-round-xlarge w3-gray w3-input" name='tarikh_tamat' type='date'>
            </td>
        </tr>

        <tr>
            <td colspan='2'></td>
            <td>Harga Dewasa</td>
            <td>
                <input class="w3-round-xlarge w3-gray w3-input" name='harga_dewasa' type='number'>
            </td>
        </tr>

        <tr>
            <td colspan='2'></td>
            <td>Harga Kanak</td>
            <td>
                <input class="w3-round-xlarge w3-gray w3-input" name='harga_kanak' type='text'>
            </td>
        </tr>

        <tr>
            <td colspan='2'></td>
            <td>Gambar Promosi</td>
            <td>
                <input class="w3-round-xlarge w3-gray w3-input" name='gambar' type='file'>
            </td>
        </tr>

        <tr>
            <td colspan='3'></td>
            <td>
                <input class="w3-round-xlarge w3-brown w3-button w3-block" type='submit' value='Daftar'>
            </td>
        </tr>
    </table>
    </form>



<!-- Memaparkan maklumat filem yang telah berdaftar -->
<h2><b>Senarai Filem</b></h2>
<table border='1'>

<?PHP 
$arahan_sql= "select* from filem order by id_filem DESC";
$laksana_arahan=mysqli_query($condb,$arahan_sql);
$i=1;
while($rekod=mysqli_fetch_array($laksana_arahan))
{
    if($i==1)
    {
        echo "<tr>";
    }
    else if($i==3)
    {
        echo "";
    }
    else if($i==4)
    {
        echo "</tr>";
        $i=1;
    }
    echo "<td style=\"width:16.67%\" align='center'><img  src='../images/movie/".$rekod['gambar']."' width='90%'></td>
          <td> 
            <p ><b> ".$rekod['nama_filem']."</b></p><hr>
            <p ><b>ID Filem :</b>        ".$rekod['id_filem']."
            <p ><b>Tarikh mula :</b>     ".$rekod['tarikh_mula']."
            <p ><b>Tarikh tamat :</b>    ".$rekod['tarikh_tamat']."</p>
            <p ><b>Harga dewasa :</b>    ".$rekod['harga_dewasa']."</p>
            <p ><b>Harga kanak :</b>     ".$rekod['harga_kanak']."</p>
            <p ><b>Kategori :</b>        ".$rekod['kategori']."</p>

            <a href='hapus.php?jadual=filem&medan_kp=id_filem&kp=".$rekod['id_filem']."' 
            onClick=\"return confirm('Anda pasti ingin padam data ini?')\" ><i class='fa fa-trash w3-text-red w3-xxlarge'></i></a><br><br>


          </td>";
    $i++;
}
?>
</table>

<?PHP include ('footer_admin.php'); ?>