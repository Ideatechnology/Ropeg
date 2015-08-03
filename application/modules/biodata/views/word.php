<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 9">
<meta name=Originator content="Microsoft Word 9">
<title>Print Pertanyaan</title>
</head>
<body>
<H1>Pertanyaan Forum Konsultasi</H1>
<table>
<tr><td>Penanya</td><td>: <?php echo $query["name"];?></td></tr>
<tr><td>Pertanyaan</td><td>: <?php echo $query["pertanyaan"];?></td></tr>
<tr><td>Tanggal</td><td>: <?php echo $query["tanggal_kirim"];?></td></tr>
<tr><td>Jawaban</td><td>: <?php echo $query["jawaban"];?></td></tr>
</table>

</body>
</html>