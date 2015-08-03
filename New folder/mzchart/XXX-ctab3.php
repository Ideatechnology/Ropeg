<table width="80%px" cellpadding="3px"  class="headerrow" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="100px"><b>PENDIDIKAN</b></td>
		<td align="center" width="80px"><b>PRIA</b></td>
		<td align="center" width="50px"><b>%</b></td>
		<td align="center" width="80px"><b>WANITA</b></td>
		<td align="center" width="50px"><b>%</b></td>
		<td align="center" width="80px"><b>JUMLAH</b></td>
		<td align="center" width="50px"><b>%</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="50px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="50px"><b>(5)</b></td>
		<td align="center" width="80px"><b>(6)</b></td>
		<td align="center" width="50px"><b>(7)</b></td>
	</tr>
	
	<?php 
		$MZAllowPublic = true;
		require_once ("../MZLib/MZPublic.php");	
		require_once ("../MZSetup/MZconstDB.php");
		require_once ("../MZLib/MZFungsi.php");

		global $fLib;
		
		$thn = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 0,1");
		$male = $fLib->getValue ("select sum(jml) from fact_ageedusex where sex=1 and yr=$thn");
		$fema = $fLib->getValue ("select sum(jml) from fact_ageedusex where sex=2 and yr=$thn");
		$tota = $fLib->getValue ("select sum(jml) from fact_ageedusex where yr=$thn");
		
		$SQL = "select edu, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select edu, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_ageedusex 
					   where yr=$thn
					   group by edu) as dt
					   group by edu ";
		$ret = $fLib->query ($SQL);
		$i = 1; $smal = 0; $sfem = 0;
		while ($row = $ret->fetch_array () ) {
			if ( ($i % 2) == 0)	$celcls = "brdata"; else $celcls = "brdata2";
			//male
			if ($row['male'] == '') { $mal = 0; } 
			else { $mal = $row['male']; }
			if ($male == 0 or $mal == 0) { $vmal = 0; }
			else {$vmal = ($mal/$male) * 100 ; $vmal = number_format($vmal,2);}
			
			//female
			if ($row['fema'] == '') { $fem = 0; } 
			else { $fem = $row['fema']; }
			if ($fema == 0 or $fem == 0) { $vfem = 0; }
			else {$vfem = ($fem/$fema) * 100 ; $vfem = number_format($vfem,2);}
			
			//total
			if ($row['tot'] == '') { $tot = 0; } 
			else { $tot = $row['tot']; }
			if ($tota == 0 or $tot == 0) { $vtot = 0; }
			else {$vtot = ($tot/$tota) * 100 ; $vtot = number_format($vtot,2);}
			
			echo "<tr class=\"$celcls\">";
			echo "<td align=\"center\"> " . $fLib->getValue ("select name from dim_edu where edu='" . $row['edu'] . "'") . " </td>";
			echo "<td align=\"right\"> " . $row['male'] . " </td>";
			echo "<td align=\"right\"> " . $vmal . "</td>";
			echo "<td align=\"right\"> " . $row['fema'] . " </td>";
			echo "<td align=\"right\"> " . $vfem . " </td>";
			echo "<td align=\"right\"> " . $row['tot'] . " </td>";
			echo "<td align=\"right\"> " . $vtot . " </td>";
			echo "</tr>";
			
			$smal = $smal + $vmal;
			$sfem = $sfem + $vfem;
			$stot = $stot + $vtot;
			$i ++;
		}
	?>
	
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($male); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($fema); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($tota); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
	</tr>
		
</table>
