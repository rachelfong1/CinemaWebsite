<?PHP 
#memanggil fail header.php
include ('header.php');
# memanggil fail guard.php bg tujuan kawalan capaian pengguna
include ('guard.php');
?>

<div class="w3-row w3-center">
  <div class="w3-quarter w3-container">
   

  </div>
  <div class="w3-half w3-container w3-card-4 w3-margin-top w3-margin-bottom">
     <!-- Memaparkan maklumat tayangan -->
<div id='resit'>
        <h2 class= "w3-text-light-blue" ><b>Resit Pembelian</b></h2>
        <hr>
        <p><b>Tarikh Tayangan : </b>                <?PHP echo $_GET['tarikh_pilihan']; ?> </p>
        <p><b>Judul Filem : </b>                    <?PHP echo $_GET['nama_filem']; ?> </p>
        <p><b>kategori : </b>                       <?PHP echo $_GET['kategori']; ?> </p>
        <p><b>masa Tayangan : </b>                  <?PHP echo $_GET['masa']; ?> </p>
        <p><b>nama_pawagam : </b>                   <?PHP echo $_GET['nama_pawagam']; ?> </p>
        <p><b>jenis : </b>                          <?PHP echo $_GET['jenis']; ?> </p>
        <p><b>Bilangan Tiket Dewasa : </b>          <?PHP echo $_GET['dewasa']; ?> </p>
        <p><b>Bilangan Tiket Kanak-kanak : </b>     <?PHP echo $_GET['kanak2']; ?> </p>
        <p><b>Tempat Duduk : </b>                   <?PHP echo $_GET['bil_seat']; ?> </p>
        <hr>
        <p><b>Jumlah Bayaran : RM</b> 
        <?PHP 
        $bayaran=($_GET['dewasa']*$_GET['harga_dewasa'])+($_GET['kanak2']*$_GET['harga_kanak']); 
        echo number_format($bayaran,2);
        ?> 
        </p><hr>
        <p><i class="w3-text-red">Sila berada di pawagam 10 minit sebelum tayangan bermula</i></p>       
        <input class= "w3-button w3-round-xxlarge w3-gray w3-margin" type='button' onClick="printdiv('resit');" value='Cetak'>
</div>

		
  </div>
  <div class="w3-quarter w3-container">
   
   
   
   
    </div>
</div>


<?PHP include ('footer.php'); ?>

<!-- Fungsi untuk mencetak resit -->
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>