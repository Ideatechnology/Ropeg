<table cellpadding="3px" class="headerrow" border=1>
	<tr align="center">
		<td align="center"><b>TAHUN<b></td>
		<td align="center"><b>PRIA</b></td>
		<td align="center"><b>% <br /> PERTUMBUHAN</b></td>
		<td align="center"><b>WANITA</b></td>
		<td align="center"><b>% <br /> PERTUMBUHAN</b></td>
		<td align="center"><b>JUMLAH</b></td>
		<td align="center"><b>% <br /> PERTUMBUHAN</b></td>
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
		require_once ("./act_genfact.php");

		global $fLib;
		
		$jum = $fLib->getValue ("select count(distinct(thn)) from fact_psex");
		$mulai = 0;
		if ($jum > 5) {$mulai = $jum - 5; $jum=5; }
		$SQL = " select thn, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select thn, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_psex 
					   group by thn) as dt
					   group by thn
		order by thn asc
		limit $mulai,5 " ;
		$ret = $fLib->query ($SQL);
		$i = 1;
		//echo $SQL;
		
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			
			//cari nilai sebelumnya
			if ($row['thn'] == 0) {$year = 0;}
			else {$year = $row['thn'] - 1;}
			
			$prevpria = $fLib->getValue ("select sum(jml) from fact_psex where sex=1 and thn=$year");
			if ($prevpria == '') { $prevpria = 0; }
			$prevwanita = $fLib->getValue ("select sum(jml) from fact_psex where sex=2 and thn=$year");
			if ($prevwanita == '') { $prevwanita = 0; }
			$prevtot = $fLib->getValue ("select sum(jml) from fact_psex where thn=$year");
			if ($prevtot == '') { $prevtot = 0; }
			
			//sekarang
			$pria = $row['male'];
			if ($pria == '') { $pria = 0; }
			$wanita = $row['fema'];
			if ($wanita == '') { $wanita = 0; }
			$tot = $row['tot'];
			if ($tot == '') { $tot = 0; }
			
			//mencari nilai pertumbuhan
			if ($prevpria > 0) {
				$spria = (($pria-$prevpria)/$prevpria) * 100; 
				$spria = number_format($spria,2);
			}
			if ($prevwanita > 0) {
				$swanita = (($wanita-$prevwanita)/$prevwanita) * 100; 
				$swanita = number_format($swanita,2);
			}
			if ($prevtot > 0) {
				$stot = (($tot-$prevtot)/$prevtot) * 100; 
				$stot = number_format($stot,2);
			}
			
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"center\"> " . $row['thn'] . " </td>";
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