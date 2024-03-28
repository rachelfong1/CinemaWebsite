<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data GET
if(!empty($_GET))
{   # mengambil data GET
    $nama=$_GET['nama'];
    $nokp=$_GET['nokp'];
    $katalaluan=$_GET['katalaluan'];
    
    # data validation - adakah data GET yang diambil empty
    if(empty($nama) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }

    # data validation - format nokp betul atau tidak
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('Ralat pada nokp');
        window.history.back();</script>");
    }

    # Arahan untuk menyimpan data ke dalam jadual admin
    $arahan_sql_simpan="insert into admin
    (nama_admin,nokp_admin,katalaluan_admin)
    values
    ('$nama','$nokp','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran gagal');
        window.history.back();</script>";
    }
}
# ----------- bahagian 1 : memaparkan data dalam bentuk jadual
    # arahan SQL mencari admin 
    $arahan_sql_cari="select* from admin";
    
    # melaksanakan arahan sql cari tersebut    
    $laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
	
	
	
?>
<!-- menyediakan header bagi jadual -->
<!-- selepas header akan diselitkan dengan borang untuk mendaftar admin baru -->
<h2><b>Senarai administrator</b></h2>
<table id='saiz' border='1' class= "w3-table-all w3-margin-bottom w3-margin-top" >
<tr class="w3-light-green">
        <td>Bil</td>
        <td>nama_admin</td>
        <td>nokp_admin</td>
        <td>katalaluan_admin</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar admin baru -->
    <form action='' method='GET'>
        <td>#</td>
        <td><input class="w3-input w3-round-xxlarge w3-gray" type='text' name='nama'></td>
        <td><input class="w3-input w3-round-xxlarge w3-gray" type='text' name='nokp'></td>
        <td><input class="w3-input w3-round-xxlarge w3-gray" type='password' name='katalaluan'></td>
        <td><input class="w3-button w3-block w3-brown w3-round-xxlarge" type='submit' value='simpan'></td>
    </form>
    </tr>
    <?PHP 
    $bil=0;
    # pemboleh ubah $rekod mengambail semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_admin']."</td>
            <td>".$rekod['nokp_admin']."</td>
            <td>".$rekod['katalaluan_admin']."</td>
            <td>

| <a href='hapus.php?jadual=admin&medan_kp=nokp_admin&kp=".$rekod['nokp_admin']."' 
onClick=\"return confirm('Anda pasti ingin padam data ini?')\" ><i class='fa fa-trash w3-xxlarge'></i></a>|


<a href='kemaskini_admin.php?nama=".$rekod['nama_admin']."&nokp=".$rekod['nokp_admin']."&katalaluan=".$rekod['katalaluan_admin']."' 
onClick=\"return confirm('Anda pasti ingin mengubahsuai data ini?')\" ><i class='fa fa-refresh w3-xxlarge'></i></a> |

            </td>
        </tr>";
    }

    ?>
</table>

<?PHP
# Memanggil fail footer_admin.php
  include ('footer_admin.php');
	
?>