<html>
<head>
    <style>
        body {
            font-family: Arial;
        }
        table {
            border-collapse: collapse;
        }
        th {
            background-color: #cccccc;
        }
        th, td {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
        <tr>
        	<th>No</th>
            <th>Nama</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        	<?php foreach($forum as $forum_row): 
     if($forum_row->akses==0)
      $status="Internal";
     elseif($forum_row->akses==1)
     $status="External";
     else
      $status="Publik";


    

     ?>
            <tr>
            	<td><?php echo $forum_row->id_forum;?></td>
                <td><?php echo $forum_row->name;?></td>
                <td><?php echo $forum_row->pertanyaan;?></td>
                <td><?php echo $forum_row->pertanyaan;?></td>
                <td> <?php echo date("d M Y H:i:s",strtotime($forum_row->tanggal_kirim));?></td>
                <td><?php echo $forum_row->kategori;?></td>
                <td><?php echo $status;?></td>
            </tr>
              <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>