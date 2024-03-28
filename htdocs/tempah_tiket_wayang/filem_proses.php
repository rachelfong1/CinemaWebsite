<?PHP 
# Memulakan fungsi session
session_start();
# memanggil fail connection.php
include('connection.php');

$i=1;
$bil_seat=" ";

# Mengambil no seat yang dipilih
foreach($_POST['seat'] as $seat_get)
{
    $bil_seat=$bil_seat.$seat_get."  ";
    if($i<=$_POST['dewasa'])
    {
        #arahan untuk menyimpan data berdasarkan bilangan tiket dewasa
        $sql="insert into tempahan
        (nokp_pelanggan,id_tayangan,no_seat,bayaran)
        values
        ('".$_SESSION['nokp_pelanggan']."','".$_GET['id_tayangan']."','$seat_get','".$_GET['harga_dewasa']."')";
    }
    else
    {
        # arahan untuk menyimpan data berdasarkan bilangan tiket kanak2
        $sql="insert into tempahan
        (nokp_pelanggan,id_tayangan,no_seat,bayaran)
        values
        ('".$_SESSION['nokp_pelanggan']."','".$_GET['id_tayangan']."','$seat_get','".$_GET['harga_kanak']."')";
    }

    # melaksanakan arahan untuk menyimpan data
    $laksana_arahan=mysqli_query($condb,$sql);
    $i++;
   
}
#mengumpukan array dengan data GET yang dihantar dari fail filem_bayar.php
$data_get= array(
    'tarikh_pilihan'=>$_GET['tarikh_pilihan'],
    'id_filem'=>$_GET['id_filem'],
    'nama_filem'=>$_GET['nama_filem'],
    'tarikh_mula'=>$_GET['tarikh_mula'],
    'tarikh_tamat'=>$_GET['tarikh_tamat'],
    'gambar'=>$_GET['gambar'],
    'harga_dewasa'=>$_GET['harga_dewasa'],
    'harga_kanak'=>$_GET['harga_kanak'],
    'kategori'=>$_GET['kategori'],
    'id_tayangan'=>$_GET['id_tayangan'],
    'masa'=>$_GET['masa'],
    'nama_pawagam'=>$_GET['nama_pawagam'],
    'jenis'=>$_GET['jenis'],
    'dewasa'=>$_POST['dewasa'],
    'kanak2'=>$_POST['kanak2'],
    'bil_seat'=>$bil_seat
    );

# memaparkan pop up dan terus ke page resit dengan menghantar data GET
echo "<script>alert('Urusan Tempahan Selesai');window.location.href='filem_resit.php?".http_build_query($data_get)."';</script>";


?>