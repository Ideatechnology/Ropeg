<?php 
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
			
	function tahun1_peg()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 0,1");
		if ($thn == '') {$thn = 0;}
		if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
		
		return $thn;
	}
	
	function tahun2_peg()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 1,1");
		if ($thn == '') {$thn = 0;}
		if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
		
		return $thn;
	}
	
	function tahun3_peg()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 2,1");
		if ($thn == '') {$thn = 0;}
		if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
		
		return $thn;
	}
	
	function tahun4_peg()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 3,1");
		if ($thn == '') {$thn = 0;}
		if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
		
		return $thn;
	}
	
	function tahun5_peg()
	{
		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 4,1");
		if ($thn == '') {$thn = 0;}
		if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
		
		return $thn;
	}
	
?>

<table width="100%px" cellpadding="3px" class="headerrow" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="150px" rowspan="2"><b>JABATAN FUNGSIONAL <br /> TERTENTU</b></td>
		<td align="center" width="400px" colspan="5"><b>TAHUN</b></td>
		<td align="center" width="100px" rowspan="2"><b>(%) <br /> PERTUMBUHAN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="80px"><b><?php echo tahun5_peg() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun4_peg() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun3_peg() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun2_peg() ; ?></b></td>
		<td align="center" width="80px"><b><?php echo tahun1_peg() ; ?></b></td>
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
		
		//tahun1_peg
		$thn1 = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 0,1");
		if ($thn1 == '') {$thn1 = 0;}
		$v_thn1 = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn1 ");
		if ($v_thn1 == '') {$v_thn1 = 0;}
		
		//tahun2_peg
		$thn2 = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 1,1");
		if ($thn2 == '') {$thn2 = 0;}
		$v_thn2 = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn2 ");
		if ($v_thn2== '') {$v_thn2 = 0;}
		
		//tahun3_peg
		$thn3 = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 2,1");
		if ($thn3 == '') {$thn3 = 0;}
		$v_thn3 = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn3 ");
		if ($v_thn3 == '') {$v_thn3 = 0;}
		
		//tahun4_peg
		$thn4 = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 3,1");
		if ($thn4 == '') {$thn4 = 0;}
		$v_thn4 = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn4 ");
		if ($v_thn4 == '') {$v_thn4 = 0;}
		
		//tahun5_peg
		$thn5 = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 4,1");
		if ($thn5 == '') {$thn5 = 0;}
		$v_thn5 = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn1 ");
		if ($v_thn5 == '') {$v_thn5 = 0;}
		
		//pertumbuhan
		if ($v_thn1 == 0 or $v_thn2 == 0) {$v_thn = 0;}
		else {$v_thn = (($v_thn1-$v_thn2)/$v_thn2) * 100 ; $v_thn = number_format($v_thn,2);}
			
		$SQL = " select eselon, name from dim_eselon order by eselon asc ";
		$ret = $fLib->query ($SQL);
		$i = 1;
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			$eselon = $row['eselon'];
			
			//tahun1_peg
			$nilai1 = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn1 ");
			if ($nilai1 == '') { $nilai1 = 0; } 
			
			//tahun2_peg
			$nilai2 = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn2 ");
			if ($nilai2 == '') { $nilai2 = 0; } 
			
			//tahun3_peg
			$nilai3 = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn3 ");
			if ($nilai3 == '') { $nilai3 = 0; } 
			
			//tahun4_peg
			$nilai4 = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn4 ");
			if ($nilai4 == '') { $nilai4 = 0; } 
			
			//tahun5_peg
			$nilai5 = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn5 ");
			if ($nilai5 == '') { $nilai5 = 0; } 
			
			//pertumbuhan
			if ($nilai1 == 0 or $nilai2 == 0) {$nilai = 0;}
			else {$nilai = (($nilai1-$nilai2)/$nilai2) * 100 ; $nilai = number_format($nilai,2);}
			
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"left\"> " . $fLib->getValue ("select name from dim_eselon where eselon='" . $row['eselon'] . "'") . " </td>";
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
