<?php 
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
			
	function tahun1_funk()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 0,1");
		return $thn;
	}
	
	function tahun2_funk()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 1,1");
		return $thn;
	}
	
	function tahun3_funk()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 2,1");
		return $thn;
	}
	
	function tahun4_funk()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 3,1");
		return $thn;
	}
	
	function tahun5_funk()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 4,1");
		return $thn;
	}
	
?>

<table width="80%px" cellpadding="3px" class="headerrow" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="150px" rowspan="2"><b>JABATAN FUNGSIONAL <br /> TERTENTU</b></td>
		<td align="center" width="400px" colspan="5"><b>TAHUN</b></td>
		<td align="center" width="100px" rowspan="2"><b>(%) <br /> PERTUMBUHAN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="80px"><b><?php echo tahun5_funk() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun4_funk() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun3_funk() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun2_funk() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun1_funk() ; ?></b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="150px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="80px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="80px"><b>(5)</b></td>
		<td align="center" width="80px"><b>(6)</b></td>
		<td align="center" width="100px"><b>(7)</b></td>
	</tr>
	
	<?php 
		
		global $fLib;
		
		//tahun1_funk
		$thn1 = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 0,1");
		$v_thn1 = $fLib->getValue ("select sum(jml) from fact_funk where thn=$thn1 ");
		if ($v_thn1 == '') {$v_thn1 = 0;}
		
		//tahun2_funk
		$thn2 = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 1,1");
		$v_thn2 = $fLib->getValue ("select sum(jml) from fact_funk where thn=$thn2 ");
		if ($v_thn2== '') {$v_thn2 = 0;}
		
		//tahun3_funk
		$thn3 = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 2,1");
		$v_thn3 = $fLib->getValue ("select sum(jml) from fact_funk where thn=$thn3 ");
		if ($v_thn3 == '') {$v_thn3 = 0;}
		
		//tahun4_funk
		$thn4 = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 3,1");
		$v_thn4 = $fLib->getValue ("select sum(jml) from fact_funk where thn=$thn4 ");
		if ($v_thn4 == '') {$v_thn4 = 0;}
		
		//tahun5_funk
		$thn5 = $fLib->getValue ("select distinct(thn) from fact_funk order by thn desc limit 4,1");
		$v_thn5 = $fLib->getValue ("select sum(jml) from fact_funk where thn=$thn1 ");
		if ($v_thn5 == '') {$v_thn5 = 0;}
		
		//pertumbuhan
		if ($v_thn1 == 0 or $v_thn2 == 0) {$v_thn = 0;}
		else {$v_thn = (($v_thn1-$v_thn2)/$v_thn2) * 100 ; $v_thn = number_format($v_thn,2);}
			
		$SQL = " select funk, name from dim_funk order by funk asc ";
		$ret = $fLib->query ($SQL);
		$i = 1;
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			$funk = $row['funk'];
			
			//tahun1_funk
			$nilai1 = $fLib->getValue ("select sum(jml) from fact_funk where funk='$funk' and thn=$thn1 ");
			if ($nilai1 == '') { $nilai1 = 0; } 
			
			//tahun2_funk
			$nilai2 = $fLib->getValue ("select sum(jml) from fact_funk where funk='$funk' and thn=$thn2 ");
			if ($nilai2 == '') { $nilai2 = 0; } 
			
			//tahun3_funk
			$nilai3 = $fLib->getValue ("select sum(jml) from fact_funk where funk='$funk' and thn=$thn3 ");
			if ($nilai3 == '') { $nilai3 = 0; } 
			
			//tahun4_funk
			$nilai4 = $fLib->getValue ("select sum(jml) from fact_funk where funk='$funk' and thn=$thn4 ");
			if ($nilai4 == '') { $nilai4 = 0; } 
			
			//tahun5_funk
			$nilai5 = $fLib->getValue ("select sum(jml) from fact_funk where funk='$funk' and thn=$thn5 ");
			if ($nilai5 == '') { $nilai5 = 0; } 
			
			//pertumbuhan
			if ($nilai1 == 0 or $nilai2 == 0) {$nilai = 0;}
			else {$nilai = (($nilai1-$nilai2)/$nilai2) * 100 ; $nilai = number_format($nilai,2);}
			
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"left\"> " . $fLib->getValue ("select name from dim_funk where funk='" . $row['funk'] . "'") . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai5) . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai4) . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai3) . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai2) . " </td>";
			echo "<td align=\"right\"> " . number_format($nilai1) . " </td>";
			echo "<td align=\"right\"> " . $nilai . " </td>";
			echo "</tr>";
			
			$i ++;
		}		
	?>
	
	<tr class="brheader" align="center">
		<td align="center" width="150px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn5); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn4); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn3); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn2); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn1); ?></b></td>
		<td align="right" width="100px"><b><?php echo $v_thn; ?></b></td>
	</tr>
		
</table>
