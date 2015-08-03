<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
 	require ("./mzsetting.php");

	defined( '__MUZE__' ) or die( 'Direct access to this file is prohibited.' );

	$facttbl = "fact_ese";

	$thn = fldNumber($_GET ['yr']);
	
	if ($thn==0) $thn=date('Y');
	if ($thn>2100) $thn=date('Y');

	if ($thn > 2000) {
		$sqlDel = "delete from $facttbl where thn=$thn";
		$res = $fLib->query ($sqlDel);
		if ($res == False) 
			;	// do nothing, just continue

		for ($ese=1; $ese<=4; $ese++) {
			$inese = "($ese"."1,$ese"."2)";
			$sqlIns = "insert into $facttbl (thn, eselon, sex, jml) ".
				"select $thn, $ese, kjkel, count(*) from v_peglist p join peg_jakhir j on (p.nip=j.nip) 
				 where j.keselon in $inese
					and kstatus in(1,2) and kjpeg in(1,2)
					and ((kunkom >='01' and kunkom<='12') or kunkom='50')
				group by p.kjkel ";
			//echo "<hr>$sqlIns<br />"; die;
			
			$res = $fLib->query ($sqlIns);
			if ($res == False) 
				;	// do nothing, just continue
		}
	}
	
	//die;
	//$pgNav = 'mzmain.php?mode=browse';
	//header("location: $pgNav");
?>
