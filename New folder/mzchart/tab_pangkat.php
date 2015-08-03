<?php 
	function tahun1()
	{
		global $fLib;
		$thn1 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 0,1");
		return fldNumber($thn1);
	}
	
	function tahun2()
	{
		global $fLib;
		$thn2 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 1,1");
		return fldNumber($thn2);
	}
?>

<table cellpadding="3px" class="headerrow" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="100px" rowspan="2"><b>GOLONGAN <br /> KEPANGKATAN</b></td>
		<td align="center" width="320px" colspan="4"><b>TAHUN/PERSEN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="80px"><b><?php echo tahun2() ; ?></b></td>
		<td align="center" width="80px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b><?php echo tahun1() ; ?></b></td>
		<td align="center" width="80px"><b>PERSEN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="100px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="80px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="80px"><b>(5)</b></td>
	</tr>
	
	<?php 
		
		global $fLib;
		
		//tahun1
		$thn1 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 0,1");
		$thn1 = fldNumber($thn1);
		$v_thn1 = $fLib->getValue ("select sum(jml) from fact_golru where thn=$thn1 ");
		$v_thn1 = fldNumber($v_thn1);
		
		//tahun2
		$thn2 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 1,1");
		$thn2 = fldNumber($thn2);
		$v_thn2 = $fLib->getValue ("select sum(jml) from fact_golru where thn=$thn2 ");
		$v_thn2 = fldNumber($v_thn2);
		
		$SQL = " select gol, name from dim_gol order by gol asc ";
		$ret = $fLib->query ($SQL);
		$i = 1;
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			$gol = $row['gol'];
			
			//tahun1
			$nilai1 = $fLib->getValue ("select sum(jml) from fact_golru where gol='$gol' and thn=$thn1 ");
			if ($nilai1 == '') { $nilai1 = 0; } 
			if ($nilai1 == 0 or $v_thn1 == 0) { $v_nila1 = 0; }
			else {$v_nila1 = ($nilai1/$v_thn1) * 100 ; $v_nila1 = number_format($v_nila1,2);} 
			
			//tahun2
			$nilai2 = $fLib->getValue ("select sum(jml) from fact_golru where gol='$gol' and thn=$thn2 ");
			if ($nilai2 == '') { $nilai2 = 0; } 
			if ($nilai2 == 0 or $v_thn2 == 0) { $v_nila2 = 0; }
			else {$v_nila2 = ($nilai2/$v_thn2) * 100 ; $v_nila2 = number_format($v_nila2,2);} 
			
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"center\"> " . $fLib->getValue ("select name from dim_gol where gol='" . $row['gol'] . "'") . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai2) . " </td>";
			echo "<td align=\"right\"> " . $v_nila1 . "</td>";
			echo "<td align=\"right\"> " . number_format($nilai1) . "</td>";
			echo "<td align=\"right\"> " . $v_nila2 . " </td>";
			echo "</tr>";
			
			$i ++;
		}		
	?>
	
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn2); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn1); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
	</tr>
</table>
