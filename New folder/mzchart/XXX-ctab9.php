<?php 
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
	
	function search_yr() {
		global $fLib;
		$tahun = $fLib->getValue ("select distinct(yr) from fact_agesexgol order by yr desc limit 0,1");
		if ($tahun == '') {$tahun=0;}
		return $tahun;
	}
	
?>

<h3>Jumlah PNS Menurut Kelompok Umur dan <br/> Tingkat Golongan Kepangkatan</h3>
<table width="80%px" cellpadding="3px" class="tbbrowse" border=1>
	<tr class="brheader" align="center">
		<td align="center" width="150px"><b>KEL. UMUR</b></td>
		<?php
			$SQL = " select gol, name from dim_gol order by gol asc ";
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
			$thn = search_yr() ;
			
			echo "<tr>";
			echo "<td align=\"left\"> " . $fLib->getValue ("select name from dim_age where age='" . $row['age'] . "'") . " </td>";
			
			$SQLDTL = " select gol, name from dim_gol order by gol asc ";
			$retdtl = $fLib->query ($SQLDTL);
			$x = 1; $snilai = 0;
			while ($rowdtl = $retdtl->fetch_array () ) {
				$gol = $rowdtl['gol'];
				
				$nilai = $fLib->getValue ("select sum(jml) from fact_agesexgol where yr=$thn and age=$age and gol=$gol ");
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
			$SQL = " select gol, name from dim_gol order by gol asc ";
			$ret = $fLib->query ($SQL);
			$i = 1; $snilai = 0;
			while ($row = $ret->fetch_array () ) {
				$gol = $row['gol'];
				$thn = search_yr() ;
				
				$nilai = $fLib->getValue ("select sum(jml) from fact_agesexgol where yr=$thn and gol=$gol ");
				if ($nilai == '') { $nilai = 0; }
				
				echo "<td align=\"right\" width=\"50px\"><b> " . number_format($nilai) . " </b></td>";
				
				$snilai = $snilai + $nilai;
				$i ++;
			}
		?>
		<td align="right" width="80px"><b><?php echo number_format($snilai); ?></b></td>
	</tr>
</table>
