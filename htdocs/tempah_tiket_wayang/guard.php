<?PHP 
# fail ini berfungsi untuk mengawal akses pengguna yang masih belum login
# Di panggil ke fail2 yang memerlukan pengguna login
#----------------- Bahagian login & logout Session ------------
if(empty($_SESSION['nama_pelanggan']))
{
    die("<script>alert('Sila daftar Masuk');window.location.href='pelanggan_login.php';</script>");
}
?>