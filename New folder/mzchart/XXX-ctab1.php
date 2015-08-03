<div id="grid_tabular">
<table width="60%px" cellpadding="3px" class="headerrow" border=1 >
	<tr align="center">
		<td align="center" width="30px"><b>TAHUN<b></td>
		<td align="center" width="80px"><b>PRIA</b></td>
		<td align="center" width="30px"><b>% <br /> PERTUMBUHAN</b></td>
		<td align="center" width="80px"><b>WANITA</b></td>
		<td align="center" width="30px"><b>% <br /> PERTUMBUHAN</b></td>
		<td align="center" width="80px"><b>JUMLAH</b></td>
		<td align="center" width="30px"><b>% <br /> PERTUMBUHAN</b></td>
	</tr>
	<tr class="brheader_tabular" align="center">
		<td align="center"><b>(1)</b></td>
		<td align="center"><b>(2)</b></td>
		<td align="center"><b>(3)</b></td>
		<td align="center"><b>(4)</b></td>
		<td align="center"><b>(5)</b></td>
		<td align="center"><b>(6)</b></td>
		<td align="center"><b>(7)</b></td>
	</tr>
	
	<?php 
		$MZAllowPublic = true;
		require_once ("../MZLib/MZPublic.php");	
		require_once ("../MZSetup/MZconstDB.php");
		require_once ("../MZLib/MZFungsi.php");

		global $fLib;
		
		$jum = $fLib->getValue ("select count(distinct(yr)) from fact_agesexgol");
		if ($jum > 5) {$mulai = $jum - 5; $jum=5; }
		$SQL = " select yr, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select yr, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_agesexgol 
					   group by yr) as dt
					   group by yr
		order by yr asc
		limit $mulai,5 " ;
		$ret = $fLib->query ($SQL);
		$i = 1;
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			
			//cari nilai sebelumnya
			if ($row['yr'] == 0) {$year = 0;}
			else {$year = $row['yr'] - 1;}
			
			$prevpria = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=1 and yr=$year");
			if ($prevpria == '') { $prevpria = 0; }
			$prevwanita = $fLib->getValue ("select sum(jml) from fact_agesexgol where sex=2 and yr=$year");
			if ($prevwanita == '') { $prevwanita = 0; }
			$prevtot = $fLib->getValue ("select sum(jml) from fact_agesexgol where yr=$year");
			if ($prevtot == '') { $prevtot = 0; }
			
			//sekarang
			$pria = $row['male'];
			if ($pria == '') { $pria = 0; }
			$wanita = $row['fema'];
			if ($wanita == '') { $wanita = 0; }
			$tot = $row['tot'];
			if ($tot == '') { $tot = 0; }
			
			//mencari nilai pertumbuhan
			$spria = (($pria-$prevpria)/$prevpria) * 100; $spria = number_format($spria,2);
			$swanita = (($wanita-$prevwanita)/$prevwanita) * 100; $swanita = number_format($swanita,2);
			$stot = (($tot-$prevtot)/$prevtot) * 100; $stot = number_format($stot,2);
			
			if (strlen($row['yr'])==1){$yr = "200" . $row['yr'] ;}
			else {$yr = "20" . $row['yr'] ;}
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"center\"> " . $yr . " </td>";
			echo "<td align=\"right\"> " . number_format($pria) . " </td>";
			echo "<td align=\"right\"> " . $spria . " </td>";
			echo "<td align=\"right\"> " . number_format($wanita) . " </td>";
			echo "<td align=\"right\"> " . $swanita . " </td>";
			echo "<td align=\"right\"> " . number_format($tot) . " </td>";
			echo "<td align=\"right\"> " . $stot . " </td>";
			echo "</tr>";
			$i ++;
		}
	?>
</table>
</div>	
