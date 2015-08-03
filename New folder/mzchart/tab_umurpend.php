<?php 
	function search_yr_ageedu() {
		global $fLib;
		$tahun = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 0,1");
		if ($tahun == '') {$tahun=0;}
		return $tahun;
	}
?>

<table width="80%px" cellpadding="3px" class="tbbrowse" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="150px"><b>KEL. UMUR</b></td>
		<?php
			$SQL = " select edu, name from dim_edu order by edu asc ";
			$ret = $fLib->query ($SQL);
			$i = 1;
			while ($row = $ret->fetch_array () ) {
				echo "<td align=\"center\" width=\"50px\"><b> " . strtoupper($row['name']) . " </b></td>";
				$i ++;
			}
		?>
		<td align="center" width="100px"><b>JUMLAH</b></td>
	</tr>
	
	<?php 
		
		global $fLib;
		
		$SQL = " select age, name from dim_age order by age asc ";
		$ret = $fLib->query ($SQL);
		$i = 1;
		while ($row = $ret->fetch_array () ) {
			$age = $row['age'];
			$thn = search_yr_ageedu() ;
			
			echo "<tr>";
			echo "<td align=\"left\"> " . $fLib->getValue ("select name from dim_age where age='" . $row['age'] . "'") . " </td>";
			
			$SQLDTL = " select edu, name from dim_edu order by edu asc ";
			$retdtl = $fLib->query ($SQLDTL);
			$x = 1; $snilai = 0;
			while ($rowdtl = $retdtl->fetch_array () ) {
				$edu = $rowdtl['edu'];
				
				$nilai = $fLib->getValue ("select sum(jml) from fact_ageedusex where yr=$thn and age=$age and edu=$edu ");
				if ($nilai == '') { $nilai = 0; }
			
				echo "<td align=\"right\"> " . number_format($nilai) . " </td>";
				
				$snilai = $snilai + $nilai;
				$x ++;
			}
			
			echo "<td align=\"right\"> " . number_format($snilai) . " </td>";
			echo "</tr>";
			
			$i ++;
		}		
	?>
	
	<tr class="brheader" align="center">
		<td align="center" width="150px"><b>Jumlah</b></td>
		<?php
			$SQL = " select edu, name from dim_edu order by edu asc ";
			$ret = $fLib->query ($SQL);
			$i = 1; $snilai = 0;
			while ($row = $ret->fetch_array () ) {
				$edu = $row['edu'];
				$thn = search_yr_ageedu() ;
				
				$nilai = $fLib->getValue ("select sum(jml) from fact_ageedusex where yr=$thn and edu=$edu ");
				if ($nilai == '') { $nilai = 0; }
				
				echo "<td align=\"right\" width=\"50px\"><b> " . number_format($nilai) . " </b></td>";
				
				$snilai = $snilai + $nilai;
				$i ++;
			}
		?>
		<td align="right" width="80px"><b><?php echo number_format($snilai); ?></b></td>
	</tr>
</table>
