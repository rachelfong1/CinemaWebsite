<?php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $database = 'pertandingan';

   $sambungan = mysqli_connect($host, $user,
   $password, $database)
   or die('Sambungan gagal');
   echo 'Sambungan berjaya';
?>