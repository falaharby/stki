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

<br><br><br><br>

<center> 
HITUNG BOBOT
<br>
<br>

<?php

$host='fdb18.awardspace.net';
$user='3360045_akademik';
$pass='akademik123';
$database='3360045_akademik';


$conn=new mysqli($host,$user,$pass,$database);
// mysql_select_db($database);
//hitung index
mysqli_query($conn, "TRUNCATE TABLE tbindex");
$resn = mysqli_query($conn, "INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	// $n = mysqli_num_rows($resn);
	

//berapa jumlah DocId total?, n
	$resn = mysqli_query($conn, "SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($conn, "SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($conn,"SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysqli_query($conn, "UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot


?>