<!-- Memanggil fail header_admin.php -->
<?PHP include ('header_admin.php'); ?>
<!-- menyediakan borang untuk mengemaskini data admin-->

<h4><b>Kemaskini Data Admin</b></h4>
<form action='' method='POST'>
nama admin <input type='text' name='nama_baru' value='<?PHP echo $_GET['nama']; ?>'><br>
nokp admin <input  type='text' name='nokp_baru' value='<?PHP echo $_GET['nokp']; ?>'><br>
katalaluan admin <input type='password' name='katalaluan_baru' value='<?PHP echo $_GET['katalaluan']; ?>'><br>
<input type='submit' value='kemaskini'>
</form>

<?PHP 
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # Memanggil fail connection dari folder luaran
    include ('../connection.php');

    # mengambil data POST
    $nama_baru=$_POST['nama_baru'];
    $nokp_baru=$_POST['nokp_baru'];
    $katalaluan_baru=$_POST['katalaluan_baru'];
    $nokp_lama=$_GET['nokp'];

    # Arahan untuk mengemaskini data ke dalam jadual admin
    $arahan_sql_update="update admin set 
    nama_admin='$nama_baru',
    nokp_admin='$nokp_baru',
    katalaluan_admin='$katalaluan_baru'
    where
    nokp_admin='$nokp_lama'";

    # melaksanakan proses mengemaskini dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_update))
    {
        # peroses mengemaskini berjaya.
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
        # proses mengemaskini gagal
        echo "<script>alert('Kemaskini gagal');
        window.history.back();</script>";
    }
}

?>


