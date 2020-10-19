<?php
//membuat koneksi ke database
$host='fdb18.awardspace.net';
$user='3360045_akademik';
$pass='akademik123';
$database='3360045_akademik';

$conn=new mysqli($host,$user,$pass,$database) or die('MySql Tidak Connect');
?>

<head>
	<title>Search Engine</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="responsive.css">
</head>

<body>
<header>
      <div class="container">
        <div class="header-left">
          <img class="logo" style="width:150px"src="stkiLogo2.png">
        </div>
        <!-- Tambahkan ikon menu dibawah -->
        <div class="menu-icon">
          <span class="fa fa-bars"></span>
        </div>
        <div class="header-right">  
          <a href="index.php">Cari Kata Dasar</a>
          <a href="upload.php">Upload File</a>
          <a href="query.php">Query</a>
          <a href="hasil_tokenisasi.php">Hasil Tokenisasi</a>
          <a href="hitungbobot.php">Hitung Bobot</a>
          <a href="hitungvector.php">Hitung Vector</a>
        </div>
      </div>
    </header>

<br><br><br>

<center> 
<div class="heading">
  <h3>HASIL TOKENISASI DAN STEMMING</h3>
</div>


<!-- ///////////////////////////// Script untuk membuat tabel///////////////////////////////// -->



<table  border='1' Width='800'>  
<tr>
    <th> Nama File </th>
    <th> Tokenisasi </th>
    <th> Stemming Porter</th>
    <th> Stemming Nazief Adriel
</tr>

<?php  
// Perintah untuk menampilkan data
$queri="Select * From dokumen" ;  //menampikan SEMUA


$hasil=mysqli_query ($conn, $queri);    //fungsi untuk SQL

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data = mysqli_fetch_array ($hasil)){
$id = $data['dokid'];
 echo "    
        <tr>
        <td>".$data['nama_file']."</td>
        <td>".$data['token']."</td>
        <td>".$data['tokenstem']."</td>
        <td>".$data['tokenstem2']."</td>
        </tr> 
        ";
        
}

?>

</table>