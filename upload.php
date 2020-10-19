<html>
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

<br><br><br><br><br><br>
<div style="padding-left:80px">
<form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
File yang di upload : <input type="file" name="fupload"><br>
Deskripsi File : <br>
<textarea name="deskripsi" rows="8" cols="40"></textarea><br>
<input type=submit value=Upload>
<br>
<p style="color : gray ; font-size: 14">*karena memakai hosting gratisan, jadi ada batas waktu upload. Jadi tidak disarankan upload ya :D </p>
</form>
