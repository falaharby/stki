 <link rel="stylesheet" type="text/css" href="styles.css">
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
<br>
<center>
<div class="heading">
<h3>HASIL QUERY</h3>
</div>



<table  border='1' Width='800'>  
<tr>
    <th> Nama File </th>
    <th> Tokenisasi </th>
    <th> Stemming Porter</th>

</tr>

 <?php
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$servername = "fdb18.awardspace.net";
$username = "3360045_akademik";
$password = "akademik123";
$dbname = "3360045_akademik";
$katakunci="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=$_POST['katakunci'];
$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
// $sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil' IN BOOLEAN MODE)";


// echo $sql;
$result = $conn->query($sql);

if ($result) {
    // output data of each row
    while ($data = mysqli_fetch_array ($result)){
$id = $data['dokid'];
 echo "    
        <tr>
        <td>".$data['nama_file']."</td>
        <td>".$data['token']."</td>
        <td>".$data['tokenstem']."</td>
        </tr> 
        ";
        
}
} else {
    echo "0 results";
}
$conn->close();

///

?>

</table>