<h3>Jumlah PNS Menurut Jenis Jabatan Fungsional Tertentu dan Jenis Kelamin</h3>
<table width="50%px" cellpadding="3px" class="tbbrowse" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="100px"><b>GOL.RUANG <BR/> KEPANGKATAN</b></td>
		<td align="center" width="80px"><b>PRIA</b></td>
		<td align="center" width="50px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b>WANITA</b></td>
		<td align="center" width="50px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b>JUMLAH</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="50px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="50px"><b>(5)</b></td>
		<td align="center" width="80px"><b>(6)</b></td>
	</tr>
	
	<?php 
		require_once ("../MZSetup/MZconstDB.php");
		require_once ("../MZLib/MZFungsi.php");

		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_agesexgol order by yr desc limit 0,1");
		
		$tota = $fLib->getValue ("select sum(jml) from fact_agesexgol where yr=$thn");
		if ($tota == '') {$tota=0;}
		$male = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=1 and yr=$thn");
		if ($male == '') {$male=0;}
		if ($tota == 0 or $male == 0){$senmale = 0;}
		else {$senmale=($male/$tota)*100;}
		$fema = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=2 and yr=$thn");
		if ($fema == '') {$fema=0;}
		if ($tota == 0 or $fema == 0){$senfema = 0;}
		else {$senfema=($fema/$tota)*100;}
		
		$SQL = "select pangkat, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select pangkat, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_agesexgol 
					   where yr=$thn
					   group by pangkat) as dt
					   group by pangkat ";
		$ret = $fLib->query ($SQL);
		$i = 1; $f=1; $golprev='';
		while ($row = $ret->fetch_array () ) {
			//cari golongan
			$pangkat = $row['pangkat'];
			$gol = $fLib->getValue ("select gol from dim_pangkat where pangkat='$pangkat' ");
			$fgol = $fLib->getValue ("select count(distinct(pangkat)) from fact_agesexgol where yr=$thn and gol=$gol");;
			
			//total
			if ($row['tot'] == '') { $tot = 0; } 
			else { $tot = $row['tot']; }
			
			//male
			if ($row['male'] == '') { $mal = 0; } 
			else { $mal = $row['male']; }
			if ($tot == 0 or $mal == 0) { $vmal = 0; }
			else {$vmal = ($mal/$tot) * 100 ; $vmal = number_format($vmal,2);}
			
			//female
			if ($row['fema'] == '') { $fem = 0; } 
			else { $fem = $row['fema']; }
			if ($tot == 0 or $fem == 0) { $vfem = 0; }
			else {$vfem = ($fem/$tot) * 100 ; $vfem = number_format($vfem,2);}
			
			echo "<tr>";
			echo "<td align=\"center\"> " . $fLib->getValue ("select name from dim_pangkat where pangkat='" . $row['pangkat'] . "'") . " </td>";
			echo "<td align=\"right\"> " . number_format($row['male']) . " </td>";
			echo "<td align=\"right\"> " . $vmal . "</td>";
			echo "<td align=\"right\"> " . number_format($row['fema']) . " </td>";
			echo "<td align=\"right\"> " . $vfem . " </td>";
			echo "<td align=\"right\"> " . number_format($row['tot']) . " </td>";
			echo "</tr>";
			
			
			if ($fgol == $f) {
				$gtot = $fLib->getValue ("select sum(jml) from fact_agesexgol where yr=$thn and gol=$gol");;
				if ($gtot == '') {$gtot=0;}
				$gmale = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=1 and yr=$thn and gol=$gol");;
				if ($gmale == '') {$gmale=0;}
				if ($gmale == 0 or $gtot == 0){$sengmale = 0;}
				else {$sengmale=($gmale/$gtot)*100;}
				$gfema = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=2 and yr=$thn and gol=$gol");;
				if ($gfema == '') {$gfema=0;}
				if ($gfema == 0 or $gtot == 0){$sengfema = 0;}
				else {$sengfema=($gfema/$gtot)*100;}
					
				echo "<tr>";
				echo "<td align=\"center\"><b> " . $fLib->getValue ("select name from dim_gol where gol='" . $gol . "'") . " </b></td>";
				echo "<td align=\"right\"><b> " . number_format($gmale) . " </b></td>";
				echo "<td align=\"right\"><b> " . number_format($sengmale,2) . "</b></td>";
				echo "<td align=\"right\"><b> " . number_format($gfema) . " </b></td>";
				echo "<td align=\"right\"><b> " . number_format($sengfema,2) . " </b></td>";
				echo "<td align=\"right\"><b> " . number_format($gtot) . " </b></td>";
				echo "</tr>";
					
				$f=1;
			}
			else {
				$golprev = $golnow;
				$i ++;
				$f ++;
			}
			
			
		}
	?>
	
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($male); ?></b></td>
		<td align="right" width="50px"><b><?php echo number_format($senmale,2); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($fema); ?></b></td>
		<td align="right" width="50px"><b><?php echo number_format($senfema,2); ?></b></td>
		<td align="right" width="80px"><b><?php echo number_format($tota); ?></b></td>
	</tr>
		
</table>
