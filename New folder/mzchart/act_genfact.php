<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
 	require ("./mzsetting.php");

	defined( '__MUZE__' ) or die( 'Direct access to this file is prohibited.' );

	$facttbl = "fact_psex";
	$thn = fldNumber($_GET ['yr']);
	
	if ($thn==0) $thn=date('Y');
	if ($thn>2100) $thn=date('Y');

	if ($thn > 2000) {
		$sqlDel = "delete from $facttbl where thn=$thn";
		$res = $fLib->query ($sqlDel);
		if ($res == False) 
			;	// do nothing, just continue

		for ($sex=1; $sex<=2; $sex++) {
			/*$sqlIns = "insert into $facttbl (thn, sex, jml) ".
						" select $thn, $sex, count(*) from peg_identpeg ".
						" where kjkel=$sex and kstatus=2 and kjpeg=1";
			*/		
			$sqlIns = "insert into $facttbl (thn, sex, jml) ".
						" select $thn, $sex, count(*) from v_peglist ".
						" where kjkel=$sex and kstatus in(1,2) and kjpeg in(1,2)
							 and ((kunkom >='01' and kunkom<='12') or kunkom='50')";
		
			//echo "<hr>$sqlIns<br />";
			$res = $fLib->query ($sqlIns);
			if ($res == False) 
				;	// do nothing, just continue
		}
	}
	
	//$pgNav = 'mzmain.php?mode=browse';
	//header("location: $pgNav");
?>
