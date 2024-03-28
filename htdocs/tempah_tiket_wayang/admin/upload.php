<!-- Memanggil fail header_admin.php-->
<?PHP include('header_admin.php'); ?>

<!-- form untuk upload fail data-->
<h4><b>Muat Naik Data Tayangan Secara Pukal</b></h4>
Sila Pilih Fail txt yang ingin diupload
<form  action='' method='POST' enctype='multipart/form-data'>
<input class="w3-round-xlarge w3-brown w3-button" type='file' name='data_admin'>
<button class="w3-round-xlarge w3-brown w3-button w3-margin-top w3-margin-bottom" type='submit' name='btn-upload'>Muat Naik</button>
</form>

<?PHP 
if (isset($_POST['btn-upload']))
{
    # Memanggil fail connection.php dari folder luaran
    include ('../connection.php');
    # mengambil nama sementara fail
    $namafailsementara=$_FILES["data_admin"]["tmp_name"];
    # mengambil nama fail
    $namafail=$_FILES['data_admin']['name'];
    # mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);   
    # menguji jenis fail dan saiz fail
    if($_FILES["data_admin"]["size"]>0 AND $jenisfail=="txt")
    {
        # membuka fail yang diambil
        $fail_data=fopen($namafailsementara,"r");

        # mendapatkan data dari fail baris demi baris
        while (!feof($fail_data)) 
        {   
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_data);
    
            #memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|",$ambilbarisdata);
            
            # selepas pecahan tadi akan diumpukan kepada 4
            list($id_pawagam,$id_masa,$id_filem,$tarikh) = $pecahkanbaris;
            
            # arahan SQl untuk menyimpan data
            $arahan_sql_simpan="insert into tayangan
            (id_pawagam,id_masa,id_filem,tarikh) values
            ('$id_pawagam','$id_masa','$id_filem','$tarikh')";            
            
            # memasukkan data kedalam jadual admin
            $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);     
            echo"<script>alert('import fail Data Selesai.');
            window.location.href='maklumat_tayangan.php';</script>";            
        }                  
    fclose($fail_data);
    }
    else  {
        echo"<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
    }
}
?> 



<?PHP
# Memanggil fail footer_admin.php
  include ('footer_admin.php');
	
?>