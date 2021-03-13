<html>
<head>
<title>Rest Web Services</title>
</head>
<body>
<?php
if (isset ($_POST['nim'])) {
$url = 'http://localhost/webservice/restmhsw2.php';
$data = "<mahasiswa>
<nim>" . $_POST['nim'] . "</nim>
<nama>" . $_POST['nama'] ."</nama>
<progdi>" . $_POST['progdi'] . "</progdi>
</mahasiswa>";
//echo "datanya ".$data;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
echo "response ".$response;

 // Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
$anggota = file_put_contents($file, $jsonfile);
curl_close($ch);
}
?>
<a href="index.php">Lihat Buku</a>
<form method="POST" action="tambah.php">
<table>
<tr>
<td>NIM</td>
<td><input type="text" name="nim" id="nim"></td>
</tr>
<tr>
<td>Nama</td>
<td><input type="text" name="nama" id="nama"></td>
</tr>
<tr>
<td>Progdi</td>
<td><input type="text" name="progdi" id="progdi"></td>
</tr>
<tr>
<tr>
<td><input type="submit" name="submit" id="submit" value="Tambah"></td>
<td></td>
</tr>
</table>
</form>
</body>
</html>
